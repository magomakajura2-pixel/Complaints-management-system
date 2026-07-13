@extends('layouts.user')
@section('title', 'CMS | Dashboard')

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
                    <h5 class="m-b-10">Dashboard</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-xl-6">
        <div class="card flat-card widget-primary-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-b-10">Total Complaints</h6>
                        <h3 class="m-b-0">{{ $totalComplaints }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-6">
        <div class="card flat-card bg-danger">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-b-10 text-white">Pending Complaints</h6>
                        <h3 class="m-b-0 text-white">{{ $pendingComplaints }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file text-white" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-6">
        <div class="card flat-card bg-warning">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-b-10 text-white">Inprocess Complaints</h6>
                        <h3 class="m-b-0 text-white">{{ $inProcessComplaints }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file text-white" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-6">
        <div class="card flat-card widget-purple-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-b-10">Closed Complaints</h6>
                        <h3 class="m-b-0">{{ $closedComplaints }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection