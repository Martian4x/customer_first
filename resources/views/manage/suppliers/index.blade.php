@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li class="active">Suppliers</li>
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
                        <h5 class="panel-title"><i class="fa fa-share-square-o"></i>{{ $vars['title'] }} | {{ $vars['sub_title'] }}</h5>
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
                            <tr>
                                <th>#</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Tel</th>
                                <th>Contact</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>Ver</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vars['suppliers'] as $supplier)
                            <tr>
                                <td>{{ $supplier->id }}</td>
                                <td><a href="/manage/suppliers/{{ $supplier->id }}">{{ $supplier->company_name }}</a></td>
                                <td>{{ $supplier->supplier_email }}</td>
                                <td>{{ $supplier->supplier_tel_no }}</td>
                                <td><a href="/manage/users/{{ $supplier->user->id }}">{{ $supplier->user->lname }}</a></td>
                                <td>{{ $supplier->supplier_country }}</td>
                                <td>{{ $supplier->supplier_status }}</td>
                                <td>{{ $supplier->supplier_verified }}</td>
                                <td>
                                    <a href="/manage/suppliers/{{ $supplier->id }}" class="green tooltips" data-toggle="tooltip" data-original-title="View supplier"><i class="fa fa-eye"></i></a> |
                                    <a href="/manage/suppliers/{{ $supplier->id }}/edit" class="black tooltips" data-toggle="tooltip" data-original-title="Edit supplier"><i class="fa fa-edit"></i></a> | 

                                    @if(isset(\Auth::user()->role) && \Auth::user()->role=='Admin' || \Auth::user()->role=='Staff') 

                                    <a href="/manage/suppliers/{{ $supplier->id }}/verify" class="blue tooltips" data-toggle="tooltip" data-original-title="Click to change verification status"><i class="fa fa-check-square-o"></i></a> |


                                    <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $supplier->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete supplier"><i class="fa fa-trash-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                    {!! $vars['suppliers']->render() !!}
                    </div>
                </div>
                <!--End Basic Table-->
            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection