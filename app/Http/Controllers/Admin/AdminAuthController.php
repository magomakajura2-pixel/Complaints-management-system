<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        if (session()->has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && $admin->password === md5($request->password)) {
            session(['admin_id' => $admin->id]);
            session(['admin_username' => $admin->username]);

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid username or password.'])->withInput($request->only('username'));
    }

    public function logout()
    {
        session()->forget('admin_id');
        session()->forget('admin_username');
        session()->flush();

        return redirect()->route('admin.login');
    }
}
