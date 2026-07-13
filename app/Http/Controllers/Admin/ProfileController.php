<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = Admin::find(session('admin_id'));

        return view('admin.profile.index', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Admin::findOrFail(session('admin_id'));

        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobilenumber' => 'nullable|string|max:20',
        ]);

        $admin->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'mobilenumber' => $request->mobilenumber,
            'updationDate' => date('Y-m-d H:i:s'),
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function showSetting()
    {
        $admin = Admin::find(session('admin_id'));

        return view('admin.profile.setting', compact('admin'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = Admin::findOrFail(session('admin_id'));

        if ($admin->password !== md5($request->current_password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $admin->update([
            'password' => md5($request->password),
            'updationDate' => date('Y-m-d H:i:s'),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
