@extends('layouts.admin')
@section('title', 'CMS | Manage Users')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
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
                <h5>View and Update Users Details</h5>
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
                                                <th> Name</th>
                                                <th>Email </th>
                                                <th>Contact no</th>
                                                <th>Reg. Date </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $cnt = 1; @endphp
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $cnt }}</td>
                                                <td>{{ $user->fullName }}</td>
                                                <td>{{ $user->userEmail }}</td>
                                                <td>{{ $user->contactNo }}</td>
                                                <td>{{ $user->regDate }}</td>
                                                <td>
                                                    <a href="{{ route('admin.users.show', $user->id) }}" title="View Details" class="btn btn-primary btn-xs">View Detials</a>
                                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline" onsubmit="return confirm('All complaints belongs to user will also delete.')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" title="Delete">Delete</button>
                                                    </form>
                                                    <a href="{{ route('admin.complaints.user', $user->id) }}" title="View User Complaints" class="btn btn-info btn-xs">Complaints</a>
                                                </td>
                                            </tr>
                                            @php $cnt = $cnt + 1; @endphp
                                            @endforeach
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
