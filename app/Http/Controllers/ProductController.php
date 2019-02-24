<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Collection;
use App\Models\Product;

use App\Models\Transaction;

class ProductController extends Controller {
    public function index($collection_id) {
    	$collection = Collection::find($collection_id);

    	$products = Product::where('collection_id', $collection_id)->orderBy('name')->get();

        return view('user-side/products', ['collection' => $collection, 'products' => $products]);
    }

    public function confirmationPage(Request $request) {
        $usr_input = $request->all();
        return view('user-side/order_confirmation')->with('row', $usr_input);
    }
    public function orderSubmit(Request $request) {
        $order = $request->all();
        foreach ($order as $key => $value) {
            if ($value == null) {
                return redirect()->route('home');
            }
        }
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $max = strlen($characters) - 1;
        $t_id = '';
        for ($i = 0; $i < 3; $i++) {
            $t_id .= $characters[mt_rand(0, $max)];
        }
        $t_id .= uniqid();
        $unique_code = "";
        for ($i = 0; $i < 3; $i++) {
            $unique_code .= mt_rand(0,9);
        }
        $status = "Unpaid";
        Transaction::create([
            'transaction_id' => $t_id,
            'product_id' => $order["product-id"],
            'product_name' => $order["product"],
            'collection' => $order["collection"],
            'year' => $order["year"],
            'size' => $order["size"],
            'price' => $order["price"],
            'cust_name' => $order["name"],
            'cust_email' => $order["email"],
            'cust_phone' => $order["phone"],
            'cust_address' => $order["address"],
            'cust_city' => $order["city"],
            'cust_state' => $order["state"],
            'cust_zipcode' => $order["zipcode"],
            'unique_code' => $unique_code,
            'status' => $status,
        ]);
        return redirect()->route('home')->with('message', 'Order successfully submitted, check your email for details.');
    }
}
