@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Registration</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Registration</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                {!! Form::open( array('route' =>'manage.suppliers.store','class'=>'form-horizontal sky-form', 'role'=>'form', 'files'=>true)) !!}
{{--                 <form class="reg-page form-horizontal sky-form" method="POST" action="{{ url('/supplier_register') }}">
 --}}                {{ csrf_field() }}
                    <div class="reg-header">
                        <h3>Register a new supplier account</h3>
                        <p>Or <a href="/login" class="color-green">Log In</a> your account.</p>
                    </div>
                    <div class="row">
                    <h5 class="default" style="text-align: center;">Company Details</h5>
                        <div class="col-sm-6">
                            <label>Company Name<span class="color-red">*</span></label>
                            <input type="text" name="company_name" value="{{ old('company_name') }}" required="true" class="form-control margin-bottom-20">
                            @if ($errors->has('company_name'))
                                <span class="color-red">
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <label>Company logo </label>
                            <label for="file" class="input input-file">
                                <div class="button"><input type="file" name="supplier_img" id="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Choose a logo image" readonly>
                            </label>
                            @if ($errors->has('supplier_img'))
                                <span class="color-red">
                                    <strong>{{ $errors->first('supplier_img') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Address <span class="color-red">*</span></label>
                            <input type="text" name="supplier_address" value="{{ old('supplier_address') }}" required="true" class="form-control margin-bottom-20">
                            <span class="color-red">
                                <strong>{{ $errors->first('supplier_address') }}</strong>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label>Business Email</label>
                            <input type="email" name="supplier_email" value="{{ old('supplier_email') }}" class="form-control margin-bottom-20">
                            <span class="color-red">
                                <strong>{{ $errors->first('supplier_email') }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Mob Number <span class="color-red">*</span></label>
                            <input type="text" name="supplier_mob_no" value="{{ old('supplier_mob_no') }}" required="true" class="form-control margin-bottom-20">
                            <span class="color-red">
                                <strong>{{ $errors->first('supplier_mob_no') }}</strong>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label>Tel Number</label>
                            <input type="text" name="supplier_tel_no" value="{{ old('supplier_tel_no') }}" class="form-control margin-bottom-20">
                            <span class="color-red">
                                <strong>{{ $errors->first('supplier_tel_no') }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Postal Code </label>
                            <input type="text" name="supplier_postal_code" value="{{ old('supplier_postal_code') }}" class="form-control margin-bottom-20">
                            <span class="color-red">
                                <strong>{{ $errors->first('supplier_postal_code') }}</strong>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label>Country<span class="color-red">*</span></label>
                            {!! Form::select('supplier_country', ['Choose a country']+$vars['countries'],null, ['class'=>'form-control select2', 'id'=>'supplier_country', 'required']) !!}
                                <strong>{{ $errors->first('supplier_country') }}</strong>
                            </span>
                        </div>
                    </div>
                    <h5 class="default" style="text-align: center;">Contact Person Details</h5>

                    <div class="row">

                        <div class="col-sm-6">
                            <label>First Name <span class="color-red">*</span></label>
                            <input type="text" name="fname" value="{{ old('fname') }}" required="true" class="form-control margin-bottom-20">
                            @if ($errors->has('fname'))
                                <span class="color-red">
                                    <strong>{{ $errors->first('fname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <label>Last Name <span class="color-red">*</span></label>
                            <input type="text" name="lname" value="{{ old('lname') }}" required="true" class="form-control margin-bottom-20">
                            @if ($errors->has('lname'))
                                <span class="color-red">
                                    <strong>{{ $errors->first('lname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label>Email Address <span class="color-red">*</span> <small>Login Id</small></label>
                            <input type="email" name="email" value="{{ old('email') }}" required="true" class="form-control margin-bottom-20">
                            <span class="color-red">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <label>Password <span class="color-red">*</span></label>
                            <input type="password" name="password" id="password" required="true" class="form-control margin-bottom-20">
                                @if($errors->has('password'))
                                    <span class="color-red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="col-sm-6">
                            <label>Confirm Password <span class="color-red">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required="true" class="form-control margin-bottom-20">
                            <div class="color-red" id="divCheckPasswordMatch"></div>
                                @if($errors->has('password_confirmation'))
                                    <span class="color-red">
                                        <strong >{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>

                    <h4 style="text-align: center;"><a href="/register"><strong>Register as a normal user</strong></a></h4>

                    <hr>

                    <div class="row">
                        <div class="col-lg-6 checkbox">
                            <label>
                                <input type="checkbox"  name="terms" value="true" style="left: 50px;" required="true">
                                I read <a href="/terms" data-toggle="modal" data-target=".bs-terms-modal-lg" class="color-green">Terms and Conditions <span class="color-red">*</span></a>
                            </label>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button class="btn-u" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div><!--/container-->
    <!--=== End Content Part ===-->
@endsection
