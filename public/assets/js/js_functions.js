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
           // alert('Error: You can not delete that data because it is linked with other data');
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
           // alert('Error: You can not delete that data because it is linked with other data');
         //   show_alert("danger", "Action failed, " + xhr.responseText);
         },
       });
   }
}