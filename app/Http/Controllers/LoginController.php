<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class LoginController extends Controller {
    use AuthenticatesUsers;

    public function index() {
        return view('admin-side/login');
    }

    public function loginAttempt(Request $request) {
        $auth = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
        if (!$auth) {
            return redirect()->back();
        }
        return redirect()->route('transaction');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
