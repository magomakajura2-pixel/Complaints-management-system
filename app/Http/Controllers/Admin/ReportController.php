<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function userReport(Request $request)
    {
        $users = null;
        $from_date = $request->input('from_date', '');
        $to_date = $request->input('to_date', '');

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $request->validate([
                'from_date' => 'required|date',
                'to_date' => 'required|date|after_or_equal:from_date',
            ]);

            $users = User::whereBetween('regDate', [$request->from_date, $request->to_date])->get();
        }

        return view('admin.reports.user_report', compact('users', 'from_date', 'to_date'));
    }

    public function complaintReport(Request $request)
    {
        $complaints = null;
        $from_date = $request->input('from_date', '');
        $to_date = $request->input('to_date', '');

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $request->validate([
                'from_date' => 'required|date',
                'to_date' => 'required|date|after_or_equal:from_date',
            ]);

            $complaints = Complaint::with(['user', 'category'])
                ->whereBetween('regDate', [$request->from_date, $request->to_date])
                ->get();
        }

        return view('admin.reports.complaint_report', compact('complaints', 'from_date', 'to_date'));
    }
}
