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
                <li class="active">Subcategories</li>
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
                        <h5 class="panel-title"><i class="fa fa-tags"></i>{{ $vars['title'] }} | {{ $vars['sub_title'] }}</h5>
                        <span><a href="/manage/maincategories/{{{ $vars['maincategory']->id }}}/subcategories/create" class="pull-right list_plus_btn"><i class="fa fa-plus"></i> Add sub category</a></span>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <div style="margin: 10px;">
                            {!! Form::open( array('route' =>'manage.suppliers.search','method'=>'GET')) !!}
                                <div class="col-lg-5" style="padding-right: 0">
                                    {!! Form::text('q', null, ['placeholder'=>'Search...', 'class'=>'form-control', 'required', 'id'=>'title']) !!} 
                                </div>
                                <div class="col-lg-1" style="padding-left: 0">
                                    <button type="submit" class="btn-u">Search</button>
                                </div>
                            {!! Form::close() !!}
                            </div>
                        </tr>
                        <p class="default" style="text-align: center;clear: both;"><strong>This is where you can manage products sub categoies for {{ $vars['title'] }} type.</strong></p>
                            <tr>
                                <th>#</th>
                                <th>Sub name</th>
                                <th>Main name</th>
                                <th>Products</th>
                                <th>Descriptions</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vars['subcategories'] as $subcategory)
                            <tr>
                                <td>{{ $subcategory->id }}</td>
                                <td><a href="/manage/subcategories/{{ $subcategory->id }}">{{ $subcategory->name }}</a></td>
                                <td>{{ $subcategory->maincategory->name }}</td>
                                <td>{{ $subcategory->products->count() }}</td>
                                <td>{{ $subcategory->description }}</td>
                                <td>
                                    <a href="/manage/subcategories/{{ $subcategory->id }}/subcategories" class="blue tooltips" data-toggle="tooltip" data-original-title="View subcategories"><i class="fa fa-level-down"></i></a> |
                                    <a href="/manage/subcategories/{{ $subcategory->id }}" class="green tooltips" data-toggle="tooltip" data-original-title="View sub category"><i class="fa fa-eye"></i></a> |
                                    <a href="/manage/subcategories/{{ $subcategory->id }}/edit" class="black tooltips" data-toggle="tooltip" data-original-title="Edit sub category"><i class="fa fa-edit"></i></a> |
                                    <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $subcategory->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete sub category"><i class="fa fa-trash-o"></i></a>
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