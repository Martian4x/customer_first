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

                <!-- Horizontal Form -->
                <div class="panel panel-brown margin-bottom-40">
                    <div class="panel-heading">
                        <h5 class="panel-title"><i class="icon-user-follow"></i>{{ $vars['title'] }} | {{ $vars['sub_title'] }} </h5>
                    </div>
                    <div class="panel-body">
                    {!! Form::model($vars['user'], array(
                    'route' =>['manage.users.update', $vars['user']->id],
                    'method' => 'PATCH', 
                    'class'=>'form-horizontal', 
                    'role'=>'form', 
                    'id'=>'form', 
                    'files'=>true)) 
                    !!}
                    {!! Form::hidden('user_id', $vars['user']->id, ['id'=>'user_id']) !!}

                    @include('manage.users._form')

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" id="submit" class="btn-u btn-u-green">Update</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- End Horizontal Form -->

            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection