@extends('layouts.user')
@section('title', 'CMS|| Complaint History')

@section('sidebar')
@include('user.partials.sidebar')
@endsection

@section('header')
@include('user.partials.header')
@endsection

@section('breadcrumb')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Complaint History</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.complaints.index') }}">Complaint History</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5>View Complaint History</h5>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
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
                                                <td>{{ $cnt++ }}</td>
                                                <td>{{ $complaint->complaintNumber }}</td>
                                                <td>{{ $complaint->name }}</td>
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
                                                    <a href="{{ route('user.complaints.show', $complaint->complaintNumber) }}" class="btn btn-primary btn-sm">View Details</a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No complaints found.</td>
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
</div>
@endsection
