@extends('layouts.admin')
@section('title', 'CMS | Change Password')

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
                    <h5 class="m-b-10">Change Password</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.settings') }}">Change Password</a></li>
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
                <h5>Change Password</h5>
            </div>
            <div class="card-body">
                <h5>Reset Your Password</h5>
                <hr>
                @if(session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> {{ session('success') }}
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('admin.settings.update') }}" name="chngpwd" onSubmit="return valid();">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Password</label>
                                <input type="password" class="form-control" id="cpass" name="current_password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">New Password</label>
                                <input type="password" class="form-control" id="newpass" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" class="form-control" id="cnfpass" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="update" id="update">Submit</button>
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
<script type="text/javascript">
function valid()
{
    if(document.chngpwd.password.value != document.chngpwd.password_confirmation.value)
    {
        alert("Password and Confirm Password Field do not match  !!");
        document.chngpwd.password_confirmation.focus();
        return false;
    }
    return true;
}
</script>
@endsection
