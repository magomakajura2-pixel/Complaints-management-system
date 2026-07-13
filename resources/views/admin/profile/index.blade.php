@extends('layouts.admin')
@section('title', 'CMS | Admin Profile')

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
                    <h5 class="m-b-10">Admin Profile</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Admin Profile</a></li>
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
            <div class="card-header">
                <h5>Update Profile</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> {{ session('success') }}
                </div>
                @endif
                <h5>View and Edit Profile</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('admin.profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" placeholder="Enter Full Name" name="fullname" value="{{ $admin->fullname }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" value="{{ $admin->email }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile Number</label>
                                <input type="text" placeholder="Enter Mobile Number" name="mobilenumber" value="{{ $admin->mobilenumber }}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
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
