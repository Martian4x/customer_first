@extends('layouts.main')

@section('content')

    <div class="content container" style="padding-bottom: 0px;">
        <ul class="breadcrumb-v5">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li class="active">Billing Information</li>
        </ul>
    </div>

    <!--=== Content Medium Part ===-->
    <div class="content margin-bottom-30">
        <div class="container">
        {!! Form::open( array('route' =>'manage.orders.store','class'=>'shopping-cart', 'role'=>'form')) !!}
            <form class="" action="#">
                <div>

                    <div class="header-tags">
                        <div class="overflow-h">
                            <h2>Billing info</h2>
                            <p>Shipping and address</p>
                            <i class="rounded-x fa fa-home"></i>
                        </div>
                    </div>
                    <section class="billing-info">
                        <div class="row">
                            <div class="col-md-6 md-margin-bottom-40">
                                <h2 class="title-type">Billing Address</h2>
                                <div class="billing-info-inputs checkbox-list">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input id="name" name="billing_fname" type="text" placeholder="First Name" class="form-control required">
                                            <input id="email" type="text" placeholder="Email" name="billing_email" class="form-control required email">
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="surname" name="billing_lname" type="text" placeholder="Last Name" class="form-control required">
                                            <input id="phone" type="tel" name="billing_phone" placeholder="Phone" class="form-control required">
                                        </div>
                                    </div>
                                    <input id="billingAddress" type="text" placeholder="Address Line 1" name="billing_address1" class="form-control required">
                                    <input id="billingAddress2" type="text" placeholder="Address Line 2" name="billing_address2" class="form-control required">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input id="city" type="text" placeholder="City" name="billing_city" class="form-control required">
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="zip" type="text" placeholder="Zip/Postal Code" name="billing_zip_code" class="form-control required">
                                        </div>
                                    </div>

                                    <label class="checkbox text-left">
                                        <input type="checkbox" name="ship_to_user_adderss"/>
                                        <i></i>
                                        Ship order to the above billing address
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h2 class="title-type">Shipping Address</h2>
                                <div class="billing-info-inputs checkbox-list">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input id="name2" type="text" placeholder="First Name" name="ship_fname" class="form-control">
                                            <input id="email2" type="text" placeholder="Email" name="ship_email" class="form-control email">
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="surname2" type="text" placeholder="Last Name" name="ship_lname" class="form-control">
                                            <input id="phone2" type="tel" placeholder="Phone" name="ship_phone" class="form-control">
                                        </div>
                                    </div>
                                    <input id="shippingAddress" type="text" placeholder="Address Line 1" name="ship_address1" class="form-control">
                                    <input id="shippingAddress2" type="text" placeholder="Address Line 2" name="ship_address2" class="form-control">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input id="city2" type="text" placeholder="City" name="ship_city" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="zip2" type="text" placeholder="Zip/Postal Code" name="ship_zip_code" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
        </div>
                                <div class="col-lg-offset-6 col-sm-2">
                                    <button type="submit" class="btn-u btn-u-orange">Place Order</button>
                                </div>

                {!! Form::close() !!}
    </div>
    <!--=== End Content Medium Part ===-->

@endsection