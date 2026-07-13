<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
            ->where('id', session('user_id'))
            ->first();
        $states = DB::table('states')->get();

        return view('user.profile.index', compact('user', 'states'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'contactno' => 'required|string|max:20',
        ]);

        DB::table('users')
            ->where('id', session('user_id'))
            ->update([
                'fullName' => $request->fullname,
                'userEmail' => $request->email,
                'contactNo' => $request->contactno,
                'address' => $request->address,
                'State' => $request->state,
                'country' => $request->country,
                'pincode' => $request->pincode,
                'updationDate' => now(),
                'updated_at' => now(),
            ]);

        session(['user_name' => $request->fullname, 'user_email' => $request->email]);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'userimage' => 'required|file|mimes:jpg,jpeg,png,gif',
        ]);

        $file = $request->file('userimage');
        $extension = '.' . $file->getClientOriginalExtension();
        $fileName = md5($file->getClientOriginalName()) . $extension;
        $file->move(public_path('userimages'), $fileName);

        DB::table('users')
            ->where('id', session('user_id'))
            ->update([
                'userImage' => $fileName,
                'updationDate' => now(),
                'updated_at' => now(),
            ]);

        return redirect()->route('user.profile')->with('success', 'Profile image updated successfully.');
    }

    public function showSetting()
    {
        $user = DB::table('users')
            ->where('id', session('user_id'))
            ->first();

        return view('user.profile.setting', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = DB::table('users')
            ->where('id', session('user_id'))
            ->first();

        if ($user->password !== md5($request->current_password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        DB::table('users')
            ->where('id', session('user_id'))
            ->update([
                'password' => md5($request->password),
                'updationDate' => now(),
                'updated_at' => now(),
            ]);

        return redirect()->route('user.settings')->with('success', 'Password updated successfully.');
    }
}
