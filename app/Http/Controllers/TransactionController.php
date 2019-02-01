<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Transaction;

class TransactionController extends Controller {
    public function index() {
        $transactions = DB::table('transactions')
                            ->join('products','transactions.product_id','=','products.product_id')
                            ->select('transactions.*', 'products.name as product_name', 'products.price as product_price')
                            ->get();
        foreach ($transactions as $transaction) {
            $transaction->product_price += $transaction->unique_code;
        }
        // $transactions = Transaction::all();
        // dd($transactions);

        return view('admin-side/transaction', ['transactions' => $transactions]);
    }

    public function detail($id) {
        $row = DB::table('transactions')->where('transaction_id', $id)->first();

        $product = DB::table('products')->where('product_id', $row->product_id)->first();
        $row->product_price = $product->price + $row->unique_code;
        $row->product_name = $product->name;

        // dd($row);

        return view('admin-side/transaction_detail', ['row' => $row]);
    }
}
