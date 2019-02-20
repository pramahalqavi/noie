<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracker;

class HomeController extends Controller {
    public function index() {
        return view('user-side/home');
    }
}