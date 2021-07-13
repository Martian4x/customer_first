@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li class="active">Products</li>
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
                        <h5 class="panel-title"><i class="fa fa-align-justify"></i>{{ $vars['title'] }} | {{ $vars['sub_title'] }}</h5>
                        @if(isset(\Auth::user()->supplier->id))
                        <span><a href="/manage/suppliers/{{{ \Auth::user()->supplier->id }}}/products/create" class="pull-right list_plus_btn"><i class="fa fa-plus"></i> Add Product</a></span>
                        @endif
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <div style="margin: 10px;">
                                {!! Form::open( array('route' =>'manage.products.search','method'=>'GET')) !!}
                                    <div class="col-lg-5" style="padding-right: 0">
                                        {!! Form::text('q', null, ['placeholder'=>'Search...', 'class'=>'form-control', 'required', 'id'=>'title']) !!} 
                                    </div>
                                    <div class="col-lg-1" style="padding-left: 0">
                                        <button type="submit" class="btn-u">Search</button>
                                    </div>
                                {!! Form::close() !!}
                            
                                @if(\Auth::user()->role=='Admin'||\Auth::user()->role=='Staff')
                                    {!! Form::open( array('route' =>'manage.products.badge_update')) !!}
                                        <div class="col-lg-3" style="padding-right: 0">
                                            <div class="form-group">
                                            {!! Form::select('badge', [''=>'Badge status','Normal'=>'Normal','Recommended'=>'Recommended','Sponsored'=>'Sponsored', 'High-rated'=>'High-rated'],'', ['class'=>'form-control','id'=>'badge', 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-1" style="padding-left: 0;">
                                            <button type="submit" class="btn-u btn-u-brown">Change</button>
                                        </div>
                                @endif
                                </div>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th><i class="fa fa-check-square-o"></i></th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Category, Subcategory</th>
                                <th>Supplier</th>
                                <th>Price, Discount</th>
                                <th>Product Location</th>
                                <th>Status, Badge</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vars['products'] as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <input name="id[]" value="{{ $product->id }}" type="checkbox">
                                </td>
                                <td><a href="/manage/products/{{ $product->id }}">{{ $product->name }}</a></td>
                                <td>{{ $product->type }}</td>
                                <td>{{ $product->maincategory->name }}, {{ $product->subcategory->name }}</td>
                                <td><a href="/manage/users/{{ $product->supplier->id }}">{{ $product->supplier->company_name }}</a></td>
                                <td>{{ $product->price }} | {{ $product->price_discount }}</td>
                                <td>{{ $product->product_address }}</td>
                                <td>{{ $product->status }}, {{ $product->badge }}</td>
                                <td>
                                    <a href="/manage/products/{{ $product->id }}" class="green tooltips" data-toggle="tooltip" data-original-title="View product"><i class="fa fa-eye"></i></a> |
                                    <a href="/manage/products/{{ $product->id }}/photos" class="brown tooltips" data-toggle="tooltip" data-original-title="Upload product photos"><i class="fa fa-image"></i></a> | 
                                    <a href="/manage/products/{{ $product->id }}/edit" class="black tooltips" data-toggle="tooltip" data-original-title="Edit product"><i class="fa fa-edit"></i></a> | 

                                    @if(isset(\Auth::user()->role) && \Auth::user()->role=='Admin' || \Auth::user()->role=='Staff') 

                                    <a href="/manage/products/{{ $product->id }}/verify" class="blue tooltips" data-toggle="tooltip" data-original-title="Click to change verification status"><i class="fa fa-check-square-o"></i></a> |
                                    @endif
                                    <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $product->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete product"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        {!! Form::close() !!}
                        </tbody>
                    </table>
                    <div class="text-center">
                    {!! $vars['products']->render() !!}
                    </div>
                </div>
                <!--End Basic Table-->
            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection