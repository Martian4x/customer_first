@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li><a href="/manage/products">Products</a></li>
                <li class="active">product</li>
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

                    <div class="product_profile_options"> 
                        <a href="/manage/products/{{ $vars['product']->id }}/edit" class="brown tooltips" data-toggle="tooltip" data-original-title="Edit product"><i class="fa fa-edit"></i></a> | 
                        <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $vars['product']->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete product"><i class="fa fa-trash-o"></i></a>
                    </div> 
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-9">
                            <dl class="dl-horizontal">
                                <dt>Name</dt>
                                <dd>{{ $vars['product']->name }}</dd>
                                <dt>Supplier</dt>
                                <dd><a href="/manage/users/{{ $vars['product']->id }}">{{ $vars['product']->supplier->company_name }}</a></dd>
                                <dt>Type</dt>
                                <dd>{{ $vars['product']->type }}</dd>
                                <dt>Main Category</dt>
                                <dd>{{ $vars['product']->maincategory->name }}</dd>
                                <dt>Sub Category</dt>
                                <dd>{{ $vars['product']->subcategory->name }}</dd>
                                <dt>Price</dt>
                                <dd>{{ $vars['product']->price }}</dd>
                                <dt>Discount Price</dt>
                                <dd>{{ $vars['product']->price_discount }}</dd>
                                <dt>Quantity</dt>
                                <dd>{{ number_format($vars['product']->quantity) }} {{ $vars['product']->quantity_unit }}</dd>
                                <dt>Min Order</dt>
                                <dd>{{ number_format($vars['product']->min_quantity) }} {{ $vars['product']->quantity_unit }}</dd>
                                <dt>Badge status</dt>
                                <dd>{{ $vars['product']->badge }}</dd>
                                <dt>Status</dt>
                                <dd><span class="{{ $vars['product']->label_color($vars['product']->status) }}">{{ $vars['product']->status }}</span></dd>
                                <dt>Added on</dt>
                                <dd>{{ $vars['product']->created_at->format('d M, Y') }}</dd>
                                <dt>Updated on</dt>
                                <dd>{{ $vars['product']->updated_at->format('d M, Y') }}</dd>
                                <dt>product Id #</dt>
                                <dd>{{ $vars['product']->id }}</dd>
                                <dt>Entered by</dt>
                                <dd>@if(isset($vars['product']->entered_by))
                                <a href="/manage/users/{{ $vars['product']->entered_by->id }}">{{ $vars['product']->entered_by->fname }} {{ $vars['product']->entered_by->lname }}</a>
                                @endif
                                </dd>
                                <dt>Url</dt>
                                <dd><a href="/products/{{ $vars['product']->id }}" target="_blank">http://sellyou.com/products/{{ $vars['product']->id }}</a></dd>

                            </dl>
                        </div>
                        <div class="col-md-3">
                        <h5>Featured Image</h5>
                            <div class="box-shadow shadow-effect-2 pull-right">
                                @if(isset($vars['product']->product_img)&&$vars['product']->product_img!='cover.jpg')
                                <img class="img-responsive img-bordered thumbnail" src="{{ url('/') }}/assets/img/products/200x200/{{ $vars['product']->product_img }}" alt="{{ $vars['product']->company_name }}">
                                @else
                                <img class="img-responsive img-bordered thumbnail" src="{{ url('/') }}/assets/img/no_image.jpg" alt="No product image">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                            {{ $vars['product']->description }}
                    </div>

            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection