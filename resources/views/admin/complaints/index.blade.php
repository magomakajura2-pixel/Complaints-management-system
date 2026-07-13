@extends('layouts.admin')
@section('title', 'CMS | All Complaints')

@section('sidebar')
@include('admin.partials.sidebar')
@endsection

@section('header')
@include('admin.partials.header')
@endsection

@section('breadcrumb')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Manage Users</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.complaints.index') }}">All Complaints</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <!-- [ form-element ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5>All Complaints</h5>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Complaint No</th>
                                                <th>Complainant Name</th>
                                                <th>Reg Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $cnt = 1; @endphp
                                            @forelse($complaints as $complaint)
                                            <tr>
                                                <td>{{ $cnt }}</td>
                                                <td>{{ $complaint->complaintNumber }}</td>
                                                <td>{{ $complaint->user->fullName ?? '-' }}</td>
                                                <td>{{ $complaint->regDate }}</td>
                                                <td>
                                                    @if($complaint->status == '' || $complaint->status == null)
                                                    <span class="badge badge-danger">Not Processed Yet</span>
                                                    @elseif($complaint->status == 'in process')
                                                    <span class="badge badge-warning">In Process</span>
                                                    @elseif($complaint->status == 'closed')
                                                    <span class="badge badge-success">Closed</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.complaints.show', $complaint->complaintNumber) }}" class="btn btn-primary"> View Details</a>
                                                </td>
                                            </tr>
                                            @php $cnt = $cnt + 1; @endphp
                                            @empty
                                            <tr>
                                                <td colspan="6" style="color:red; font-size:16px;">No record found</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ form-element ] end -->
</div>
@endsection

@section('scripts')
<script src="{{ asset('admin/assets/js/pages/dashboard-main.js') }}"></script>
@endsection
