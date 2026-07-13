@extends('layouts.user')
@section('title', 'CMS||User Profile')

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
                    <h5 class="m-b-10">User Profile</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.profile') }}">User Profile</a></li>
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
                <h5>User Profile</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <form method="post" action="{{ route('user.profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="fullname" required value="{{ $user->fullName }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>User Email</label>
                                <input type="email" name="email" required value="{{ $user->userEmail }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" name="contactno" required value="{{ $user->contactNo }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" required class="form-control">{{ $user->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <select name="state" required class="form-control">
                                    <option value="{{ $user->State }}">{{ $user->State }}</option>
                                    @foreach($states as $st)
                                        @if($st->stateName != $user->State)
                                            <option value="{{ $st->stateName }}">{{ $st->stateName }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" name="country" required value="{{ $user->country }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Pincode</label>
                                <input type="text" name="pincode" maxlength="6" required value="{{ $user->pincode }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Reg Date</label>
                                <input type="text" name="regdate" required value="{{ $user->regDate }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>User Photo</label>
                                @if($user->userImage == '' || $user->userImage == null)
                                    <img src="{{ asset('admin/assets/images/user/user.png') }}" width="256" height="256">
                                    <a href="{{ route('user.profile') }}#image">Change Photo</a>
                                @else
                                    <img src="{{ asset('userimages/' . $user->userImage) }}" width="256" height="256">
                                    <a href="{{ route('user.profile') }}#image">Change Photo</a>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <div id="image" style="margin-top: 30px;">
                            <form method="post" action="{{ route('user.profile.image') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Upload New Photo</label>
                                    <input type="file" name="userimage" required />
                                </div>
                                <button type="submit" class="btn btn-primary">Update Photo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
