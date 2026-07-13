@extends('layouts.admin')
@section('title', 'CMS | Search Complaints')

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
                    <h5 class="m-b-10">Search Complaints</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.complaints.search') }}">Search Complaints</a></li>
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
                <h5>Search Complaints</h5>
                <hr>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.complaints.search.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-2">Search</div>
                            <div class="col-8">
                                <input class="form-control" type="search" name="search" placeholder="Search By Complaint Number / Complainant name / Complainant number " value="{{ $search ?? '' }}" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top:1%;">
                            <div class="col-6" align="center"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            @if(isset($search) && $search)
                            <br>
                            <h4 align="center" style="color:blue">Search agianst: {{ $search }}</h4>
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
                                            @if($complaints && $complaints->count())
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
                                            @else
                                            <tr>
                                                <td colspan="6" style="color:red; font-size:16px;">No record found</td>
                                            </tr>
                                            @endif
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
