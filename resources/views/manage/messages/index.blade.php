@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li class="active">Users</li>
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
                <!--Basic Table-->
                <div class="panel panel-default margin-bottom-40">
                    <div class="panel-heading">
                        <h5 class="panel-title"><i class="fa fa-users"></i>{{ $vars['title'] }} | {{ $vars['sub_title'] }}</h5>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <div style="margin: 10px;">
                            {!! Form::open( array('route' =>'manage.users.search','method'=>'GET')) !!}
                                <div class="col-lg-5" style="padding-right: 0">
                                    {!! Form::text('q', null, ['placeholder'=>'Search...', 'class'=>'form-control', 'required', 'id'=>'title']) !!} 
                                </div>
                                <div class="col-lg-1" style="padding-left: 0">
                                    <button type="submit" class="btn-u">Search</button>
                                </div>
                            {!! Form::close() !!}
                            </div>
                        </tr>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th class="hidden-sm">Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vars['users'] as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->fname }}</td>
                                <td>{{ $user->lname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mob_no }} {!! $user->number_verified()!!}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <a href="/manage/users/{{ $user->id }}" class="green tooltips" data-toggle="tooltip" data-original-title="View User"><i class="fa fa-eye"></i></a> | 
                                    <a href="/manage/users/{{ $user->id }}/orders" class="brown tooltips" data-toggle="tooltip" data-original-title="Users orders"><i class="fa fa-shopping-cart"></i></a> | 
                                    <a href="/manage/users/{{ $user->id }}/edit" class="brown tooltips" data-toggle="tooltip" data-original-title="Edit User"><i class="fa fa-edit"></i></a> | 
                                    <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $user->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete User"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!--End Basic Table-->
            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection