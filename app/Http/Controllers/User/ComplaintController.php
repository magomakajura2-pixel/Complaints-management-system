<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        $complaints = DB::table('complaints')
            ->join('users', 'users.id', '=', 'complaints.userId')
            ->where('complaints.userId', $userId)
            ->select('complaints.*', 'users.fullName as name')
            ->orderBy('complaints.regDate', 'desc')
            ->get();

        return view('user.complaints.history', compact('complaints'));
    }

    public function show($id)
    {
        $complaint = DB::table('complaints')
            ->join('users', 'users.id', '=', 'complaints.userId')
            ->join('categories', 'categories.id', '=', 'complaints.category')
            ->where('complaints.complaintNumber', $id)
            ->select('complaints.*', 'users.fullName as name', 'categories.categoryName as catname')
            ->first();

        $remarks = DB::table('complaint_remarks')
            ->where('complaintNumber', $id)
            ->orderBy('remarkDate', 'asc')
            ->get();

        return view('user.complaints.show', compact('complaint', 'remarks'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        $states = DB::table('states')->get();

        return view('user.complaints.create', compact('categories', 'states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|integer',
            'subcategory' => 'required|string',
            'complaintype' => 'required|string',
            'state' => 'required|string',
            'noc' => 'required|string',
            'complaindetails' => 'required|string',
        ]);

        $filePath = '';
        if ($request->hasFile('compfile')) {
            $file = $request->file('compfile');
            $extension = '.' . $file->getClientOriginalExtension();
            $fileName = md5($file->getClientOriginalName()) . $extension;
            $file->move(public_path('complaintdocs'), $fileName);
            $filePath = $fileName;
        }

        $complaintId = DB::table('complaints')->insertGetId([
            'userId' => session('user_id'),
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'complaintType' => $request->complaintype,
            'state' => $request->state,
            'noc' => $request->noc,
            'complaintDetails' => $request->complaindetails,
            'complaintFile' => $filePath,
            'status' => null,
            'regDate' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ], 'complaintNumber');

        return redirect()->route('user.complaints.index')
            ->with('success', 'Your complaint has been successfully filed. Your complaint number is ' . $complaintId);
    }

    public function getSubcategories(Request $request)
    {
        $categoryId = $request->input('category_id') ?? $request->input('catid');
        $subcategories = DB::table('subcategories')
            ->where('categoryid', $categoryId)
            ->get();

        $html = '<option value="">Select Subcategory</option>';
        foreach ($subcategories as $sub) {
            $html .= '<option value="' . e($sub->subcategory) . '">' . e($sub->subcategory) . '</option>';
        }

        return response()->json($html);
    }
}
