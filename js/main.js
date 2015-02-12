jQuery('document').ready(function($){
    var $window = $(window),
        $body = $('body'),
        $header = $('#header'),
        $nav = $('#nav');
    
    // DL Menu initialization
    $('#dl-menu').dlmenu({
        animationClasses: {
            classin: 'dl-animate-in-1',
            classout: 'dl-animate-out-1'
        }
    });
    
    // Smooth scrolling
    $('a').click(function(e) {
        var t = $(this),
            section = t.attr('href'),
            section = section.replace(/\//, ''),
            navHeight = $nav.height();
            
            console.log($(section).offset());
        
        if ($(section).length > 0) {
            e.preventDefault();
            $('html, body').animate({
               scrollTop: $(section).offset().top - navHeight
            }, 1500);
        }
    });
    
    // Proportional iframe resizing
    var iframes = $('iframe');
	var resizeIframes = function() {
		$.map(iframes, function(f) {
			var iframe = $(f);
			var iframeWidth = iframe.attr('width');
			var iframeHeight = iframe.attr('height');
			var iframeScaledWidth = iframe.width();
			var newHeight = iframeHeight/iframeWidth * iframeScaledWidth;
			iframe.css('height', newHeight + 'px');
		});
	};

	resizeIframes();
	$window.resize(resizeIframes);
});