<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Transaction;
use App\Exports\TransactionsExport;
use Excel;

class TransactionController extends Controller {

    public function index() {
        $transactions = Transaction::orderBy('created_at','desc')->paginate(10);
        return view('admin-side/transaction', ['transactions' => $transactions]);
    }

    public function detail($id) {
        $row = Transaction::where('transaction_id', $id)->first();
        $row->unique_price = $row->price + $row->unique_code;

        return view('admin-side/transaction_detail', ['row' => $row]);
    }

    public function editStatus($id) {
        $row = Transaction::where('transaction_id', $id)->first();
        $row->unique_price = $row->price + $row->unique_code;

        return view('admin-side/transaction_detail_edit', ['row' => $row]);
    }

    public function updateStatus(Request $request, $id) {
        $transaction = Transaction::where('transaction_id', $id)->first();
        if ($transaction->status != $request->status) {
            $transaction->status = $request->status;
            $transaction->save();
        }

        return redirect()->route('transaction.detail', [$transaction->transaction_id]);
    }

    public function downloadExcel() {
        return Excel::download(new TransactionsExport(), 'noie_transactions.xlsx');
    }
}
