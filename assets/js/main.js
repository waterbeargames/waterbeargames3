jQuery('document').ready(function($){
    var $window = $(window),
        $body = $('body'),
        $adminBar = $('#wpadminbar'),
        $header = $('#header'),
        $nav = $('#nav'),
        $main = $('main'),
        $footer = $('#footer');
        
    // Sticky footer
    var pushFooterDown = function() {
        $main.css('min-height', '');
    
        windowHeight = $window.height();
        mainHeight = $main.outerHeight();
        mainTop = $main.offset().top;
        footerHeight = $footer.outerHeight();
    
        mainMinHeight = windowHeight - mainTop - footerHeight;
    
        if (mainHeight < mainMinHeight) {
            $main.css('min-height', mainMinHeight);
        }
    }

    pushFooterDown();
    $window.resize(pushFooterDown);
    
    // Home page nav effects
    var navHasLogo = false,
        navHasShadow = false;
    
    var toggleNav = function() {
        var threshold = $header.outerHeight() / 2;
        
        if ($window.scrollTop() > 10 && !navHasShadow) {
            $nav.removeClass('no-transition').removeClass('no-shadow');
            navHasShadow = true;
        } else if ($window.scrollTop() <= 10 && navHasShadow) {
            $nav.addClass('no-shadow');
            navHasShadow = false;
        }
        
        if ($window.scrollTop() > threshold && !navHasLogo) {
            $nav.removeClass('no-transition').removeClass('no-logo');
            navHasLogo = true;
        } else if ($window.scrollTop() <= threshold && navHasLogo) {
            $nav.addClass('no-logo');
            navHasLogo = false;
        }
    }
    
    if ($body.hasClass('home')) {
        toggleNav();
        $window.scroll(toggleNav);
    }
});