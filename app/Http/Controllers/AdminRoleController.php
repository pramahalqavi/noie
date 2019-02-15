<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;

class AdminRoleController extends Controller {
    public function index() {
        $admins = DB::table('admins')->select('email')->paginate(15);
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
            return redirect()->back()->with('error', 'Create admin failed, email has already registered before.')->withInput();
        } else {
            Admin::create([
                'email' => $request->email,
                'password' => bcrypt($request->psw)
            ]);
            return redirect()->route('admin-role')->with('message', 'Admin successfully registered.');
        }
    }

    public function deleteAdmin(Request $request) {
        $isExists = Admin::where('email', $request->email)->first();
        if (!$isExists) {
            return redirect()->back()->with('error', 'Delete admin failed.');
        } else {
            Admin::where('email', $request->email)->delete();
            return redirect()->route('admin-role')->with('message', 'Admin successfully deleted.');
        }
    }

    public function changePassword() {
        return view('admin-side/change-password');
    }

    public function submitChangePassword(Request $request) {
        $email = Session::get('auth-email');
        $admin = Admin::where('email', $email)->first();
        if (Hash::check($request->curpsw, $admin->password)) {
            $admin->password = bcrypt($request->psw);
            $admin->save();
            return redirect()->back()->with('message', 'Password successfully changed.');
        } else {
            return redirect()->back()->with('error', 'Change password failed, wrong current password.');
        }
    }
}
