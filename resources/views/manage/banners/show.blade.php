@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li><a href="/manage/banners">Banners</a></li>
                <li class="active">Banner</li>
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

                    <div class="banner_profile_options"> 
                        <a href="/manage/banners/{{ $vars['banner']->id }}/edit" class="brown tooltips" data-toggle="tooltip" data-original-title="Edit banner"><i class="fa fa-edit"></i></a> | 
                        <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $vars['banner']->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete banner"><i class="fa fa-trash-o"></i></a>
                    </div> 
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-9">
                            <dl class="dl-horizontal">
                                <dt>Banner Name</dt>
                                <dd>{{ $vars['banner']->name }}</dd>
                                <dt>Caption</dt>
                                <dd>{{ $vars['banner']->caption }}</dd>
                                <dt>Status</dt>
                                <dd>{{ $vars['banner']->status }}</dd>
                                <dt>Start day</dt>
                                <dd>{{ $vars['banner']->start_day->format('d M, Y') }}</dd>
                                <dt>End day</dt>
                                <dd>{{ $vars['banner']->end_day->format('d M, Y') }}</dd>
                                <dt>Description</dt>
                                <dd>{{ $vars['banner']->description }}</dd>

                            </dl>
                        </div>
                    </div>

                    <div class="col-md-12">
                            <img alt="" src="{{ url('/') }}/assets/img/sliders/{{{ $vars['banner']->img }}}">
                    </div>

            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection