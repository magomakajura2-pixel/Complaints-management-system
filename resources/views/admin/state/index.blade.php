@extends('layouts.admin')
@section('title', 'CMS | State')

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
                    <h5 class="m-b-10">State</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.state.index') }}">State</a></li>
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
                <h5>State</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        @if(session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Well done!</strong> {{ session('success') }}
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>Oh snap!</strong> {{ session('error') }}
                        </div>
                        @endif

                        <br />
                        <form method="POST" action="{{ route('admin.state.store') }}" name="Category">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">State Name</label>
                                <input type="text" placeholder="Enter State Name" name="stateName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea class="form-control" name="stateDescription" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Add</button>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Manage States</h5>
                            </div>
                            <div class="card-body table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>State</th>
                                                <th>Description</th>
                                                <th>Creation date</th>
                                                <th>Last Updated</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $cnt = 1; @endphp
                                            @foreach($states as $state)
                                            <tr>
                                                <td>{{ $cnt }}</td>
                                                <td>{{ $state->stateName }}</td>
                                                <td>{{ $state->stateDescription }}</td>
                                                <td>{{ $state->postingDate }}</td>
                                                <td>{{ $state->updationDate }}</td>
                                                <td>
                                                    <a href="{{ route('admin.state.edit', $state->id) }}" class="btn btn-icon btn-primary"><i class="feather icon-edit"></i></a>
                                                    <form method="POST" action="{{ route('admin.state.destroy', $state->id) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-icon btn-danger"><i class="feather icon-delete"></i></button>
                                                    </form>
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
