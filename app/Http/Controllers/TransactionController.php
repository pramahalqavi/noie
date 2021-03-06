<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Transaction;
use App\Exports\TransactionsExport;
use Excel;
use Mail;
use DateTime;
use DatePeriod;
use DateInterval;

class TransactionController extends Controller {

    public function index() {
        $transactions = Transaction::orderBy('created_at','desc')->paginate(20);
        $dt = new DateTime;
        foreach ($transactions as $transaction) {
            if ($transaction->created_at->add(new DateInterval('P1D')) < $dt && $transaction->status == 'Unpaid') {
                $transaction->status = 'Canceled';
                $transaction->save();
            }
        }
        return view('admin-side/transaction', ['transactions' => $transactions]);
    }

    public function detail($id) {
        $row = Transaction::where('transaction_id', $id)->first();
        if (!$row) {
            abort(404);
        }
        $row->unique_price = $row->price + $row->unique_code;

        return view('admin-side/transaction_detail', ['row' => $row]);
    }

    public function editStatus($id) {
        $row = Transaction::where('transaction_id', $id)->first();
        if (!$row) {
            abort(404);
        }
        $row->unique_price = $row->price + $row->unique_code;

        return view('admin-side/transaction_detail_edit', ['row' => $row]);
    }

    public function updateStatus(Request $request, $id) {
        $transaction = Transaction::where('transaction_id', $id)->first();
        if (count($transaction) > 0) {
            if ($transaction->status != $request->status) {
                $transaction->status = $request->status;
                $transaction->save();
            }
            if ($request->status != 'Canceled') {
                $details = json_decode($request->input('detail'));
                $newStatus = $request->input('status');
        
                Mail::send('email/status-notification', ['details' => $details, 'newStatus' => $newStatus], function ($message) use($details) {
                    $message->from('noie.fashion.official@gmail.com', 'NOIE');
                    $message->to($details->cust_email);
                    $message->subject("NOIE Order Status Update - Invoice id: " . $details->transaction_id);
                });
            }
            return redirect()->route('transaction.detail', [$transaction->transaction_id])->with('message', 'Transaction status successfully changed');
        } else {
            return redirect()->route('transaction.detail');
        }
        
    }

    public function downloadExcel() {
        return Excel::download(new TransactionsExport(), 'noie_transactions.xlsx');
    }
}
