<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use DateTime;
use DatePeriod;
use DateInterval;

class InvoiceSearchController extends Controller {
    public function index() {
        return view('user-side/payment_status');
    }

    public function doSearch(Request $request) {
        $query = $request->input('query');
        $transaction = Transaction::where('transaction_id', $query)->first();
        if ($transaction) {
            $result = new Transaction;
            $result->transaction_id = $transaction->transaction_id;
            $result->cust_name = $transaction->cust_name;
            $result->product_name = $transaction->product_name;
            $result->price = $transaction->price + $transaction->unique_code;
            $dt = new DateTime;
            if ($transaction->created_at->add(new DateInterval('P1D')) < $dt && $transaction->status == 'Unpaid') {
                $transaction->status = 'Canceled';
                $transaction->save();
            }
            $result->status = $transaction->status;
            return redirect()->route('payment-status')->with('result', $result)->withInput();
        }
        return redirect()->route('payment-status')->with('not_found', 'Not found')->withInput();
    }

}
