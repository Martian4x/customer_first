@extends('layouts.main')

@section('content')

    <!--=== Shop Product ===-->
    <div class="shop-product">
        <!-- Breadcrumbs v5 -->
        <div class="container">
            <ul class="breadcrumb-v5">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="#">Products</a></li>
                <li class="active">New </li>
            </ul>
        </div>
        <!-- End Breadcrumbs v5 -->

        <div class="container">
            <div class="row">
                <div class="col-md-6 md-margin-bottom-50">
                    <div class="ms-showcase2-template">
                        <!-- Master Slider -->
                        <div class="master-slider ms-skin-default" id="masterslider">
                        @foreach($vars['product']->photos as $photo)
                            <div class="ms-slide">
                                <img class="ms-brd" src="{{ url('/') }}/assets/img/blank.gif" data-src="{{ url('/') }}/assets/img/products/original/{{ $photo->filename }}" alt="{{ $photo->filename }}" style="width: 100%;margin: 0px;">
                                <img class="ms-thumb" src="{{ url('/') }}/assets/img/products/200x200/{{ $photo->filename }}" alt="{{ $photo->filename }}">
                            </div>
                        @endforeach
                        </div>
                        <!-- End Master Slider -->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="shop-product-heading">
                        <h2>{{{ $vars['product']->name }}}</h2>
                    </div><!--/end shop product social-->

                    <p>{{{ $vars['product']->description }}}</p><br>

                    <ul class="list-inline shop-product-prices margin-bottom-30">
                        <li class="shop-red">${{{ number_format($vars['product']->price_discount) }}}</li>
                        <li class="line-through">${{{ number_format($vars['product']->price) }}}</li>
                        <li><small class="shop-bg-red time-day-left">{{{ $vars['product']->badge }}}</small></li>
                    </ul><!--/end shop product prices-->

                    <h3 class="shop-product-title">Quantity in {{{ $vars['product']->maincategory->quantity_unit }}}</h3>
                    <div class="margin-bottom-40">
                    {!! Form::open( array('route' =>'add_to_cart','class'=>'product-quantity sm-margin-bottom-40', 'name'=>'f1', 'id'=>'cart_form', 'role'=>'form')) !!}
                             <input type="hidden" name="address" value="add_to_cart">
                             <input type="hidden" name="product_id" value="{{{ $vars['product']->id }}}" id="order_product_id">
                            <button type='button' class="quantity-button" name='subtract' onclick='javascript: subtractQty();' value='-'>-</button>
                            <input type='text' class="quantity-field" name='quantity' value="1" id='order_quantity'/>
                            <button type='button' class="quantity-button" name='add' onclick='javascript: document.getElementById("qty").value++;' value='+'>+</button>
                        
                        {{-- <button type="button" class="btn-u btn-warning addToCart"><i class="fa fa-cart-plus"></i> &nbsp; Add to Cart</button> --}}
                        {{-- <a type="button" href="javascript:;" onclick="orderNow()" class="btn-u btn-u-sea-shop order_now_check_btn"><i class="fa fa-cart-plus"></i> &nbsp; Order Now</a> --}}
                    {!! Form::close() !!}
                    </div><!--/end product quantity-->

                    <p class="wishlist-category" style="clear: both"><strong>Categories:</strong> 
                    <a href="#">{{{ $vars['product']->type }}},</a> 
                    <a href="#">{{{ $vars['product']->maincategory->name }}}</a>,
                    <a href="#">{{{ $vars['product']->subcategory->name }}}</a>
                    </p>
                </div>
            </div><!--/end row-->
        </div>
    </div>
    <!--=== End Shop Product ===-->

    <!--=== Content Medium ===-->
    <div class="container" style="padding-top: 40px">
        <div class="tab-v5">

            <div class="">
                <!-- Description -->
                <div class="tab-pane fade in active" id="description">
                    <div class="row">
                       @include('frontend.products.types._'.lcfirst($vars['product']->type))

                    </div>
                </div>
                <!-- End Description -->
            </div>
        </div>
    </div><!--/end container-->
    <!--=== End Content Medium ===-->

     <!--=== Illustration v2 ===-->
    <div class="container">
        <div class="heading heading-v1 margin-bottom-20">
            <h4>Product you may like</h4>
        </div>

        <div class="illustration-v2 margin-bottom-60">
            <div class="customNavigation margin-bottom-25">
                <a class="owl-btn prev rounded-x"><i class="fa fa-angle-left"></i></a>
                <a class="owl-btn next rounded-x"><i class="fa fa-angle-right"></i></a>
            </div>

            <ul class="list-inline owl-slider-v4">
            @foreach($vars['products'] as $product)
                <li class="item">
                    <a href="/products/{{{ $product->id }}}"><img class="img-responsive" src="{{ url('/') }}/assets/img/products/180x180/{{{ $product->product_img }}}" alt=""></a>
                    <div class="product-description-v2">
                        <div class="margin-bottom-5">
                            <h4 class="title-price"><a href="/products/{{{ $product->id }}}">{{{ $product->name }}}</a></h4>
                            <span class="title-price">${{{ number_format($product->price) }}}</span>
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
    <!--=== End Illustration v2 ===-->
@endsection