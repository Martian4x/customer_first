@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li class="active">Dashboard</li>
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
                <div class="tag-box tag-box-v3">
                    <div class="heading heading-v1">
                        <h2> Dashboard</h2>
                        <p>Hey! {{ \Auth::user()->fname }} {{ \Auth::user()->lname }}, Welcome to CustomerFirst Business Account.</p>
                    </div>

                    <hr class="devider devider-db">

                    <!-- Counters -->
                        <div class="row">
                            <div class="counters col-md-3 col-sm-3">
                                <span class="counter-icon"><i class="fa fa-music rounded"></i></span>
                                <span class="counter">0</span>
                                <h4>Products</h4>
                            </div>
                            <div class="counters col-md-3 col-sm-3">
                                <span class="counter-icon"><i class="fa fa-question rounded"></i></span>
                                <span class="counter">0</span>
                                <h4>Orders</h4>
                            </div>
                            <div class="counters col-md-3 col-sm-3">
                                <span class="counter-icon"><i class="fa fa-star-o rounded"></i></span>
                                <span class="counter">0</span>
                                <h4>Suppliers</h4>
                            </div>
                            <div class="counters col-md-3 col-sm-3">
                                <span class="counter-icon"><i class="fa fa-users rounded"></i></span>
                                <span class="counter">0</span>
                                <h4>Users</h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Counters -->
                </div>
            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection