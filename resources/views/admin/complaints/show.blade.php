@extends('layouts.admin')
@section('title', 'CMS | Complaints Details')

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
                    <h5 class="m-b-10">Complaints Details</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.complaints.index') }}">Complaints Details</a></li>
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
                <h5>View Complaints Details</h5>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Complaint Number</b></td>
                                                <td>{{ $complaint->complaintNumber }}</td>
                                                <td><b>Complainant Name</b></td>
                                                <td>{{ $complaint->user->fullName ?? '-' }}</td>
                                                <td><b>Reg Date</b></td>
                                                <td>{{ $complaint->regDate }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Category </b></td>
                                                <td>{{ $complaint->category->categoryName ?? '-' }}</td>
                                                <td><b>SubCategory</b></td>
                                                <td>{{ $complaint->subcategory }}</td>
                                                <td><b>Complaint Type</b></td>
                                                <td>{{ $complaint->complaintType }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>State </b></td>
                                                <td>{{ $complaint->state }}</td>
                                                <td><b>Nature of Complaint</b></td>
                                                <td colspan="3">{{ $complaint->noc }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Complaint Details </b></td>
                                                <td colspan="5">{{ $complaint->complaintDetails }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>File(if any) </b></td>
                                                <td colspan="5">
                                                    @if($complaint->complaintFile && $complaint->complaintFile != 'NULL')
                                                    <a href="{{ asset('users/complaintdocs/' . $complaint->complaintFile) }}" target="_blank"/> View File</a>
                                                    @else
                                                    File NA
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Final Status</b></td>
                                                <td colspan="5">
                                                    @if($complaint->status == '' || $complaint->status == null)
                                                    <span class="badge badge-danger">Not Processed Yet</span>
                                                    @elseif($complaint->status == 'in process')
                                                    <span class="badge badge-warning">In Process</span>
                                                    @elseif($complaint->status == 'closed')
                                                    <span class="badge badge-success">Closed</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <hr>

                                            @if($complaint->remarks && $complaint->remarks->count())
                                            <tr>
                                                <th>S.No</th>
                                                <th colspan="3">Remark</th>
                                                <th>Status</th>
                                                <th>Updation Date</th>
                                            </tr>
                                            @php $cnt = 1; @endphp
                                            @foreach($complaint->remarks as $remark)
                                            <tr>
                                                <td>{{ $cnt }}</td>
                                                <td colspan="3">{{ $remark->remark }}</td>
                                                <td>{{ $remark->status }}</td>
                                                <td>{{ $remark->remarkDate }}</td>
                                            </tr>
                                            @php $cnt = $cnt + 1; @endphp
                                            @endforeach
                                            @endif

                                            <tr>
                                                <td>
                                                    @if($complaint->status != 'closed')
                                                    <a href="#" data-toggle="modal" data-target="#updateModal" title="Update order">
                                                        <button type="button" class="btn btn-primary">Take Action</button>
                                                    </a>
                                                    @endif
                                                </td>
                                                <td colspan="4">
                                                    <a href="{{ route('admin.users.show', $complaint->userId) }}" title="View User Details">
                                                        <button type="button" class="btn btn-primary">View User Detials</button>
                                                    </a>
                                                </td>
                                            </tr>
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

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.complaints.update', $complaint->complaintNumber) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Update Complaint Status</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Complaint Number</label>
                        <p>{{ $complaint->complaintNumber }}</p>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="in process">In Process</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Remark</label>
                        <textarea name="remark" class="form-control" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('admin/assets/js/pages/dashboard-main.js') }}"></script>
@endsection
