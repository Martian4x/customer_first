/* Write here your custom javascript codes */
function requestOTP(user_id){
   // console.log(user_id);
   $('.user_otp_msg').hide('slow').html('');
      // Send the codes
      var CSRF_TOKEN = $('meta[name="_token"]').attr("content");
     /* send the csrf-token and the input to the controller */
      $.ajax({
         /* the route pointing to the post function */
         url: "/manage/users/ajax_request_otp",
         type: "POST",
         data: {
           _token: CSRF_TOKEN,
           user_id: user_id,
         },
         dataType: "JSON",
         /* remind that 'data' is the response of the AjaxController */
         success: function (data) {
            if(data.data.message.code=='100'){
               $('#otp_pid_id').val(data.data.pinId);
               $('.user_otp_msg').html(data.data.message.message).show('slow').removeClass('red').addClass('green');
               // console.log(data.data.message.message);
            }else{
               $('.user_otp_msg').html('Error: request was not sent.').show('slow').removeClass('green').addClass('red');
            }
         },
         error: function (xhr, ajaxOptions, thrownError) {
           //On error, we alert user
           console.log(xhr.responseText);
         //   show_alert("danger", "Action failed, " + xhr.responseText);
         },
      });
}

function verifyOTP(user_id){
   var otp = $("#user_otp").val();
   var pin_id = $("#otp_pid_id").val();
   if(otp==''&&pin_id==''){
      $('.user_otp_msg').html('OTP Codes is required').show('slow').addClass('red');
   }else{
      $('.user_otp_msg').hide('slow').html('');
      // Send the codes
      var CSRF_TOKEN = $('meta[name="_token"]').attr("content");
     /* send the csrf-token and the input to the controller */
      $.ajax({
         /* the route pointing to the post function */
         url: "/manage/users/ajax_verify_mob_no",
         type: "POST",
         data: {
           _token: CSRF_TOKEN,
           user_id: user_id,
           pin_id: pin_id,
           otp: otp,
         },
         dataType: "JSON",
         /* remind that 'data' is the response of the AjaxController */
         success: function (data) {
         //   console.log(data);
           if(data!=false&&data.data.message.code=='117'){
            $('.user_otp_msg').html(data.data.message.message).show('slow').removeClass('red').addClass('green');
            location.reload(); // Refresh/Reload Page
            // console.log(data.data.message.message);
            }else{
               $('.user_otp_msg').html('Error: request was not sent.').show('slow').removeClass('green').addClass('red');
            }
         },
         error: function (xhr, ajaxOptions, thrownError) {
           //On error, we alert user
           console.log(xhr.responseText);
         //   show_alert("danger", "Action failed, " + xhr.responseText);
         },
       });
   }
}

function sendSMSComposer(){
   var recepients = $("#sms_recepient_select").val();
   var body = $('textarea#message_body').val();
   var supplier_id = $("#global_supplier_id").val();
   // console.log(body);
   // console.log(recepients);
   $('.send_sms_feedback').html('').hide('slow');
   if(recepients==''||body==''){
      $('.send_sms_msg').html('Recepients and Message Body are required').show('slow').addClass('red');
   }else{
      $('.send_sms_msg').hide('slow').html('');
      // Send the codes
      var CSRF_TOKEN = $('meta[name="_token"]').attr("content");
     /* send the csrf-token and the input to the controller */
      $.ajax({
         /* the route pointing to the post function */
         url: "/manage/sms/ajax_send_bulk",
         type: "POST",
         data: {
           _token: CSRF_TOKEN,
           supplier_id: supplier_id,
           recepients: recepients,
           body: body,
         },
         dataType: "JSON",
         /* remind that 'data' is the response of the AjaxController */
         success: function (data) {
            // {"successful":true,"request_id":36331663,"code":100,"message":"Message Submitted Successfully","valid":3,"invalid":0,"duplicates":0}
           console.log(data);
           if(data!=false&&data.code=='100'){
            $('.send_sms_feedback').html(`Message: <span class="green">${data.message}</span> |  
            Request Id: <span class="">${data.request_id}</span> | 
            Valid: <span class="green">${data.valid}</span> | 
            Invalid: <span class="red">${data.invalid}</span> | 
            Duplicates: <span class="blue">${data.duplicates}</span>`
            ).show('slow');
            // console.log(data.data.message.message);
            }else{
               $('.send_sms_feedback').html('<span class="red">Message did not sent</span>').show('slow');
            }
         },
         error: function (xhr, ajaxOptions, thrownError) {
           //On error, we alert user
           console.log(xhr.responseText);
         //   show_alert("danger", "Action failed, " + xhr.responseText);
         },
       });
   }
}

function checkBalance(){
      var CSRF_TOKEN = $('meta[name="_token"]').attr("content");
      $(".sms_balance_check_btn").html('<i class="icon-append fa fa-spinner fa-spin fa-fw"></i> Checking..');
     /* send the csrf-token and the input to the controller */
      $.ajax({
         /* the route pointing to the post function */
         url: "/manage/sms/ajax_check_balance",
         type: "POST",
         data: {
           _token: CSRF_TOKEN,
         },
         dataType: "JSON",
         success: function (data) {
            $(".sms_balance_check_btn").html('').hide('slow');
         //   console.log(data);
            $('.sms_balance_badge').html(data.data.credit_balance);
         },
         error: function (xhr, ajaxOptions, thrownError) {
            $(".sms_balance_check_btn").html('<i class="fa fa-times"></i>');
           //On error, we alert user
           console.log(xhr.responseText);
         },
       });
}

function orderNow(){
      var CSRF_TOKEN = $('meta[name="_token"]').attr("content");
      $(".order_now_check_btn").html('<i class="icon-append fa fa-spinner fa-spin fa-fw"></i> Check Out..');
      var product_id = $('#order_product_id').val();
      var quantity = $('#order_quantity').val();
     /* send the csrf-token and the input to the controller */
      $.ajax({
         /* the route pointing to the post function */
         url: "/ajax_order_now",
         type: "POST",
         data: {
           _token: CSRF_TOKEN,
           product_id: product_id,
           quantity: quantity
         },
         dataType: "JSON",
         success: function (data) {
            // $(".sms_balance_check_btn").html('').hide('slow');
           console.log(data);
            // $('.sms_balance_badge').html(data.data.credit_balance);
         },
         error: function (xhr, ajaxOptions, thrownError) {
            $(".sms_balance_check_btn").html('<i class="fa fa-times"></i>');
           //On error, we alert user
           console.log(xhr.responseText);
         },
       });
}

function clearRecepients() {
   $('#sms_recepient_select').empty();
}