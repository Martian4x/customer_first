<div class="col-md-3">
    <ul class="list-group sidebar-nav-v1" id="sidebar-nav">
        
        <li class="list-group-item">
            <a href="/manage"> <i class="fa  fa-dashboard"></i> &nbsp; Dashboard</a>
        </li>

        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/customers"> <i class="fa fa-users"></i> &nbsp; Customers</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/invoices"> <i class="fa fa-files-o"></i> &nbsp; Invoices</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/payments"> <i class="fa fa-money"></i> &nbsp; Payments</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/products"> <i class="fa fa-cubes"></i> &nbsp; Products</a></li>
        {{-- <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/orders"> <i class="fa fa-star-o"></i> &nbsp; Orders</a></li> --}}

        
        <li class="list-group-item list-toggle">
            <a data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse-orders">  <i class="fa fa-star-o"></i> &nbsp; Orders</a>
            <ul id="collapse-orders" class="collapse">
                <li><a href="/manage/suppliers/orders/status/new"><i class="fa fa-star-o"></i> &nbsp; New Orders</a></li>
                <li><a href="/manage/suppliers/orders/status/payment"><i class="fa fa-money"></i> &nbsp; On-payment Orders</a></li>
                <li><a href="/manage/suppliers/orders/status/shipping"><i class="fa fa-ship"></i> &nbsp; Shipping Orders</a></li>
                <li><a href="/manage/suppliers/orders/status/returned"><i class="fa fa-times-circle"></i> &nbsp; Rejected Orders</a></li>
                <li><a href="/manage/suppliers/orders/status/delivered"><i class="fa fa-home"></i> &nbsp; Delivered Orders</a></li>
                <li><a href="/manage/suppliers/orders/status/pending"><i class="fa fa-pause"></i> &nbsp; Pending Orders</a></li>
                <li><a href="/manage/suppliers/{{ \Auth::id() }}/orders"><i class="fa fa-align-justify"></i> &nbsp; All Orders</a></li>
            </ul>
        </li>

        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/rewards"> <i class="fa fa-smile-o"></i> &nbsp; Rewards</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/couriers"> <i class="fa fa-motorcycle"></i> &nbsp; Couriers</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/partners"> <i class="fa fa-truck"></i> &nbsp; Partners/Suppliers</a></li>

        <!-- Messages -->
        <li class="list-group-item"><a href="/manage/suppliers/sms"> <i class="fa fa-wechat"></i> &nbsp; SMS</a></li>
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