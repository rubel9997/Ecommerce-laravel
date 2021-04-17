
@extends('layouts.app')
@section('content')

<div class="content-header">
<!-- leftside content header -->
<div class="leftside-content-header">
    <ul class="breadcrumbs">
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="javascript:avoid(0)">Admin Profile</a></li>
    </ul>
</div>
</div>

<div class="row animated fadeInUp">
<div class="row">
    <div class="col-sm-12 col-md-6 col-md-offset-3">
    @include('includes.message')
        <div class="panel b-primary bt-md">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12 ">
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="{{ '/assets/admin/images/user.png' }}" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Name  : {{ Auth::User()->name }}</h4>
                            <h4 class="card-title">Email  : {{ Auth::User()->email }}</h4>
                        </div>
                        </div
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


@endsection
