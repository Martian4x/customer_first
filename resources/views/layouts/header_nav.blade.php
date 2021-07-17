
<div class="header header-v5">
<div class="container">
    @if(\Auth::check())
    @if(isset(\Auth::user()->supplier))
    <input type="hidden" id="global_supplier_id" value="{{\Auth::user()->supplier->id}}">
    @endif
    <input type="hidden" id="global_auth_user_id" value="{{\Auth::id()}}">
    @endif
    <!-- Logo -->
    <a class="logo" href="/">
        <img src="{{ url('/') }}/assets/img/logo-bw.png" alt="sellyou">
    </a>
    <!-- End Logo -->

    <!-- Topbar -->
    <div class="topbar">
        <ul class="loginbar">
            <li class="default">EAT {{ date('d M, Y') }}</li>
            <li class="topbar-devider"></li>
            <li><a href="/manage/supplier">Supplier/Seller</a></li>
            <li class="topbar-devider"></li>
            <li><a href="/pages/help">Help &amp; FAQ</a></li>
            <li class="topbar-devider"></li>
            <li><a href="pages/tos/" title="Term of Service">Terms</a></li>
            <li class="topbar-devider"></li>
            @if(\Auth::guest())
            <li><a href="/register">Register</a></li>
            <li class="topbar-devider"></li>
            <li><a href="/login">Login</a></li>
            @else
            <li><a href="/profile">{{ \Auth::user()->lname }}</a></li>
            <li class="topbar-devider"></li>
            <li><a href="/manage">Dashbord</a></li>
            <li class="topbar-devider"></li>
            <li><a href="/logout">Logout</a></li>
            @endif
            <li class="topbar-devider"></li>
             @if(isset($orders)&&count($orders))
                <li><a href="/manage/users/id/orders">Orders ({{{ $orders->count() }}})</a></li>
            @else
                <li><a href="/manage/users/id/orders">Orders (0)</a></li>
            @endif
        
        </ul>
    </div>
    <!-- End Topbar -->

    <!-- Toggle get grouped for better mobile display -->
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="fa fa-bars"></span>
    </button>
    <!-- End Toggle -->
</div><!--/end container-->

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    Agriculture
                </a>
                <ul class="dropdown-menu">
                    @foreach($maincategories['agricultural'] as $maincategory)
                        <li class="dropdown-submenu">
                                <a href="javascript:void(0);">{{{ $maincategory->name }}}</a>
                            <ul class="dropdown-menu">
                                    @foreach( $maincategory->subcategories as $subcategory)
                                        <li><a href="/products/maincategory/{{{ $maincategory->slug }}}/subcategory/{{{ $subcategory->slug }}}">{{{ $subcategory->name }}}</a></li>
                                    @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    Clothing
                </a>
                <ul class="dropdown-menu">
                    @foreach($maincategories['clothing'] as $maincategory)
                        <li class="dropdown-submenu">
                                <a href="javascript:void(0);">{{{ $maincategory->name }}}</a>
                            <ul class="dropdown-menu">
                                    @foreach( $maincategory->subcategories as $subcategory)
                                        <li><a href="/products/maincategory/{{{ $maincategory->slug }}}/subcategory/{{{ $subcategory->slug }}}">{{{ $subcategory->name }}}</a></li>
                                    @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    Textile
                </a>
                <ul class="dropdown-menu">
                    @foreach($maincategories['textile'] as $maincategory)
                        <li class="dropdown-submenu">
                                <a href="javascript:void(0);">{{{ $maincategory->name }}}</a>
                            <ul class="dropdown-menu">
                                    @foreach( $maincategory->subcategories as $subcategory)
                                        <li><a href="/products/maincategory/{{{ $maincategory->slug }}}/subcategory/{{{ $subcategory->slug }}}">{{{ $subcategory->name }}}</a></li>
                                    @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    Crafts
                </a>
                <ul class="dropdown-menu">
                    @foreach($maincategories['crafts'] as $maincategory)
                        <li class="dropdown-submenu">
                                <a href="javascript:void(0);">{{{ $maincategory->name }}}</a>
                            <ul class="dropdown-menu">
                                    @foreach( $maincategory->subcategories as $subcategory)
                                        <li><a href="/products/maincategory/{{{ $maincategory->slug }}}/subcategory/{{{ $subcategory->slug }}}">{{{ $subcategory->name }}}</a></li>
                                    @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    Food
                </a>
                <ul class="dropdown-menu">
                    @foreach($maincategories['food'] as $maincategory)
                        <li class="dropdown-submenu">
                                <a href="javascript:void(0);">{{{ $maincategory->name }}}</a>
                            <ul class="dropdown-menu">
                                    @foreach( $maincategory->subcategories as $subcategory)
                                        <li><a href="/products/maincategory/{{{ $maincategory->slug }}}/subcategory/{{{ $subcategory->slug }}}">{{{ $subcategory->name }}}</a></li>
                                    @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    Electronics
                </a>
                <ul class="dropdown-menu">
                    @foreach($maincategories['electronic'] as $maincategory)
                        <li class="dropdown-submenu">
                                <a href="javascript:void(0);">{{{ $maincategory->name }}}</a>
                            <ul class="dropdown-menu">
                                    @foreach( $maincategory->subcategories as $subcategory)
                                        <li><a href="/products/maincategory/{{{ $maincategory->slug }}}/subcategory/{{{ $subcategory->slug }}}">{{{ $subcategory->name }}}</a></li>
                                    @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                
        <div class="shop-badge badge-icons">
        @if(\Auth::guest())
          <a href="/cart_list" title="Shopping Cart"><i class="fa fa-shopping-cart"></i></a>
        @else
          <a href="#" title="Shopping Cart"><i class="fa fa-shopping-cart"></i></a>
        @endif
          <span class="badge badge-sea rounded-x">{{{ $carts->count() }}}</span>
          
          @if(isset($carts)&&count($carts))
          <div class="badge-open">
            <ul class="list-unstyled mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" data-mcs-theme="minimal-dark" style="position: relative; overflow: visible;"><div id="mCSB_1" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position: relative; top: 0px; left: 0px;" dir="ltr">

            @foreach($carts as $cart)
                <li>
                    <img src="{{ url('/') }}/assets/img/products/200x200/{{{ $cart->product->product_img }}}" alt="" class="mCS_img_loaded">
                    <button type="button" class="close">×</button>
                    <div class="overflow-h">
                        <span>{{{ $cart->product->name }}}</span>
                        <small>{{{ number_format($cart->quantity) }}}x {{{ number_format($cart->product->price_discount) }}}</small>
                    </div>
                </li>
            @endforeach

                </div></div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; top: 0px; display: block; height: 217px; max-height: 266px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></ul>
                <div class="subtotal">
                    <div class="overflow-h margin-bottom-10">
                        <span>Subtotal</span>
                        <span class="pull-right subtotal-cost">$ {{ number_format(\App\Cart::subtotal($carts)) }}</span>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="/cart_list" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block">View Cart</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="/check_out" class="btn-u btn-u-sea-shop btn-block">Checkout</a>
                        </div>
                    </div>
                </div>
          </div>
          @endif

        </div>
            </li>
        </ul>
        

    </div><!--/end container-->
</div><!--/navbar-collapse-->
</div>


<!--=== Search bar ===-->
<div class="job-img">
    <div class="job-img-inputs">
        <div class="container">
            <div class="row">
                {!! Form::open( array('route' =>'search','method'=>'GET', 'class'=>'form-inline')) !!}
                <div class="col-sm-7 col-sm-offset-1 md-margin-bottom-10" style="padding-right: 0">
                    <div class="input-group" style="width: 100%">
                        <span class="input-group-addon"><i class="fa  fa-search"></i></span>
                        <input type="text" name="q" placeholder="What you are looking for" class="form-control">
                    </div>
                </div>
                <div class="col-sm-2" style="padding-left: 0">
                    {!! Form::select('type', ['All'=>'All Categories']+\App\Product::types(), null, ['class'=>'form-control']) !!}
                </div>
                    <button type="submit" class="btn-u btn-u-dark"> Search Product</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!--=== End Search bar ===-->