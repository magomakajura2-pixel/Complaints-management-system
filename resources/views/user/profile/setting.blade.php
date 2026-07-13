@extends('layouts.user')
@section('title', 'CMS||Change Password')

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
                    <h5 class="m-b-10">Change Password</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.settings') }}">Change Password</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Change Password</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" name="chngpwd" action="{{ route('user.settings.update') }}" onSubmit="return valid();">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" class="form-control" id="cpass" name="current_password" required>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" id="newpass" name="password" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="cnfpass" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="update" id="update">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
function valid() {
    if(document.chngpwd.password.value != document.chngpwd.password_confirmation.value) {
        alert("Password and Confirm Password Field do not match !!");
        document.chngpwd.password_confirmation.focus();
        return false;
    }
    return true;
}
</script>
@endsection
