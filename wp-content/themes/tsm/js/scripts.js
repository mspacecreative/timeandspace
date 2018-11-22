$(document).ready(function () {
	$('#sidebar .menu li.menu-item-has-children').prepend('<span class="sub-toggle"><i class="fa fa-angle-down"></i></span>');
	$('span.sub-toggle').on('touchstart click', function (e) {
	  e.preventDefault();
	  $(this).siblings('.sub-menu').slideToggle();
	  $(this).children().toggleClass('fa-angle-down fa-angle-up');
	});
	$('span.sub-toggle').on('touchmove touchend', function () {
	  return false;
	});
	
	$('.hero-slider, .solution_carousel').slick({
	    //autoplay: true,
		dots: true,
		adaptiveHeight: true,
	});
	
	// PAGINATION LINKS
	if ( $.trim( $('.half.prev-link').text() ).length == 0 ) {
	    $('.half.prev-link').hide();
	    $('.half.prev-link').next().css({'text-align' : 'right', 'width' : '100%'});
	}
	
	if ($('.the_solution_section').siblings().length == 0 ) { 
		$('.the_solution_section').css('width', '100%');
	}
});