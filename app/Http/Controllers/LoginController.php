<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;

class LoginController extends Controller {
    use AuthenticatesUsers;

    public function index() {
        return view('admin-side/login');
    }

    public function loginAttempt(Request $request) {
        $auth = Admin::where('email', $request->email)->first();
        // $auth = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
        if (!$auth) {
            return redirect()->back()->with('error','Wrong email or password.')->withInput();
        } else {
             // dd(Auth::guard('admin')->user()->getEmail());
            if (Hash::check($request->password, $auth->password)) {
                Session::put('auth-email', $request->email);
                Session::put('auth-login', TRUE);
            return redirect()->route('stat');
            }
            return redirect()->back()->with('error','Wrong email or password.')->withInput();
        }
    }

    public function logout() {
        Session::flush();
        // Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
