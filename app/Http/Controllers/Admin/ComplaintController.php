<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\ComplaintRemark;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with(['user', 'category'])->get();

        return view('admin.complaints.index', compact('complaints'));
    }

    public function show($id)
    {
        $complaint = Complaint::with(['user', 'category', 'remarks'])->findOrFail($id);

        return view('admin.complaints.show', compact('complaint'));
    }

    public function byStatus($status)
    {
        if ($status === 'not_processed') {
            $complaints = Complaint::with(['user', 'category'])->whereNull('status')->get();
        } elseif ($status === 'in_process') {
            $complaints = Complaint::with(['user', 'category'])->where('status', 'in process')->get();
        } else {
            $complaints = Complaint::with(['user', 'category'])->where('status', $status)->get();
        }

        return view('admin.complaints.index', compact('complaints'));
    }

    public function update(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);

        $request->validate([
            'status' => 'required|in:in process,closed',
            'remark' => 'required|string',
        ]);

        ComplaintRemark::create([
            'complaintNumber' => $complaint->complaintNumber,
            'status' => $request->status,
            'remark' => $request->remark,
            'remarkDate' => now(),
        ]);

        $complaint->update([
            'status' => $request->status,
            'lastUpdationDate' => now(),
        ]);

        return back()->with('success', 'Complaint updated successfully.');
    }

    public function search(Request $request)
    {
        $complaints = collect();
        $search = '';

        if ($request->isMethod('post')) {
            $search = $request->input('search', '');
            if ($search) {
                $complaints = Complaint::with(['user', 'category'])
                    ->where('complaintNumber', 'ILIKE', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('fullName', 'ILIKE', "%{$search}%");
                    })
                    ->orWhere('noc', 'ILIKE', "%{$search}%")
                    ->get();
            }
        }

        return view('admin.complaints.search', compact('complaints', 'search'));
    }

    public function userComplaints($userId)
    {
        $complaints = Complaint::with(['user', 'category'])
            ->where('userId', $userId)
            ->get();

        return view('admin.complaints.index', compact('complaints'));
    }
}
