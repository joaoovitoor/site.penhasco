jQuery(document).ready(function(){
	jQuery('.linkScroll').on("click", function(event) {
		event.preventDefault();
		jQuery('html,body').animate({
			scrollTop: jQuery(this.hash).offset().top
		}, 800);
	});

	jQuery('#area').click(function(){
		jQuery('.area-login').fadeToggle();
	})
})