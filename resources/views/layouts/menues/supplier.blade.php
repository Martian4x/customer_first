<div class="col-md-3">
    <ul class="list-group sidebar-nav-v1" id="sidebar-nav">
        
        <li class="list-group-item">
            <a href="/manage"> <i class="fa  fa-dashboard"></i> &nbsp; Dashboard</a>
        </li>

        <li class="list-group-item list-toggle">
            <a data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse-orders"> <i class="fa fa-star-o"></i> &nbsp; Orders</a>
            <ul id="collapse-orders" class="collapse">
                <li><a href="/manage/orders/status/new"><i class="fa fa-star-o"></i> &nbsp; New Orders</a></li>
                <li><a href="/manage/orders/status/payment"><i class="fa fa-money"></i> &nbsp; On-payment Orders</a></li>
                <li><a href="/manage/orders/status/shipping"><i class="fa fa-ship"></i> &nbsp; Shipping Orders</a></li>
                <li><a href="/manage/orders/status/returned"><i class="fa fa-times-circle"></i> &nbsp; Rejected Orders</a></li>
                <li><a href="/manage/orders/status/delivered"><i class="fa fa-home"></i> &nbsp; Delivered Orders</a></li>
                <li><a href="/manage/orders/status/pending"><i class="fa fa-pause"></i> &nbsp; Pending Orders</a></li>
                <li><a href="/manage/suppliers/{{ \Auth::id() }}/orders"><i class="fa  fa-align-justify"></i> &nbsp; All Orders</a></li>
            </ul>
        </li>

        <li class="list-group-item list-toggle">
            <a data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse-products"> <i class="fa fa-cubes"></i> &nbsp; Products Lists</a>
            <ul id="collapse-products" class="collapse">
                <li><a href="/manage/suppliers/{{{ \Auth::user()->supplier->id }}}/products/create"><i class="fa fa-plus"></i> &nbsp; Add Product</a></li>
                <li><a href="/manage/products/type/agriculture"><i class="fa fa-leaf"></i> &nbsp; Agriculture Products</a></li>
                <li><a href="/manage/products/type/clothing"><i class="fa fa-black-tie"></i> &nbsp; Clothing Products</a></li>
                <li><a href="/manage/products/type/textile"><i class="fa fa-slack"></i> &nbsp; Textile Products</a></li>
                <li><a href="/manage/products/type/craft"><i class="fa fa-image"></i> &nbsp; Crafts Products</a></li>
                <li><a href="/manage/products/type/mineral"><i class="fa fa-diamond"></i> &nbsp; Minerals Products</a></li>
                <li><a href="/manage/products/type/manufacturing"><i class="fa fa-gears"></i> &nbsp; Manufacturing Products</a></li>
                <li><a href="/manage/products/type/electronics"><i class="fa fa-calculator"></i> &nbsp; Electronics Products</a></li>
                <li><a href="/manage/products"><i class="fa fa-align-justify"></i> &nbsp; All Products</a></li>
                
            </ul>
        </li>

        <!-- Messages -->
        <li class="list-group-item"><a href="/manage/messages"> <i class="fa fa-wechat"></i> &nbsp; Messages</a></li>
        <!-- End Messages -->

        <!-- Thumbails -->
        <li class="list-group-item"><a href="/profile"> <i class="fa fa-user"></i> &nbsp; Profile</a></li>
        <!-- End Thumbails -->

        <!-- Settings -->
        <li class="list-group-item"><a href="/manage/supplier/settings"> <i class="fa fa-gears"></i> &nbsp; Settings</a></li>
        <!-- End Settings -->
        <li class="list-group-item"><a href="/logout"> <i class="fa fa-power-off"></i> &nbsp; Logout</a></li>
    </ul>
</div>