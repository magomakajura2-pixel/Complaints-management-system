@extends('layouts.admin')
@section('title', 'CMS | Between Dates Complaints Report')

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
                    <h5 class="m-b-10">Between Dates Complaints Report</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.reports.complaints') }}">Between Dates Complaints Report</a></li>
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
                <h5>Between Dates Complaints Report</h5>
                <hr>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.reports.complaints.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-2">From Date</div>
                            <div class="col-4"><input type="date" name="from_date" class="form-control" value="{{ $from_date ?? '' }}" required></div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                            <div class="col-2">To Date</div>
                            <div class="col-4"><input type="date" name="to_date" class="form-control" value="{{ $to_date ?? '' }}" required></div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                            <div class="col-6" align="center"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            @if($complaints && $complaints->count())
                            <br>
                            <h4 align="center" style="color:blue">Orders Report Form {{ $from_date }} To {{ $to_date }}</h4>
                            <hr />
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
                                            @foreach($complaints as $complaint)
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
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
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
