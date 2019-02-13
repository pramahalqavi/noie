<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Admin;

class AdminRoleController extends Controller {
    public function index() {
        $admins = DB::table('admins')->select('email')->paginate(10);
        return view('admin-side/adminRole', ['admins' => $admins]);
    }

    public function registerNewAdmin() {
        return view('admin-side/register-admin');
    }

    public function emailCheck(Request $request) {
        $email = $request->input('email');
        $isExists = Admin::where('email', $email)->first();
        if ($isExists){
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function submitRegister(Request $request) {
        $isExists = Admin::where('email', $request->email)->first();
        if ($isExists) {
            return redirect()->back()->with('error', 'Failed create admin, email has already registered before')->withInput();
        } else {
            Admin::create([
                'email' => $request->email,
                'password' => bcrypt($request->psw)
            ]);
            return redirect()->route('admin-role');
        }
    }
}
