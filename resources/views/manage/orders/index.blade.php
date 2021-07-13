@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li class="active">orders</li>
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
                        <h5 class="panel-title"><i class="fa fa-shopping-cart"></i>{{ $vars['title'] }} | {{ $vars['sub_title'] }}</h5>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order #</th>
                                <th>Client</th>
                                <th>Supplier</th>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vars['orders'] as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->order_no }}</td>
                                <td>{{ $order->user->fname }} {{ $order->user->lname }}</td>
                                <td>{{ $order->carts->count() }}</td>
                                <td>{{ $order->carts->count() }}</td>
                                <td>{{ number_format($order->sub_total_price+$order->shipping_price) }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>
                                    <a href="/manage/orders/{{ $order->id }}" class="green tooltips" data-toggle="tooltip" data-original-title="View order"><i class="fa fa-eye"></i></a> | 
                                    <a href="/manage/orders/{{ $order->id }}/edit" class="brown tooltips" data-toggle="tooltip" data-original-title="Edit order"><i class="fa fa-edit"></i></a> | 
                                    <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $order->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete order"><i class="fa fa-trash-o"></i></a>
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