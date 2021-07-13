@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li class="active">Banners</li>
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
                        <h5 class="panel-title"><i class="fa fa-object-ungroup"></i>{{ $vars['title'] }} | {{ $vars['sub_title'] }}</h5>
                        <span><a href="/manage/banners/create" class="pull-right list_plus_btn"><i class="fa fa-plus"></i> Add Banner</a></span>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <div style="margin: 10px;">
                            {!! Form::open( array('route' =>'manage.banners.search','method'=>'GET')) !!}
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
                                <th>Image</th>
                                <th>Banner name</th>
                                <th>Caption</th>
                                <th>Img</th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vars['banners'] as $banner)
                            <tr>
                                <td><img alt="" src="{{ url('/') }}/assets/img/sliders/thumbnails/{{{ $banner->img }}}"></td>
                                <td><a href="/manage/banners/{{ $banner->id }}">{{ $banner->name }}</a></td>
                                <td>{{ $banner->caption }}</td>
                                <td>{{ $banner->img }}</td>
                                <td>{{ $banner->status }}</td>
                                <td>{{ $banner->start_day->format('d M, Y') }} -> {{ $banner->end_day->format('d M, Y') }}</td>
                                <td>
                                    <a href="/manage/banners/{{ $banner->id }}" class="green tooltips" data-toggle="tooltip" data-original-title="View main category"><i class="fa fa-eye"></i></a> |
                                    <a href="/manage/banners/{{ $banner->id }}/edit" class="black tooltips" data-toggle="tooltip" data-original-title="Edit main category"><i class="fa fa-edit"></i></a> |
                                    
                                    <a href="#" class="red deleteTr tooltips" data-address="banners" data-id="{{ $banner->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete banner"><i class="fa fa-trash-o"></i></a>
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