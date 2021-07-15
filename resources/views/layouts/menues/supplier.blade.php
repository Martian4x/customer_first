<div class="col-md-3">
    <ul class="list-group sidebar-nav-v1" id="sidebar-nav">
        
        <li class="list-group-item">
            <a href="/manage"> <i class="fa  fa-dashboard"></i> &nbsp; Dashboard</a>
        </li>

        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/customers"> <i class="fa fa-users"></i> &nbsp; Customers</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/invoices"> <i class="fa fa-files-o"></i> &nbsp; Invoices</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/payments"> <i class="fa fa-money"></i> &nbsp; Payments</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/products"> <i class="fa fa-cubes"></i> &nbsp; Products</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/orders"> <i class="fa fa-star-o"></i> &nbsp; Orders</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/polls"> <i class="fa fa-wechat"></i> &nbsp; Polls</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/couriers"> <i class="fa fa-motorcycle"></i> &nbsp; Couriers</a></li>
        <li class="list-group-item"><a href="/manage/suppliers/{{ \Auth::id() }}/suppliers"> <i class="fa fa-truck"></i> &nbsp; Suppliers</a></li>

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