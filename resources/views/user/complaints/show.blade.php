@extends('layouts.user')
@section('title', 'CMS|| Complaint Details')

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
                    <h5 class="m-b-10">Complaint Details</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.complaints.index') }}">Complaint Details</a></li>
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
                <h5>View Complaint Details</h5>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><b>Complaint Number</b></td>
                                            <td>{{ $complaint->complaintNumber }}</td>
                                            <td><b>Complainant Name</b></td>
                                            <td>{{ $complaint->name }}</td>
                                            <td><b>Reg Date</b></td>
                                            <td>{{ $complaint->regDate }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Category</b></td>
                                            <td>{{ $complaint->catname }}</td>
                                            <td><b>SubCategory</b></td>
                                            <td>{{ $complaint->subcategory }}</td>
                                            <td><b>Complaint Type</b></td>
                                            <td>{{ $complaint->complaintType }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>State</b></td>
                                            <td>{{ $complaint->state }}</td>
                                            <td><b>Nature of Complaint</b></td>
                                            <td colspan="3">{{ $complaint->noc }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Complaint Details</b></td>
                                            <td colspan="5">{{ $complaint->complaintDetails }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>File(if any)</b></td>
                                            <td colspan="5">
                                                @if($complaint->complaintFile && $complaint->complaintFile != 'NULL')
                                                    <a href="{{ asset('complaintdocs/' . $complaint->complaintFile) }}" target="_blank">View File</a>
                                                @else
                                                    File NA
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Final Status</b></td>
                                            <td colspan="5">
                                                @if($complaint->status == '')
                                                    <span class="badge badge-danger">Not Processed Yet</span>
                                                @elseif($complaint->status == 'in process')
                                                    <span class="badge badge-warning">In Process</span>
                                                @elseif($complaint->status == 'closed')
                                                    <span class="badge badge-success">Closed</span>
                                                @endif
                                            </td>
                                        </tr>

                                        @if(count($remarks) > 0)
                                        <tr>
                                            <th colspan="4">Remark</th>
                                            <th>Status</th>
                                            <th>Updation Date</th>
                                        </tr>
                                        @foreach($remarks as $rw)
                                        <tr>
                                            <td colspan="4">{{ $rw->remark }}</td>
                                            <td>{{ $rw->status }}</td>
                                            <td>{{ $rw->remarkDate }}</td>
                                        </tr>
                                        @endforeach
                                        @endif
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
