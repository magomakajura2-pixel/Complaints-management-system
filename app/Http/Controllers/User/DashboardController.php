<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        $totalComplaints = DB::table('complaints')
            ->where('userId', $userId)
            ->count();

        $pendingComplaints = DB::table('complaints')
            ->where('userId', $userId)
            ->whereNull('status')
            ->count();

        $inProcessComplaints = DB::table('complaints')
            ->where('userId', $userId)
            ->where('status', 'in process')
            ->count();

        $closedComplaints = DB::table('complaints')
            ->where('userId', $userId)
            ->where('status', 'closed')
            ->count();

        return view('user.dashboard', compact(
            'totalComplaints',
            'pendingComplaints',
            'inProcessComplaints',
            'closedComplaints'
        ));
    }
}
