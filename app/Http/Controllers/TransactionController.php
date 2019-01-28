<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Transaction;

class TransactionController extends Controller {
    public function index() {
        // $transactions = DB::table('transactions')
        //                     ->join('products','transactions.product_id','=','products.product_id')
        //                     ->select('transactions.*', 'products.name')
        //                     ->get();
        $transactions = Transaction::all();

        return view('admin-side/transaction', ['transactions' => $transactions]);
    }
}
