<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('users')
            ->where('userEmail', $request->email)
            ->first();

        if ($user && $user->password === md5($request->password)) {
            session([
                'user_id' => $user->id,
                'user_email' => $user->userEmail,
                'user_name' => $user->fullName,
            ]);

            return redirect()->route('user.dashboard');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function showRegistrationForm()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'contactno' => 'required|string|max:20',
        ]);

        DB::table('users')->insert([
            'fullName' => $request->fullname,
            'userEmail' => $request->email,
            'password' => md5($request->password),
            'contactNo' => $request->contactno,
            'status' => 1,
            'regDate' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('user.login')->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('user.login');
    }

    public function checkAvailability(Request $request)
    {
        $exists = DB::table('users')->where('userEmail', $request->email)->exists();

        return response()->json(['available' => !$exists]);
    }
}
