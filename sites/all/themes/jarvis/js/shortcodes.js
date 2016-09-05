var $ = jQuery.noConflict();
$(document).ready(function(){
		
	/* ------------------------------------------------------------------------ */
	/* Accordion */
	/* ------------------------------------------------------------------------ */
	
	$('.accordion').each(function(){
	    var acc = jQuery(this).attr("rel") * 2;
	    $(this).find('.accordion-inner:nth-child(' + acc + ')').show();
	     $(this).find('.accordion-inner:nth-child(' + acc + ')').prev().addClass("active");
	});
	
	$('.accordion .accordion-title').click(function() {
	    if($(this).next().is(':hidden')) {
	        $(this).parent().find('.accordion-title').removeClass('active').next().slideUp(200);
	        $(this).toggleClass('active').next().slideDown(200);
	    }
	    return false;
	});
	
	/* ------------------------------------------------------------------------ */
	/* Alert Messages */
	/* ------------------------------------------------------------------------ */
	
	$(".alert-message .close").live('click',function(){
		$(this).parent().animate({'opacity' : '0'}, 300).slideUp(300);
		return false;
	});
	
	/* ------------------------------------------------------------------------ */
	/* Skillbar */
	/* ------------------------------------------------------------------------ */
	
	$('.skillbar').each(function(){
	    dataperc = jQuery(this).attr('data-perc'),
	    $(this).find('.skill-percentage').animate({ "width" : dataperc + "%"}, dataperc*10);
	});
	
	/* ------------------------------------------------------------------------ */
	/* Tabs */
	/* ------------------------------------------------------------------------ */
	
	tabset('div.tabset');
	
	/* ------------------------------------------------------------------------ */
	/* Toggle */
	/* ------------------------------------------------------------------------ */
	
	if( $(".toggle .toggle-title").hasClass('active') ){
		$(".toggle .toggle-title.active").closest('.toggle').find('.toggle-inner').show();
	}
	
	$(".toggle .toggle-title").click(function(){
		if( $(this).hasClass('active') ){
			$(this).removeClass("active").closest('.toggle').find('.toggle-inner').slideUp(200);
		}
		else{
			jQuery(this).addClass("active").closest('.toggle').find('.toggle-inner').slideDown(200);
		}
	});

/* EOF document.ready */



/* Tabset Function ---------------------------------- */
function tabset(obj) {
    var jQuerytabsets = $(obj);
    jQuerytabsets.each(function (i) {
        var jQuerytabs = $('li.tab a', this);
        jQuerytabs.click(function (e) {
            var jQuerythis = $(this);
                panels = $.map(jQuerytabs, function (val, i) {
                    return $(val).attr('href');
                });
            $(panels.join(',')).hide();
            jQuerytabs.removeClass('selected');
            jQuerythis.addClass('selected').blur();
            $(jQuerythis.attr('href')).show();
            e.preventDefault();
            return false;
        }).first().triggerHandler('click');
    });
}

/* ------------------------------------------------------------------------ */
/* EOF */
/* ------------------------------------------------------------------------ */
});