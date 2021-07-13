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
                <li class="active">Maincategory</li>
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
                <div class="tag-box tag-box-v3 tag-text-space margin-bottom-10">
                    <div class="heading">
                        <h2>{{ $vars['title'] }}</h2>
                        <p>{{ $vars['sub_title'] }}</p>

                    <div class="maincategory_profile_options"> 
                        <a href="/manage/maincategories/{{ $vars['maincategory']->id }}/edit" class="brown tooltips" data-toggle="tooltip" data-original-title="Edit maincategory"><i class="fa fa-edit"></i></a> | 
                        <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $vars['maincategory']->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete maincategory"><i class="fa fa-trash-o"></i></a>
                    </div> 
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-9">
                            <dl class="dl-horizontal">
                                <dt>Main Categori Name</dt>
                                <dd>{{ $vars['maincategory']->name }}</dd>
                                <dt>Type</dt>
                                <dd><a href="/manage/type/{{ $vars['maincategory']->type }}">{{ $vars['maincategory']->type }}</a></dd>
                                <dt>Description</dt>
                                <dd>{{ $vars['maincategory']->description }}</dd>

                            </dl>
                        </div>
                    </div>

                    <div class="col-md-12">

                    </div>

            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection