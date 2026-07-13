@extends('layouts.admin')
@section('title', 'CMS | Users Search')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.search') }}">Users Search</a></li>
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
                <h5>Users Search</h5>
                <hr>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.search.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-2">Search</div>
                            <div class="col-4">
                                <input class="form-control" type="search" name="search" placeholder="Search By Mobile Number/Name/Email" value="{{ $search ?? '' }}" required>
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
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email </th>
                                                <th>Contact no</th>
                                                <th>Reg. Date </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $cnt = 1; @endphp
                                            @if($users && $users->count())
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $cnt }}</td>
                                                <td>{{ $user->fullName }}</td>
                                                <td>{{ $user->userEmail }}</td>
                                                <td>{{ $user->contactNo }}</td>
                                                <td>{{ $user->regDate }}</td>
                                                <td>
                                                    <a href="{{ route('admin.users.show', $user->id) }}" title="View Details">
                                                        <button type="button" class="btn btn-primary">View Detials</button>
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline" onsubmit="return confirm('Do you really want to delete ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
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
