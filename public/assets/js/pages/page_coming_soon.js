var PageComingSoon = function () {

    return {
        
        //Coming Soon
        initPageComingSoon: function () {
			var newYear = new Date(); 
			// newYear = new Date(newYear.getFullYear() + 1, 1 - 1, 1); 
			newYear = new Date(getDay() + 7); 
			$('#defaultCountdown').countdown({until: newYear})
        }

    };
}();        