@extends('layouts.user')
@section('title', 'CMS ||Register Complaint')

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
                    <h5 class="m-b-10">Register Complaint</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.complaints.create') }}">Register Complaint</a></li>
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
                <h5>Register Complaint</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <br />
                        <form method="post" name="complaint" enctype="multipart/form-data" action="{{ route('user.complaints.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <select name="category" id="category" class="form-control" onChange="getCat(this.value);" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->categoryName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Category</label>
                                <select name="subcategory" id="subcategory" class="form-control" required>
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Complaint Type</label>
                                <select name="complaintype" class="form-control" required>
                                    <option value="Complaint">Complaint</option>
                                    <option value="General Query">General Query</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <select name="state" required class="form-control">
                                    <option value="">Select State</option>
                                    @foreach($states as $st)
                                        <option value="{{ $st->stateName }}">{{ $st->stateName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nature of Complaint</label>
                                <input type="text" name="noc" required value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Complaint Details (max 2000 words)</label>
                                <textarea name="complaindetails" required cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Complaint Related Doc(if any)</label>
                                <input type="file" name="compfile" class="form-control" value="">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function getCat(catid) {
    $.ajax({
        type: "POST",
        url: "{{ route('user.get-subcategories') }}",
        data: { catid: catid, _token: '{{ csrf_token() }}' },
        success: function(data) {
            $('#subcategory').html(data);
        }
    });
}
</script>
@endsection
