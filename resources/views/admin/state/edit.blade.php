@extends('layouts.admin')
@section('title', 'CMS | Edit State')

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
                    <h5 class="m-b-10">Edit State</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.state.index') }}">Edit State</a></li>
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
                <h5>Edit State</h5>
            </div>
            <div class="card-body">
                <h5>View and Edit State</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        @if(session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Well done!</strong> {{ session('success') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('admin.state.update', $state->id) }}">
                            @csrf
                            @method('PUT')
                            <br />
                            <div class="form-group">
                                <label for="exampleInputEmail1">State Name</label>
                                <input type="text" placeholder="Enter category Name" name="stateName" value="{{ $state->stateName }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea class="form-control" name="stateDescription" rows="5">{{ $state->stateDescription }}</textarea>
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
