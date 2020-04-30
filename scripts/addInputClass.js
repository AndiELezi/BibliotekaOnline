$(window).on('load', function() { 
   	if($(".single_input > input").val() !=""){
		$(".single_input > input").addClass("has-content");
	}else{
		$(".single_input > input").removeClass("has-content");
	}

     $(".single_input > input").focusout(function(){
		if($(this).val() != ""){
			$(this).addClass("has-content");
		}else{
			$(this).removeClass("has-content");
		}
	})
 });