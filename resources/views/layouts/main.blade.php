<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

@include('layouts.head')
<body>

<div class="wrapper">
    <!--=== Header ===-->
    @include('layouts.header_nav')
    <!--=== End Header ===-->
    @if(Session::has('message'))
		<div class="alert alert-{{{Session::get('flash_type','info')}}}">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{{Session::get('flash_type','info')}}}:</strong> {{{ Session::get('message') }}}.
		</div>
	@endif

    @yield('content')

    @include('layouts.footer')

</div><!--/End Wrapepr-->
    @if(Auth::check())
        @include('modals.mob_no_otp')
    @endif
    @include('layouts.scripts')
    

</body>

<!-- Cloned by RabinsXP.com-->
</html>
