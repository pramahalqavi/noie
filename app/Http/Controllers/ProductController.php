<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Collection;
use App\Models\Product;

use App\Models\Transaction;
use Mail;

class ProductController extends Controller {
    public function index($collection_id) {
        $collection = Collection::find($collection_id);
        if (!$collection) {
            abort(404);
        }
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
                return redirect()->route('home')->with('error', 'Order invalid');
            }
        }
        $product = Product::where('product_id', $order['product-id'])
            ->where('name', $order['product'])
            ->where('price', $order['price'])
            ->get();
        $collection = Collection::where('name', $order['collection'])
            ->where('year', $order['year'])
            ->get();
        if (count($product) > 0 && count($collection)) {
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
            $order["transaction_id"] = $t_id;
            $order["unique_code"] = $unique_code;
            $order["status"] = $status;
            $order["unique_price"] = $order["price"] + $unique_code;
            $order["date"] = date("d M Y G:i", time());
            Mail::send('email/order-notification', ['details' => $order], function ($message) use($order) {
                $message->from('noie.fashion.official@gmail.com', 'NOIE');
                $message->to($order["email"]);
                $message->subject("NOIE Product Order");
            });
            return redirect()->route('home')->with('message', 'Order successfully submitted, check your email for details.');
        } else {
            return redirect()->route('home')->with('error', 'Order invalid');
        }
    }
}
