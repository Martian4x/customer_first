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
                                <dt>Product ID</dt>
                                <dd>{{ $vars['product']->id }}</dd>
                                <dt>Url</dt>
                                <dd><a href="/products/{{ $vars['product']->id }}" target="_blank">http://sellyou.com/products/{{ $vars['product']->id }}</a></dd>

                            </dl>
                            <div class="row">

                        {!! Form::open( array('route' =>'manage.products.photo_store','class'=>'form-horizontal sky-form', 'role'=>'form', 'files'=>true)) !!}
                        {!! Form::hidden('product_id', $vars['product']->id) !!}
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label class="col-lg-2 control-label">Photo</label>
                                        <div class="col-lg-8">
                                            <label for="file" class="input input-file">
                                                <div class="button"><input type="file" name="img" id="file" required="true" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Choose an image" readonly>
                                            </label>
                                            {!! $errors->first('img', '<small class="error">:message</small>') !!}
                                        </div>
                                        <label class="col-lg-2">
                                                    <button type="submit" class="btn-u btn-u-brown pull-left">Upload</button>
                                        </label>
                                    </div>
                                </div>

                            {!! Form::close() !!}
                            </div> {{-- end of row --}}


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

            <!-- Begin Content -->
            <div class="col-md-12">

                <div class="row">
                        @foreach($vars['product']->photos as $photo)
                    <div class="col-md-4">
                        <div class="thumbnails thumbnail-style">
                            <a class="fancybox" data-rel="fancybox-button" title="{{ $photo->filename }}" href="{{ url('/') }}/assets/img/products/original/{{ $photo->filename }}">
                                <img class="img-responsive" src="{{ url('/') }}/assets/img/products/original/{{ $photo->filename }}" alt="{{ $photo->filename }}" />
                            </a>
                        </div>
                    </div>
                        @endforeach
                </div><!--/row-->
                <!-- End Thumbnails v3 -->
                <hr class="margin-bottom-30">
            </div>
            <!-- End Content -->

            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection