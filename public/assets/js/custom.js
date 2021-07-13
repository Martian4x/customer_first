/* Write here your custom javascript codes */


//Get sum of cart values
$(document).ready(function () { //TODO: This is not complete
	quiz_count = 0;
	$('.product-total').each(function(checking){
	    quiz_count += ParseInt($(this).find('input:checked').val());
	});
});