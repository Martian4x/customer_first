<head>
    <title>CustomerFirst | 
        @if(isset($vars['sub_title']))
        {{ $vars['sub_title'] }}
        @else
            Selling and Customer Relation Platform
        @endif
    </title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Selling and Customer Relation Platform">
    <meta name="author" content="http://customer.martian4x.com/">
    <meta name="_token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/favicon.ico">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">

    <!-- CSS Header and Footer -->
    {{-- <link rel="stylesheet" href="{{ url('/') }}/assets/css/footers/footer-v5.css"> --}}
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/headers/header-default.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/footers/footer-v4.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/jquery-steps/css/custom-jquery.steps.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/image-hover/css/img-hover.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/master-slider/quick-start/masterslider/style/masterslider.css">
    <link rel='stylesheet' href="{{ url('/') }}/assets/plugins/master-slider/quick-start/masterslider/skins/default/style.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/css/shop.style.css">
    
    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/pages/profile.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/select2/select2.min.css">

    <!-- CSS Page Style -->
    @if(\Request::path()== 'login'||\Request::path()== 'register'||\Request::path()== 'supplier_register')
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/pages/page_log_reg_v1.css">
    @elseif($view_name== 'search')
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/pages/page_search_inner_tables.css">
    @elseif($view_name== 'errors.404')
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/pages/page_404_error.css">
    @elseif($view_name== 'index'||$view_name== 'products.show')
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/shop.style.css">
    @endif
    {{-- <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/dropzone.css"> --}}
    
    @if($view_name== 'messages.dashboard'||$view_name== 'suppliers.edit'||$view_name== 'products.edit'||$view_name== 'products.create'|| $view_name=='supplier_register'||$view_name== 'products.photos'||$view_name=='banners.create'||$view_name=='banners.edit')
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
        <!--[if lt IE 9]><link rel="stylesheet" href="{{ url('/') }}/assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->
    @endif

    <link rel="stylesheet" href="{{ url('/') }}/assets/css/pages/page_job.css"> 

    <!-- CSS Theme -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/theme-colors/blue.css" id="style_color">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/theme-skins/dark.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/custom.css">
</head>