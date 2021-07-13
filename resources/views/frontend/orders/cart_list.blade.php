@extends('layouts.main')

@section('content')

    <div class="content container" style="padding-bottom: 0px;">
        <ul class="breadcrumb-v5">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li class="active">Cart list</li>
        </ul>
    </div>

    <!--=== Content Medium Part ===-->
    <div class="content margin-bottom-30">

        @if($vars['cart_list']->count()==0)
            @if(\Auth::guest())
                <h4 class="red" style="text-align: center;">Your cart is empty <a href="/login">Login</a> and start <a href="/">Shopping</a>...</h4>
            @else
                <h4 class="red" style="text-align: center;">Your cart is empty start <a href="/">Shopping</a>...</h4>
            @endif
        @else
        <div class="container">
            <form class="cart-list" action="#">
                <div>
                    <div class="header-tags">
                        <div class="overflow-h">
                            <h2>Shopping Cart</h2>
                            <p>Review &amp; edit your products</p>
                        </div>
                    </div>

                    <section>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($vars['cart_list'] as $cart)
                                    <tr>
                                        <td class="product-in-table">
                                            <img class="img-responsive" src="{{ url('/') }}/assets/img/products/200x200/{{{ $cart->product->product_img }}}" alt="">
                                            <div class="product-it-in">
                                                <h3>{{{ $cart->product->name }}}</h3>
                                                <span>{{{ $cart->product->description }}}</span>
                                            </div>
                                        </td>
                                        <td>${{{ number_format($cart->product->price_discount) }}}</td>
                                        <td>
                                            {{{ $cart->quantity }}}
                                        </td>
                                        <td class="shop-red product-total">${{{ number_format($cart->product->price_discount*$cart->quantity) }}}</td>
                                        <td>
                                            <a href="#" class="red deleteCart tooltips" data-address="carts" data-id="{{ $cart->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Remove product"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($vars['cart_list']->count()==0)
                            <h4 class="red" style="text-align: center;">Your cart is empty start <a href="/">Shopping</a>...</h4>
                        @endif
                    </section>

                    <div class="coupon-code">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-5">
                                <ul class="list-inline total-result">
                                    <li class="divider"></li>
                                    <li class="total-price">
                                        <h4>Sub Total:</h4>
                                        <div class="total-result-in">
                                            <span>$ {{ \App\Cart::subtotal($vars['cart_list']) }}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-6 col-lg-2">
                            <a href="/billing_address" type="submit" class="btn-u">Next</a>
                        </div>
                    </div>
                </div>
            </form>
        </div><!--/end container-->
        @endif
    </div>
    <!--=== End Content Medium Part ===-->

@endsection