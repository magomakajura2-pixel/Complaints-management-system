@extends('layouts.admin')
@section('title', 'CMS | Subcategory')

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
                    <h5 class="m-b-10">Subcategory</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.subcategory.index') }}">Subcategory</a></li>
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
                <h5>Subcategory</h5>
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
                        <form method="POST" action="{{ route('admin.subcategory.store') }}" name="Category">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <select name="categoryid" class="form-control" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->categoryName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SubCategory Name</label>
                                <input type="text" placeholder="Enter SubCategory Name" name="subcategory" class="form-control" required>
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
                                <h5>Manage Sub Categories</h5>
                            </div>
                            <div class="card-body table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Description</th>
                                                <th>Creation date</th>
                                                <th>Last Updated</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $cnt = 1; @endphp
                                            @foreach($subcategories as $sub)
                                            <tr>
                                                <td>{{ $cnt }}</td>
                                                <td>{{ $sub->category->categoryName ?? '' }}</td>
                                                <td>{{ $sub->subcategory }}</td>
                                                <td>{{ $sub->category->categoryDescription ?? '' }}</td>
                                                <td>{{ $sub->creationDate }}</td>
                                                <td>{{ $sub->updationDate }}</td>
                                                <td>
                                                    <a href="{{ route('admin.subcategory.edit', $sub->id) }}" class="btn btn-icon btn-primary"><i class="feather icon-edit"></i></a>
                                                    <form method="POST" action="{{ route('admin.subcategory.destroy', $sub->id) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete?')">
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
