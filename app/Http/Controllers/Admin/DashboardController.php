<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\State;
use App\Models\Subcategory;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalSubcategories = Subcategory::count();
        $totalStates = State::count();
        $totalComplaints = Complaint::count();
        $pendingComplaints = Complaint::whereNull('status')->count();
        $inProcessComplaints = Complaint::where('status', 'in process')->count();
        $closedComplaints = Complaint::where('status', 'closed')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCategories',
            'totalSubcategories',
            'totalStates',
            'totalComplaints',
            'pendingComplaints',
            'inProcessComplaints',
            'closedComplaints'
        ));
    }
}
