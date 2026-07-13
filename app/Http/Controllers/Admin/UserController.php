<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('complaints')->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }

    public function search(Request $request)
    {
        $users = collect();
        $search = '';

        if ($request->isMethod('post')) {
            $search = $request->input('search', '');
            if ($search) {
                $users = User::where('fullName', 'ILIKE', "%{$search}%")
                    ->orWhere('userEmail', 'ILIKE', "%{$search}%")
                    ->get();
            }
        }

        return view('admin.users.search', compact('users', 'search'));
    }
}
