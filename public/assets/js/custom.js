/* Write here your custom javascript codes */


//Get sum of cart values
$(document).ready(function () { //TODO: This is not complete
	quiz_count = 0;
	$('.product-total').each(function(checking){
	    quiz_count += ParseInt($(this).find('input:checked').val());
	});
});

// Service types radio
$(".sms_recepients_radio").change(function() {
//   var field_id = this.value;
//   console.log(this.value);
  var supplier_id = $('#global_supplier_id').val();
  var recepients_type = this.value;
//   console.log(recepients_type);
  $('.send_sms_feedback').html('').hide('slow');
  if(this.value!='all_contacts'){
	  $('.sms_recepient_select_div').show('slow');
	  $.get("/manage/customers/ajax-to-array?supplier_id=" + supplier_id+"&recepients_type=" + recepients_type, function (data) {
		// console.log(data);
		// $("#sms_recepient_select").empty();
		$("#sms_recepient_select").append(
		  '<option value="all_customers"> All Customers </option>'
		);
		$.each(data, function (index, name) {
		  $("#sms_recepient_select").append(
			 '<option value="' + index + '">' + name + "</option>"
		  );
		});
		$("#sms_recepient_select").select2();
	 });
	  //
	}else if(this.value=='all_contacts'){
	  $('.sms_recepient_select_div').hide('slow');
	}
//   if($(this).is(':checked')){
//     $('.price_each_'+field_id).prop("disabled", false);
//   } else {
//     $('.price_each_'+field_id).prop("disabled", true);
//   }
  // console.log(field_id);
});