@extends('layouts.admin')
@section('title', 'CMS | Dashboard Analytics')

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
                    <h5 class="m-b-10">Dashboard Analytics</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <!-- table card-1 start -->
    <div class="col-md-12 col-xl-4">
        <!-- widget primary card start -->
        <div class="card flat-card widget-primary-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="feather icon-users"></i>
                </div>
                <div class="col-sm-9">
                    <h4>{{ $totalUsers }}</h4>
                    <a href="{{ route('admin.users.index') }}"><h6>Total Users</h6></a>
                </div>
            </div>
        </div>
        <!-- widget primary card end -->
    </div>
    <!-- table card-1 end -->
    <!-- table card-2 start -->
    <div class="col-md-12 col-xl-4">
        <!-- widget-success-card start -->
        <div class="card flat-card bg-warning">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="fas fa-file"></i>
                </div>
                <div class="col-sm-9">
                    <h4>{{ $totalCategories }}</h4>
                    <a href="{{ route('admin.category.index') }}"><h6>Total Category</h6></a>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
    <div class="col-md-12 col-xl-4">
        <!-- widget-success-card start -->
        <div class="card flat-card widget-purple-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="fas fa-file"></i>
                </div>
                <div class="col-sm-9">
                    <h4>{{ $totalSubcategories }}</h4>
                    <a href="{{ route('admin.subcategory.index') }}"><h6>Total Subcategory</h6></a>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
    <!-- table card-2 end -->
    <div class="col-md-12 col-xl-4">
        <!-- widget-success-card start -->
        <div class="card flat-card bg-primary">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="fas fa-globe"></i>
                </div>
                <div class="col-sm-9">
                    <h4>{{ $totalStates }}</h4>
                    <a href="{{ route('admin.state.index') }}"><h6>Total State</h6></a>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
    <div class="col-md-12 col-xl-4">
        <!-- widget-success-card start -->
        <div class="card flat-card widget-purple-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="fas fa-file"></i>
                </div>
                <div class="col-sm-9">
                    <h4>{{ $totalComplaints }}</h4>
                    <a href="{{ route('admin.complaints.index') }}"><h6>Total Complaints</h6></a>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
    <div class="col-md-12 col-xl-4">
        <!-- widget-success-card start -->
        <div class="card flat-card bg-danger">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="fas fa-file"></i>
                </div>
                <div class="col-sm-9">
                    <h4>{{ $pendingComplaints }}</h4>
                    <a href="{{ route('admin.complaints.status', 'not_processed') }}"><h6>Pending Complaints</h6></a>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
    <div class="col-md-12 col-xl-4">
        <!-- widget-success-card start -->
        <div class="card flat-card bg-warning">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="fas fa-file"></i>
                </div>
                <div class="col-sm-9">
                    <h4>{{ $inProcessComplaints }}</h4>
                    <a href="{{ route('admin.complaints.status', 'in_process') }}"><h6>Inprocess Complaints</h6></a>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
    <div class="col-md-12 col-xl-4">
        <!-- widget-success-card start -->
        <div class="card flat-card widget-purple-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="fas fa-file"></i>
                </div>
                <div class="col-sm-9">
                    <h4>{{ $closedComplaints }}</h4>
                    <a href="{{ route('admin.complaints.status', 'closed') }}"><h6>Closed Complaints</h6></a>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('admin/assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/dashboard-main.js') }}"></script>
@endsection
