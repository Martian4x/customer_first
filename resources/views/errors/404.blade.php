@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Page not found</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index-2.html">Home</a></li>
                <li class="active">404 Error</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <!--Error Block-->
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div class="error-v1">
                    {{-- <img src="{{ url('/') }}/assets/img/404.png" style="width: 100%;" alt="Page not found"> --}}
                    <span>That’s an error!</span>
                    <p>The requested URL was not found on this server. Check your URL and try again.</p>
                    <a class="btn-u btn-bordered" href="/">Back Home</a>
                </div>
            </div>
        </div>
        <!--End Error Block-->
    </div>
    <!--=== End Content Part ===-->
@endsection