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
                <form class="reg-page" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                    <div class="reg-header">
                        <h3>Register a new account</h3>
                        <p>Or <a href="/login" class="color-green">Log In</a> your account.</p>
                        <ul class="social-icons text-center">
                            <li><a class="rounded-x social_facebook" data-toggle="tooltip" title="Login with Facebook" data-original-title="Facebook" href="/redirect/facebook"></a></li>
                            <li><a class="rounded-x social_twitter" data-toggle="tooltip" title="Login with Twitter" data-original-title="Twitter" href="/redirect/twitter"></a></li>
                        </ul>
                    </div>

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
                            <label>Email Address <span class="color-red">*</span></label>
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

                    <h4 style="text-align: center;"><a href="/supplier_register"><strong>Register as a Supplier</strong></a></h4>

                    <hr>

                    <div class="row">
                        <div class="col-lg-6 checkbox">
                            <label>
                                <input type="checkbox"  name="terms" value="true" required="true">
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
