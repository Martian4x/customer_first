@extends('layouts.main')

@section('content')

            <!--=== Content Part ===-->
    <div class="content container">
            <ul class="breadcrumb-v5">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/product">Products</a></li>
                @if(isset($vars['subcategory']))
                <li><a href="/products/maincategory/{{ $vars['maincategory']->slug }}">{{{ $vars['maincategory']->name }}}</a></li>
                <li class="active">{{{ $vars['subcategory']->name }}} </li>
                @elseif(isset($vars['maincategory']))
                <li class="active">{{{ $vars['maincategory']->name }}} </li>
                @endif
            </ul>

        <div class="row">
            <div class="col-md-3 filter-by-block md-margin-bottom-60">
                <h1>Categories</h1>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                @if(isset($vars['maincategory']))
                                    {{{ $vars['maincategory']->name }}}
                                    <i class="fa fa-angle-down"></i>
                                @endif
                                </a>
                            </h2>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="list-unstyled checkbox-list">
                                    <li>
                                        <label class="checkbox">
                                            <i></i>
                                            List
                                            <small><a href="#">(23)</a></small>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--/end panel group-->

            </div>

            <div class="col-md-9">
                <div class="row margin-bottom-5">
                    <div class="col-sm-12 result-category">
                        <h2>{{{ $vars['title'] }}}: <small>{{{ $vars['sub_title'] }}}</small></h2>
                        <small class="shop-bg-red badge-results">{{{ $vars['products']->count() }}} Results</small>
                    </div>
                </div><!--/end result category-->

                <div class="filter-results">
                @foreach($vars['products'] as $product)
                    <div class="list-product-description product-description-brd margin-bottom-30">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="/products/{{ $product->slug }}"><img class="img-responsive sm-margin-bottom-20" src="{{ url('/') }}/assets/img/products/original/{{{ $product->product_img }}}" alt=""></a>
                            </div>
                            <div class="col-sm-8 product-description">
                                <div class="overflow-h margin-bottom-5">
                                    <ul class="list-inline overflow-h">
                                        <li><h4 class="title-price"><a href="shop-ui-inner.html"></a>{{{ $product->name }}}</h4></li>
                                        <li><span class="gender text-capitalize">In  <a href="/products/maincategory/{{{ $product->maincategory->slug }}}/subcategory/{{{ $product->subcategory->slug }}}">{{{ $product->subcategory->name }}}</a></span></li>
                                    </ul>
                                    <div class="margin-bottom-10">
                                        <span class="title-price margin-right-10">${{{ number_format($product->price_discount) }}}</span>
                                        <span class="title-price line-through">${{{ number_format($product->price_discount) }}}</span>
                                    </div>
                                    <p class="margin-bottom-20">{{{ $product->description }}}</p>
                                    <ul class="list-inline add-to-wishlist margin-bottom-20">
                                        <li class="wishlist-in">
                                            <i class="fa fa-user"></i>
                                            <a href="/suppliers/{{ $product->supplier->id }}">{{{ $product->supplier->company_name }}}</a>
                                        </li>
                                        <li class="compare-in">
                                            <i class="fa fa-tag"></i>
                                            <a href="/badge/{{ $product->badge }}">{{{ $product->badge }}}</a>
                                        </li>
                                    </ul>
                                    <a  href="/products/{{ $product->slug }}" type="button" class="btn-u btn-u-sea-shop"><i class="fa fa-cart-plus"></i> &nbsp; Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div><!--/end filter resilts-->

                <div class="text-center">
                    {!! $vars['products']->render() !!}
                </div><!--/end pagination-->
            </div>
        </div><!--/end row-->
    </div><!--/end container-->
    <!--=== End Content Part ===-->

@endsection