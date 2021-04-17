@extends('layouts.app')
@section('content')

<div class="content-header">
<!-- leftside content header -->
<div class="leftside-content-header">
<ul class="breadcrumbs">
<li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
<li><a href="javascript:avoid(0)">Category</a></li>
<li><a href="javascript:avoid(0)">Update Category</a></li>
</ul>
</div>
</div>
<div class="row animated fadeInUp">
<div class="row">
<div class="col-sm-12 col-md-8 col-md-offset-2">
@include('includes.message')
<div class="panel b-primary bt-md">
    <div class="panel-content">
        <div class="row">
            <div class="col-xs-6">
                <h4>Category Update Form</h4>
            </div>
            <div class="col-xs-6 text-right">
                <a href="{{ route('manage-category') }}" class="btn btn-primary">All Category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <form class="form-horizontal" method="POST" action="{{ route('update-category') }}">
                    @csrf
                    <div class="form-group">
                        <label for="category_name" class="col-sm-3 control-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="hidden" name="id" value="{{ $row['id'] }}">
                            <input type="text" class="form-control" id="category_name" name="category_name"
                                value="{{ $row['category_name'] }}" laceholder="Category Name" data-validation="required">
                            @error('category_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Update Category<i
                                    class="fa fa-paper-plane"></i></button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>
@endsection
