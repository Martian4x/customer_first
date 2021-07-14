@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li><a href="/manage/users">Users</a></li>
                <li class="active">Add User</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <!-- Begin Sidebar Menu -->
            @include('layouts.sidebar_nav')
            <!-- End Sidebar Menu -->

            <!-- Begin Content -->
            <div class="col-md-9">
                <div class="tag-box tag-box-v3 tag-text-space margin-bottom-40">
                    <div class="heading heading-v1 margin-bottom-40">
                        <h2>{{ $vars['title'] }}</h2>
                        <p>{{ $vars['sub_title'] }}</p>
                        
                    <hr>
                    </div>
                        <dl class="dl-horizontal">
                            <dt>Full Name</dt>
                            <dd>{{ $vars['user']->fname }} {{ $vars['user']->lname }}</dd>
                            <dt>Username</dt>
                            <dd>{{ $vars['user']->username }}</dd>
                            <dt>Email</dt>
                            <dd>{{ $vars['user']->email }}</dd>
                            <dt>Address</dt>
                            <dd>{{ $vars['user']->address }}</dd>
                            <dt>Mobile</dt>
                            <dd>{{ $vars['user']->mob_no }} @if($vars['user']->mob_no_verified!='Yes')<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#mob_no_otp_modal">Verify Number</button>@else <span title="Mobile Number Verified"><i class="fa fa-check-circle green"></i></span> @endif</dd>
                            <dt>Role</dt>
                            <dd>{{ $vars['user']->role }}</dd>
                            <dt>Status</dt>
                            <dd>{{ $vars['user']->status }}</dd>
                            <dt>User Id #</dt>
                            <dd>{{ $vars['user']->id }}</dd>
                            <dt>Is Seller</dt>
                            <dd>
                                @if(isset($vars['user']->supplier))
                                <a href="/manage/suppliers/{{ $vars['user']->supplier->id }}">{{ $vars['user']->supplier->company_name }}</a>
                                @else
                                Not a seller
                                @endif
                            </dd>
                            <dt>Info</dt>
                            <dd>{{ $vars['user']->description }}</dd>
                        </dl>
                    <div class="col-md-3 pull-right">
                        <div class="box-shadow shadow-effect-2" style="margin-top: -180px;">
                        <div class="user_profile_options"> 
                                    <a href="/manage/users/{{ $vars['user']->id }}/edit" class="brown tooltips" data-toggle="tooltip" data-original-title="Edit User"><i class="fa fa-edit"></i></a> | 
                                    <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $vars['user']->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete User"><i class="fa fa-trash-o"></i></a>
                        </div>
                        @if(isset($vars['user']->img_url))
                            <img class="img-responsive img-bordered full-width" src="{{ $vars['user']->img_url }}" alt="{{ $vars['user']->fname }} {{ $vars['user']->mname }} {{ $vars['user']->lname }}">
                        @else
                            <img class="img-responsive img-bordered full-width" src="{{ url('/') }}/assets/img/users/{{ $vars['user']->img }}" alt="{{ $vars['user']->fname }} {{ $vars['user']->mname }} {{ $vars['user']->lname }}">
                        @endif
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection