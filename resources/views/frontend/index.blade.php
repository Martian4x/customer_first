@extends('layouts.main')

@section('content')

    <!--=== Content Part ===-->
    <div class="container content">
       <div class="row">
            <!-- Begin Content -->
        <div class="col-md-3">
            <h4>Categories</h4>
            <!-- Accordion v1 -->
            <div class="panel-group acc-v1" id="accordion-1">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-One">
                                                <i class="fa fa-leaf"></i>  Agriculture
                                            </a>
                                    </h4>
                            </div>
                            <div id="collapse-One" class="panel-collapse collapse">
                                <div class="panel-body">
                                       <ul class="list-unstyled link-main-list">
                                       @foreach($maincategories['agricultural'] as $maincategory)
                                           <li><a href="/products/maincategory/{{{ $maincategory->slug }}}">{{{ $maincategory->name }}} ({{{ $maincategory->products->count() }}})</a></li>
                                        @endforeach
                                       </ul>
                                </div>
                            </div>
                    </div>

                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-Two">
                                                <i class="fa fa-black-tie"></i>    Clothing, Shoes and Fashion
                                            </a>
                                    </h4>
                            </div>
                            <div id="collapse-Two" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <ul class="list-unstyled link-main-list">
                                           @foreach($maincategories['clothing'] as $maincategory)
                                               <li><a href="/products/maincategory/{{{ $maincategory->slug }}}">{{{ $maincategory->name }}} ({{{ $maincategory->products->count() }}})</a></li>
                                            @endforeach
                                       </ul>
                                    </div>
                            </div>
                    </div>

                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-Three">
                                                <i class="fa fa-image"></i>    Crafts and Hand-made
                                            </a>
                                    </h4>
                            </div>
                            <div id="collapse-Three" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <ul class="list-unstyled link-main-list">
                                       @foreach($maincategories['crafts'] as $maincategory)
                                           <li><a href="/products/maincategory/{{{ $maincategory->slug }}}">{{{ $maincategory->name }}} ({{{ $maincategory->products->count() }}})</a></li>
                                        @endforeach
                                       </ul>
                                    </div>
                            </div>
                    </div>

                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-Four">
                                                 <i class="fa fa-calculator"></i>   Electric and Electronics
                                            </a>
                                    </h4>
                            </div>
                            <div id="collapse-Four" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <ul class="list-unstyled link-main-list">
                                       @foreach($maincategories['electronic'] as $maincategory)
                                           <li><a href="/products/maincategory/{{{ $maincategory->slug }}}">{{{ $maincategory->name }}} ({{{ $maincategory->products->count() }}})</a></li>
                                        @endforeach
                                       </ul>
                                    </div>
                            </div>
                    </div>

                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-Five">
                                                <i class="fa fa-gears"></i>    Manufacturing Products
                                            </a>
                                    </h4>
                            </div>
                            <div id="collapse-Five" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <ul class="list-unstyled link-main-list">
                                       @foreach($maincategories['manufacturing'] as $maincategory)
                                           <li><a href="/products/maincategory/{{{ $maincategory->slug }}}">{{{ $maincategory->name }}} ({{{ $maincategory->products->count() }}})</a></li>
                                        @endforeach
                                       </ul>
                                    </div>
                            </div>
                    </div>

                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-Six">
                                                <i class="fa fa-diamond"></i>    Minerals
                                            </a>
                                    </h4>
                            </div>
                            <div id="collapse-Six" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <ul class="list-unstyled link-main-list">
                                       @foreach($maincategories['mineral'] as $maincategory)
                                           <li><a href="/products/maincategory/{{{ $maincategory->slug }}}">{{{ $maincategory->name }}} ({{{ $maincategory->products->count() }}})</a></li>
                                        @endforeach
                                       </ul>
                                    </div>
                            </div>
                    </div>

                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-Seven">
                                                <i class="fa fa-slack"></i>    Textiles
                                            </a>
                                    </h4>
                            </div>
                            <div id="collapse-Seven" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <ul class="list-unstyled link-main-list">
                                       @foreach($maincategories['textile'] as $maincategory)
                                           <li><a href="/products/maincategory/{{{ $maincategory->slug }}}">{{{ $maincategory->name }}} ({{{ $maincategory->products->count() }}})</a></li>
                                        @endforeach
                                       </ul>
                                    </div>
                            </div>
                    </div>
            </div>
            <!-- End Accordion v1 -->

            <div class="margin-bottom-20"></div>
        </div>
        <!-- End Content -->

                    <!-- Carousel -->
            <div class="col-md-9">
                <div class="carousel slide carousel-v1" id="myCarousel">
                    <div class="carousel-inner">
                    <?php $i = -1 ?>
                        @foreach($vars['banners'] as $banner)
                    <?php $i++ ?>
                            <div class="item 
                                @if($i=='1')
                                    active
                                @endif
                            ">
                                <a href="#"><img alt="" src="{{ url('/') }}/assets/img/sliders/{{{ $banner->img }}}"></a>
                            </div>
                        @endforeach
                    </div>

                    <div class="carousel-arrow">
                        <a data-slide="prev" href="#myCarousel" class="left carousel-control">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a data-slide="next" href="#myCarousel" class="right carousel-control">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Carousel -->
       </div>

        <hr>

        <div class="headline margin-bottom-35"><h4>Order Recommended Products Here</h4></div>

        <!-- Easy Blocks v1 -->
        <div class="row high-rated margin-bottom-20">
        @foreach($vars['recommended_products'] as $product)
            <!-- Easy Block -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-40">
                <div class="easy-block-v1">
                    <div class="easy-block-v1-badge rgba-default">{{{ $product->type }}}</div>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="rounded-x active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img alt="" src="{{ url('/') }}/assets/img/products/973x615/{{{ $product->product_img }}}">
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        <li><span class="color-green">Category:</span> {{{ $product->maincategory->name }}}</li>
                        <li><span class="color-green">Price:</span> {{{ number_format($product->price) }}} USD</li>
                    </ul>
                    <a class="btn-u btn-u-sm btn-u-sea" href="#">View details</a>
                    <a class="btn-u btn-u-sm" href="#">Add to cart</a>
                </div>
            </div>
            <!-- End Easy Block -->
        @endforeach
        </div>
        <!-- End Easy Blocks v1 -->

        <div class="clearfix margin-bottom-20"><hr></div>

        <!-- Owl Carousel v2 -->
        <div class="owl-carousel-v2 owl-carousel-style-v1 margin-bottom-10">
            <h4 class="heading-md">Our high rated products list</h4>

            <div class="owl-slider-v2">
            @foreach($vars['high_rated_products'] as $product)
                <div class="item">
                    <a href="/products/{{{ $product->slug }}}"><img class="img-responsive" src="{{ url('/') }}/assets/img/products/200x200/{{ $product->product_img }}" alt="">
                    <h5>{{{ $product->name }}}</h5></a>
                </div>
            @endforeach
            </div>

            <div class="owl-navigation">
                <div class="customNavigation">
                    <a class="owl-btn prev-v2"><i class="fa fa-angle-left"></i></a>
                    <a class="owl-btn next-v2"><i class="fa fa-angle-right"></i></a>
                </div>
            </div><!--/navigation-->
        </div>
        <!-- End Owl Carousel v2 -->
    </div>
    <!--=== End Content Part ===-->

    <!--=== Job Partners ===-->
    {{-- <div class="container content job-partners">
        <div class="title-box-v2">
            <h4>Our <span class="color-green">Featured</span> Suppliers</h4>
        </div>

        <ul class="list-inline our-clients" id="effect-2"> 
        @foreach($vars['featured_suppliers'] as $supplier)
            <li>
                <figure>
                    <img src="{{ url('/') }}/thumbnails/{{{ $supplier->supplier_img }}}" alt="">
                    <div class="img-hover">
                        <h4>{{{ $supplier->company_name }}}</h4>
                    </div>
                </figure>
            </li>
        @endforeach
        </ul>
    </div> --}}
    <!--/container-->
    <!--=== End Job Partners ===-->

@endsection