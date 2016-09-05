// JavaScript Document

jQuery(document).ready(function($) {

	$('body').addClass('onepage');
	
/*----------------------------------------------------*/
/* NAVIGATION SECTION
/*----------------------------------------------------*/

	$('.navigation ul.menu').addClass('main-menu large nav');
	$('.navigation ul.menu').attr('id', 'nav');

/*----------------------------------------------------*/
/* CUSTOMIZE MAIN MENU LINK
/*----------------------------------------------------*/

	if($('body').hasClass('front')) {
		$('.main-menu .leaf').each(function() {
		  $(this).addClass('menu__item is-leaf');
		  var hrefVal = $(this).children('a').attr('href');
		  var anchorVal = "#" + hrefVal.substr(hrefVal.indexOf("#") + 1);
		  if(hrefVal.indexOf("#") != -1) {
			$(this).children('a').attr('href', anchorVal);
		  }
		  $(this).children('a').removeClass('active');
		});
		
		$('.main-menu li:nth-child(1) a').addClass("active");
	}
	
/*----------------------------------------------------*/
/* CUSTOMIZE PAGER LINK
/*----------------------------------------------------*/

	$('.pagination .pager-previous a').html('<i class="icon-angle-left"></i>');
	$('.pagination .pager-next a').html('<i class="icon-angle-right"></i>');
	$('.pagination .pager-previous a').addClass('previous');
	$('.pagination .pager-next a').addClass('next');
	

/*----------------------------------------------------*/
/* Comment form
/*----------------------------------------------------*/

	if(!$('body').hasClass('page-comment-edit')) {
		var divs = $("form.comment-form > div > div");
		divs.slice(0, 3).wrapAll("<div id='comment-input'></div>");
		divs.slice(3, 4).wrapAll("<div id='comment-textarea'></div>");
		divs.slice(4, 5).wrapAll("<div id='comment-submit'></div>");
	}else{
		$('.comment-form').find('.form-textarea').css('min-width', '350px');
	}

/*----------------------------------------------------*/
/* Contact form
/*----------------------------------------------------*/

	var divs = $("form.contact-form > div > div");
	divs.slice(0, 3).wrapAll("<div id='contact-input'></div>");
	divs.slice(3, 4).wrapAll("<div id='contact-textarea'></div>");
	$('.contact-form div.form-actions').wrapAll("<div id='contact-submit'></div>");
	
/*----------------------------------------------------*/
/* Tabs
/*----------------------------------------------------*/

	$('.tabs ul.tabs-primary').addClass('tabs styled-list');
	$('.tabs ul.tabs-primary').children('li').addClass('tab');
	$('.tabs ul.tabs-primary li').each(function() {
		if($(this).hasClass('is-active')) {
			$(this).children('a').addClass('selected');
		}
	});
	$('.tabs').siblings().css('clear','left');
});