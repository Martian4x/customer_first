@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li><a href="/manage/maincategories">Maincategories</a></li>
                <li class="active">Edit Maincategory</li>
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
                        <h5 class="panel-title"><i class="icon-justify"></i>{{ $vars['title'] }} | {{ $vars['sub_title'] }} </h5>
                    </div>
                    <div class="panel-body">
                    {!! Form::model($vars['maincategory'], array(
                    'route' =>['manage.maincategories.update', $vars['maincategory']->id],
                    'method' => 'PATCH', 
                    'class'=>'form-horizontal sky-form', 
                    'role'=>'form', 
                    'files'=>true)) 
                    !!}

                    @include('manage.maincategories._form')

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn-u btn-u-brown">Update</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- End Horizontal Form -->

            </div>
            <!-- End Content -->
        </div> <!-- End Row -->

    </div>
</div><!--/container-->
<!--=== End Content Part ===-->

@endsection