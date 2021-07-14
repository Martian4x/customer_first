<!-- JS Global Compulsory -->
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/smoothScroll.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/image-hover/js/modernizr.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/image-hover/js/touch.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>

<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery-steps/build/jquery.steps.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>

<script type="text/javascript" src="{{ url('/') }}/assets/js/plugins/fancy-box.js"></script>

<!-- Master Slider -->
<script src="{{ url('/') }}/assets/plugins/master-slider/quick-start/masterslider/masterslider.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/master-slider/quick-start/masterslider/jquery.easing.min.js"></script>

{{-- <script type="text/javascript" src="{{ url('/') }}/assets/plugins/dropzone.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/plugins/dropzone.js"></script> --}}

<script>
    
    {{-- Ajax delete Tabledata row --}}
    $(".deleteCart").click(function(){
        if (confirm('Are you sure you want to remove this product?')) {
            var id = $(this).data("id");
            var address = $(this).data("address");
            var token = $(this).data("token");
            var $tr = $(this).closest("tr");
            // console.log(address);
            $.ajax(
            {
                url: "/manage/"+address+"/"+id,
                type: 'DELETE',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function (){//on success, hide  element user wants to delete.
                    $tr.fadeOut(1000,function(){ 
                        $tr.remove();                    
                    }); 
                },
                error:function (xhr, ajaxOptions, thrownError){
                    //On error, we alert user
                    alert('Error: Something went wrong...');
                }
            });
        }
        // console.log("It failed");
    });
    
    {{-- Ajax delete Tabledata row --}}
    $(".deleteTr").click(function(){
        if (confirm('Are you sure you want to delete this?')) {
            var id = $(this).data("id");
            var address = $(this).data("address");
            var token = $(this).data("token");
            var $tr = $(this).closest("tr");
            // console.log(id);
            $.ajax(
            {
                url: "/manage/"+address+"/"+id,
                type: 'DELETE',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function (){//on success, hide  element user wants to delete.
                    $tr.fadeOut(1000,function(){ 
                        $tr.remove();                    
                    }); 
                },
                error:function (xhr, ajaxOptions, thrownError){
                    //On error, we alert user
                    alert('Error: You can not delete that data because it is linked with other data');
                }
            });
        }
        // console.log("It failed");
    });
</script>

<!-- JS Page Level Front Cart list -->
@if($view_name== 'orders.order_steps')
    <script src="{{ url('/') }}/assets/js/plugins/stepWizard.js"></script>
    <script src="{{ url('/') }}/assets/js/forms/product-quantity.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/style-switcher.js"></script>
    <script>
        jQuery(document).ready(function() {
            StepWizard.initStepWizard();
    });
    </script>
@endif

<script>
    //Slide UP the alert box
    $(document).ready(function () {
        $('div.alert').delay(10000).slideUp();
    });
</script>


@if($view_name=='suppliers.edit'|| $view_name=='supplier_register')
<script src="{{ url('/') }}/assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>

<script>
    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > ul > li > a', function(e){
        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>
@endif


{{-- Checking if the username and email are taken --}}
@if($view_name=='manage.users.create'||$view_name=='manage.users.edit')
<script type="text/javascript">
    $(document).ready(function(){
        // $("#submit").removeAttr("disabled", true).removeClass( "state-disabled button-secondary");
        $("#username,#email").change(function(){
            var username=$("#username").val();
            var email=$("#email").val();
            var user_id=$("#user_id").val();
            // console.log(username+' '+email);
            if(email!=''){
                $("#message_email").html('<i class="icon-append fa fa-circle-o-notch fa-spin fa-fw"></i> Checking...');
            }
            if(username!=''){
                $("#message_username").html('<i class="icon-append fa fa-circle-o-notch fa-spin fa-fw"></i> Checking...');
            }
                $.ajax({
                    data: {
                        username:username,
                        email:email,
                        user_id:user_id,
                        "_token": "{{ csrf_token() }}"
                    },
                    url: '/checking/email_username',
                    type: "POST",
                    dataType: "json",
                    success: function(response){
                        // console.log(response.responseEmail.messageEmail);
                        $("#message_email").html(response.responseEmail.messageEmail);
                        $("#message_username").html(response.responseUsername.messageUsername);
                        if(response.responseEmail.statusEmail=='failed'||response.responseUsername.statusUsername=='failed'){
                            // console.log('failed')
                            $("#submit").attr("disabled", true).addClass("state-disabled button-secondary");
                       }
                       if(response.responseEmail.statusEmail=='success'&&response.responseUsername.statusUsername=='success'){
                            $("#submit").removeAttr("disabled", true).removeClass("state-disabled button-secondary");
                        }
                    }
                });
        });
     });
</script>
@endif

@if($view_name=='dashboard')
    <script type="text/javascript" src="{{ url('/') }}/assets/plugins/counter/waypoints.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/plugins/counter/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/plugins/circles-master/circles.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.initCounter();
            CirclesMaster.initCirclesMaster1();
            CirclesMaster.initCirclesMaster2();
        });
    </script>
@endif 
<!-- JS Customization -->
<script type="text/javascript" src="{{ url('/') }}/assets/js/custom.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/js/js_functions.js"></script>
{{-- <script type="text/javascript" src="{{ url('/') }}/assets/js/dropzone-config.js"></script> --}}
<!-- JS Page Level -->
<script type="text/javascript" src="{{ url('/') }}/assets/js/app.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/js/plugins/style-switcher.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/js/plugins/owl-carousel.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/js/plugins/master-slider.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initScrollBar();
        OwlCarousel.initOwlCarousel();
        FancyBox.initFancybox();
        MasterSliderShowcase2.initMasterSliderShowcase2();
    });
</script>

<!--[if lt IE 9]>
    <script src="{{ url('/') }}/assets/plugins/respond.js"></script>
    <script src="{{ url('/') }}/assets/plugins/html5shiv.js"></script>
    <script src="{{ url('/') }}/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

<!-- JS Page Level for home page -->
<script src="{{ url('/') }}/assets/js/shop.app.js"></script>
<script src="{{ url('/') }}/assets/js/plugins/master-slider.js"></script>
<script src="{{ url('/') }}/assets/js/forms/product-quantity.js"></script>

<!-- Check passwork confimation on registration -->
<script type="text/javascript">
     @if(\Request::path()== 'register'||$view_name== 'supplier_register'||$view_name== 'manage.users.create'||$view_name== 'manage.users.edit')
            function checkPasswordMatch() {
                var password = $("#password").val();
                var confirmPassword = $("#password_confirmation").val();

                if (password != confirmPassword)
                    $("#divCheckPasswordMatch").html("Both Passwords should match!");
                else
                    $("#divCheckPasswordMatch").html("");
                    // $("#divCheckPasswordMatch").html("Passwords match.");
            }

    $(document).ready(function () {
       $("#password_confirmation").keyup(checkPasswordMatch);
    });
    @endif


    // Products types, main categories and sub categories
@if($view_name=='products.create'||$view_name=='products.edit'||$view_name=='products.photos'||$view_name=='banners.create'||$view_name=='banners.edit')

    $('#product_type').on('change', function(e){
        var type_name = e.target.value;
        // console.log(type_name);
        //ajax
        $.get('/manage/ajax-product_type?type_name='+type_name, function(data){
            $('#subcategory').empty();
            $('#maincategory').empty();
            // $('#subcategory').empty();
            $.each(data, function(index, mainCatObj){
                $('#maincategory').append('<option value="'+mainCatObj.id+'">'+mainCatObj.name+'</option');
            })

            
            var maincategory_id = $('#maincategory').val();
            $('#subcategory').empty();
            // console.log(maincategory_id);
            $.get('/manage/ajax-maincategory?maincategory_id='+maincategory_id, function(data){
                $.each(data, function(index, subCatObj){
                    $('#subcategory').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option');
                })
            });
        });

        // var maincategory_id = $('#maincategory').val();
        // console.log(maincategory_id);
        // $.get('/manage/ajax-maincategory?maincategory_id='+maincategory_id, function(data){
        //     $.each(data, function(index, subCatObj){
        //         $('#subcategory').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option');
        //     })
        // });

    });

    $('#maincategory').on('change', function(e){
        var maincategory_id = e.target.value;
        // console.log(maincategory_id);
        //ajax
        $.get('/manage/ajax-maincategory?maincategory_id='+maincategory_id, function(data){
            $('#subcategory').empty();
            $.each(data, function(index, subCatObj){
                $('#subcategory').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option');
            })
        });
    });


    //Changing product type fields
        $('#product_type').on('change', function(e){
        var type_name = e.target.value;
        $('.type_div').hide(900);
        if(type_name=='Agriculture'){
            $('#agriculture').show(900).slideDown();
        } else if(type_name=='Clothing'){
            $('#clothing').show(900).slideDown();
        } else if(type_name=='Textile'){
            $('#textile').show(900).slideDown();
        } else if(type_name=='Craft'){
            $('#craft').show(900).slideDown();
        } else if(type_name=='Mineral'){
            $('#mineral').show(900).slideDown();
        }else if(type_name=='Manufacturing'){
            $('#manufacturing').show(900).slideDown();
        }else if(type_name=='Electronics'){
            $('#electronics').show(900).slideDown();
        }
    });
@endif

    {{-- Ajax add product to the cart --}}
    $(".addToCart").click(function(){
            // var data = $('form#cart_form').serialize();
            var token = $('input[name="_token"]').val();
            var address = $('input[name="address"]').val();
            var product_id = $('input[name="product_id"]').val();
            var quantity = $('input[name="quantity"]').val();
            // console.log(token);
            // $.post('http://sellyou.dev/add_to_cart', data);

            $.ajax(
            {
                url: "http://sellyou.dev/add_to_cart",
                type: 'POST',
                dataType: "JSON",
                data: {
                    "_method": 'POST',
                    "_token": token,
                    "product_id": product_id,
                    "quantity": quantity,
                },
                success: function (){//on success.
                    // $tr.fadeOut(1000,function(){ 
                    //     $tr.remove();                    
                    // }); 
                console.log("Added to the cart");
                },
                error:function (xhr, ajaxOptions, thrownError){
                    //On error, we alert user
                    alert('Something is wrong with adding a product to the cart');
                }
            });
        // console.log("It failed");
    });

        //Slide UP the alert box
    $(document).ready(function () {
        $('div.alert').delay(10000).slideUp();
    });
</script>