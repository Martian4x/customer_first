@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li class="active">rewards</li>
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
                        <h5 class="panel-title"><i class="fa fa-shopping-cart"></i>{{ $vars['title'] }} | {{ $vars['sub_title'] }} ({{ $vars['rewards']->count() }})</h5>     
                        <span><a href="/manage/suppliers/rewards/create" class="pull-right list_plus_btn"><i class="fa fa-plus"></i> Add</a></span>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="profile-blog blog-border">
                
                                    {!! Form::open( array('route' =>'manage.rewards.store','class'=>'form-horizontal', 'role'=>'form')) !!}
                                        
                                    <div class="col-lg-6" style="margin-bottom: 10px">
                                        <label for="inputEmail1" class="col-lg-2 control-label">Customer</label>
                                        <div class="col-lg-10">
                                            <select name="customer_id" id="customer_id" class="form-control select2" required>
                                                <option value="">-- select customer --</option>
                                                @foreach($vars['supplier_customers'] as $customer)
                                                <option value="{{$customer->id}}">{{$customer->name}} ({{$customer->mob_no}})</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('customer_id', '<small class="error">:message</small>') !!}
                                        </div>
                                    </div>
                         
                                    <div class="col-lg-4">
                                        <label for="inputEmail1" class="col-lg-3 control-label">Amount</label>
                                        <div class="col-lg-9">
                                            {!! Form::number('amount', null, ['placeholder'=>'Amount', 'min'=>210, 'class'=>'form-control', 'id'=>'amount']) !!} 
                                            {!! $errors->first('amount', '<small class="error">:message</small>') !!}
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-2">
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button type="submit" id="submit" class="btn-u btn-u-green">Send</button>
                                        </div>
                                    </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Supplier</th>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vars['rewards'] as $reward)
                            <tr>
                                <td>{{ $reward->id }}</td>
                                <td>{{ $reward->customer->fname }} {{ $reward->customer->lname }}</td>
                                <td>@if($reward->supplier){{ $reward->supplier->company_name }}@endif</td>
                                <td>@if($reward->product){{ $reward->product->name }}@endif</td>
                                <td>{{ $reward->id }}</td>
                                <td>{{ $reward->reward_status }}</td>
                                <td>
                                    <a href="/manage/rewards/{{ $reward->id }}" class="green tooltips" data-toggle="tooltip" data-original-title="View reward"><i class="fa fa-eye"></i></a> | 
                                    <a href="/manage/rewards/{{ $reward->id }}/edit" class="brown tooltips" data-toggle="tooltip" data-original-title="Edit reward"><i class="fa fa-edit"></i></a> | 
                                    <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $reward->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete reward"><i class="fa fa-trash-o"></i></a>
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