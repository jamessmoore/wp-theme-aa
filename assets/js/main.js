jQuery(document).ready(function(){
	
	jQuery(window).load(function() {
		
		// menu drop down
		jQuery('.menu-top li').hover(function(){
			jQuery(this).children('a').addClass('hover');
			jQuery(this).children('.sub-menu').stop().slideDown(200);
		}, function(){
			jQuery(this).children('a').removeClass('hover');
			jQuery(this).children('.sub-menu').stop().slideUp(200);
		});
		jQuery('.header-block .icon-menu').click(function(eventObject) {
			eventObject.preventDefault();
		}).toggle(function(){
			jQuery('.header-block .menu-top-mob').slideDown(200);
		}, function(){
			jQuery('.header-block .menu-top-mob').slideUp(200);
		});
		
		// Owl Carousel
		jQuery(".causes-carousel").owlCarousel({
			navigation : true, // Show next and prev buttons
			pagination: false,
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true,
			transitionStyle : "fade",
			responsiveRefreshRate : 100
			// "singleItem:true" is a shortcut for:
			// items : 1, 
			// itemsDesktop : false,
			// itemsDesktopSmall : false,
			// itemsTablet: false,
			// itemsMobile : false
		});
		jQuery(".news-carousel").owlCarousel({
			navigation : true, // Show next and prev buttons
			pagination: false,
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true,
			transitionStyle : "fade",
			responsiveRefreshRate : 100
			// "singleItem:true" is a shortcut for:
			// items : 1, 
			// itemsDesktop : false,
			// itemsDesktopSmall : false,
			// itemsTablet: false,
			// itemsMobile : false
		});
		jQuery(".events-carousel").owlCarousel({
			navigation : true, // Show next and prev buttons
			pagination: false,
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true,
			transitionStyle : "fade",
			responsiveRefreshRate : 100
			// "singleItem:true" is a shortcut for:
			// items : 1, 
			// itemsDesktop : false,
			// itemsDesktopSmall : false,
			// itemsTablet: false,
			// itemsMobile : false
		});
		
		// input focus
		jQuery(".comment-form :text, .comment-form textarea, .contact-form :text, .contact-form textarea").focus(function(){
			var value = jQuery(this).attr("value");
			if (value == "")
			var attrfor = jQuery(this).attr('id');
			jQuery("label[for=" + attrfor + "]").css({"display":"none"});
		});
		jQuery(".comment-form :text, .comment-form textarea, .contact-form :text, .contact-form textarea").blur(function(){
			var value = jQuery(this).attr("value");
			if (value == "")
			var attrfor = jQuery(this).attr('id');
			jQuery("label[for=" + attrfor + "]").css({"display":"block"});
		});
		
		// gallery-item hover
		jQuery('.gallery-item, .article-image').hover(function(){
			jQuery(this).find('.overlay').stop().fadeIn(200);
		}, function(){
			jQuery(this).find('.overlay').stop().fadeOut(200);
		});
		
		// css fix
		jQuery('.menu-top-bar li:first-child, .menu-top .sub-menu li:first-child').addClass('first-child');
		jQuery('.menu-contact li:last-child, .menu-copyright li:last-child, .contact-info li:last-child, .social-media li:last-child').addClass('last-child');
		
	}); // END load
	
}); // END ready