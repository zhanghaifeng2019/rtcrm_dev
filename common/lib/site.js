function $wrapper_fit() {
	var $headerH = $('header').height();
	$('#wrapper').css('padding-top', $headerH);
}

$(function() {
	$('.header-user-name').on('click', function (){
		if ( !$('.header-user').hasClass('header-user-active') ) {
			$('.header-user').addClass('header-user-active');
			$('.header-user-menu').stop().fadeIn();
		} else {
			$('.header-user').removeClass('header-user-active');
			$('.header-user-menu').stop().fadeOut();
		}
	});
	$('.header-user-menu-close').on('click', function (){
		$('.header-user').removeClass('header-user-active');
		$('.header-user-menu').stop().fadeOut();
	});
	$('.header-sp-trigger').on('click', function (){
		if ( !$('.header-main').hasClass('header-active') ) {
			$('.header-main').addClass('header-active');
			$('.header-main ul').stop().fadeIn();
		} else {
			$('.header-main').removeClass('header-active');
			$('.header-main ul').stop().fadeOut();
		}
	});
	$('.title-sp-trigger').on('click', function (){
		if ( !$('.title-bar').hasClass('title-active') ) {
			$('.title-bar').addClass('title-active');
			$('.title-bar ul').stop().fadeIn();
		} else {
			$('.title-bar').removeClass('title-active');
			$('.title-bar ul').stop().fadeOut();
		}
	});
});

$(window).on('load', function (){
	$wrapper_fit();

	//scroller
	$('a[href^="#"]:not(a[data-modal])').click(function() {
		var $navHeight = $('header').height() + 20;
		var speed = 800;
		var href= $(this).attr('href');
		var target = $(href == '#' || href == '' ? 'html' : href);
		var position = target.offset().top - $navHeight;
		$('body, html').animate({scrollTop:position}, speed, 'swing');
		return false;
	})

	var url = $(location).attr('href');
	if(url.indexOf("#") != -1){
		var $navHeight = $('header').height() + 20;
		var id = url.split("#");
		var $target = $('#' + id[id.length - 1]);
		if($target.length){
			var pos = $target.offset().top - $navHeight;
			$("html, body").animate({scrollTop:pos}, 1500);
		}
	}
});
$(window).on('resize', function (){
	// reset
	$wrapper_fit();
	$('.header-main ul').removeAttr('style');
	if ( $('.header-main').hasClass('header-active') ) {
		$('.header-main').removeClass('header-active');
	}
	$('.title-bar ul').removeAttr('style');
	if ( $('.title-bar').hasClass('title-active') ) {
		$('.title-bar').removeClass('title-active');
	}
});