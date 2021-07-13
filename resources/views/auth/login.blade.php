@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Login</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <div class="container content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <form class="reg-page"  method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                    {{-- <div class="reg-header">
                        <h3>Login with</h3>
                        <ul class="social-icons text-center">
                            <li><a class="rounded-x social_facebook" data-toggle="tooltip" title="Login with Facebook" data-original-title="Facebook" href="/redirect/facebook"></a></li>
                            <li><a class="rounded-x social_twitter" data-toggle="tooltip" title="Login with Twitter" data-original-title="Twitter" href="/redirect/twitter"></a></li>
                        </ul>
                        <p>Or <a href="/register" class="color-green">Register</a> a new free account.</p>
                    </div> --}}
                    <div class="reg-header">
                        <h3>Login</h3>
                        <p>or <a href="/register" class="color-green">Register</a>  a new free account.</p>
                    </div>
                    <p>or enter your email and password</p>

                    <div class="input-group margin-bottom-20 state-{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" class="form-control">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group margin-bottom-20 state-{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" placeholder="Password" name="password" class="form-control">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6 checkbox">
                            <label><input type="checkbox" name="remember"> Stay logged in</label>
                        </div>
                        <div class="col-md-6">
                            <button class="btn-u pull-right" type="submit">Login</button>
                        </div>
                    </div>

                    <hr>

                    <h4>Forget your Password ?</h4>
                    <p>no worries, <a class="color-green" href="{{ url('/password/reset') }}">click here</a> to reset your password.</p>
                </form>
            </div>
        </div><!--/row-->
    </div><!--/container-->

@endsection
