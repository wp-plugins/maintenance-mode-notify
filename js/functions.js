jQuery(document).ready(function(){
	var docHeight = $(document).height();
	$('.fullScreenYellowBar').css("height", docHeight);
	$(".blink").show(function(){
	for(i=0;i<1000; i++) {
		jQuery(this).fadeOut(1000).fadeIn(1000);
	}
	});
	
});

