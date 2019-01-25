<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderFormController extends Controller {
    public function index() {
        return view('products/order_form');
    }
}
