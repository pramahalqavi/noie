<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceSearchController extends Controller {
    public function index() {
        return view('user-side/payment_status');
    }

}
