@extends('layouts.app')
@section('content')

<div class="content-header">
<!-- leftside content header -->
<div class="leftside-content-header">
<ul class="breadcrumbs">
<li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
<li><a href="javascript:avoid(0)">Category</a></li>
<li><a href="javascript:avoid(0)">Manage Category</a></li>
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
    <h4>Manage Category</h4>
</div>
<div class="col-xs-6 text-right">
    <a href="{{ route('add-category') }}" class="btn btn-primary">Add Category</a>
</div>
</div>
<div class="table-responsive">
<table id="basic-table"
    class="data-table table table-striped nowrap table-hover table table-bordered"
    cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Sl.No</th>
            <th>Category Name</th>
            <th>Status</th>
            <th>Acction</th>
        </tr>
    </thead>

    <tbody>
        @php($i = 1)


            @foreach ($category as $row)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $row->category_name }}</td>
                    {{-- <td>{{ $row->status == 1 ? 'Active' : 'Inactive' }}</td> --}}
                    <td>
                        <input type="checkbox" data-size="mini" data-toggle="toggle"
                            id="categorystatus" data-id="{{ $row->id }}" data-on="active"
                            data-off="inactive" {{ $row->status == 1 ? 'checked':'' }} >
                    </td>
                    <td>
                        {{-- @if ($row->status == 1)
<a href="{{ route('inactive',$row->id) }}" class="btn btn-info btn-xs"> <i
class="fa fa-arrow-up"></i></a>
@else
<a href="{{ route('active',$row->id) }}" class="btn btn-primary btn-xs"> <i
class="fa fa-arrow-down"></i></a>
@endif --}}

                        <a href="{{ route('edit-category', $row->id) }}"
                            class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i></a>
                        <a href="{{ route('delete-category', $row->id) }}"
                            class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @php($i++)
                @endforeach

            </tbody>
        </table>
    </div>


</div>
</div>
</div>
</div>
</div>
@endsection
