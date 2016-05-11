$(function() {
	$(".auto").autocomplete({
		source: "search.php",
		//manual css offset for the resultbox - can be removed
		open : function(){
			$(".ui-autocomplete:visible").css({top:"+=0",left:"+=0"});
		},
		// defining the number of characters to type before result(s) will be shown
		minLength: 2
	});				
});



