@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li><a href="/manage/suppliers">Suppliers</a></li>
                <li class="active">Supplier</li>
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

                    <div class="supplier_profile_options"> 
                        <a href="/manage/suppliers/{{ $vars['supplier']->id }}/edit" class="brown tooltips" data-toggle="tooltip" data-original-title="Edit supplier"><i class="fa fa-edit"></i> Edit details</a> |
                        @if(\Auth::user()->role=='Admin'||\Auth::user()->role=='Staff') 
                        <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $vars['supplier']->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete supplier"><i class="fa fa-trash-o"></i></a>
                        @endif
                    </div> 
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-9">
                            <dl class="dl-horizontal">
                                <dt>Company Name</dt>
                                <dd>{{ $vars['supplier']->company_name }}</dd>
                                <dt>Contact Person</dt>
                                <dd><a href="/manage/users/{{ $vars['supplier']->user->fname }}">{{ $vars['supplier']->user->fname }} {{ $vars['supplier']->user->lname }}</a></dd>
                                <dt>Address</dt>
                                <dd>{{ $vars['supplier']->supplier_address }}</dd>
                                <dt>Mobile Number</dt>
                                <dd>{{ $vars['supplier']->supplier_mob_no }}</dd>
                                <dt>Tel Number</dt>
                                <dd>{{ $vars['supplier']->supplier_tel_no }}</dd>
                                <dt>Postal Code</dt>
                                <dd>{{ $vars['supplier']->supplier_postal_code }}</dd>
                                <dt>Email</dt>
                                <dd>{{ $vars['supplier']->supplier_email }}</dd>
                                <dt>Country</dt>
                                <dd>{{ $vars['supplier']->supplier_country}}</dd>
                                <dt>Is Verified</dt>
                                <dd>{{ $vars['supplier']->supplier_verified}}</dd>
                                <dt>Status</dt>
                                <dd><span class="{{ $vars['supplier']->label_color($vars['supplier']->supplier_status) }}">{{ $vars['supplier']->supplier_status }}</span></dd>
                                <dt>Added on</dt>
                                <dd>{{ $vars['supplier']->created_at->format('d M, Y') }}</dd>
                                <dt>Supplier Id #</dt>
                                <dd>{{ $vars['supplier']->id }}</dd>
                                <dt>Supplier Desc</dt>
                                <dd>{{ $vars['supplier']->supplier_description }}</dd>
                                <dt>Entered by</dt>
                                <dd>@if(isset($supplier->user))
                                <a href="/manage/users/{{ $vars['supplier']->user->id }}">{{ $vars['supplier']->user->name }} {{ $vars['supplier']->user->lname }}</a>
                                @endif
                                </dd>
                                <dt>Url</dt>
                                <dd><a href="/suppliers/{{ $vars['supplier']->id }}" target="_blank">http://sellyou.com/suppliers/{{ $vars['supplier']->id }}</a></dd>

                            </dl>
                        </div>
                        <div class="col-md-3">
                            <div class="box-shadow shadow-effect-2 pull-right">
                                @if(isset($vars['supplier']->supplier_img)&&$vars['supplier']->supplier_img!='cover.jpg')
                                <img class="img-responsive img-bordered thumbnail" src="{{ url('/') }}/thumbnails/{{ $vars['supplier']->supplier_img }}" alt="{{ $vars['supplier']->company_name }}">
                                @else
                                <img class="img-responsive img-bordered thumbnail" src="{{ url('/') }}/logos/generic_logo.jpg" alt="No cover image">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <pre>
                            {{ $vars['supplier']->body }}
                        </pre>
                    </div>

            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection