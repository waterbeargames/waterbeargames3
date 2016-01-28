jQuery('document').ready(function($){
    var $window = $(window),
        $body = $('body'),
        $adminBar = $('#wpadminbar'),
        $header = $('#header'),
        $homeHeader = $('.home #header'),
        $nav = $('#nav'),
        $mobileMenu = $('#dl-menu'),
        $main = $('main'),
        $footer = $('#footer');
    
    // Check if mobile width
    var isMobileWidth = function() {
        if ($mobileMenu.css('display') === 'block') {
            return true;
        } else {
            return false;
        }
    }
    
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
    
    /*
     * Home page nav effects
     */
    var navHasLogo = false,
        navHasShadow = false;
    
    var toggleNav = function() {
        var threshold = $header.outerHeight() / 2;
        
        // Adds shadow at 10px from the top
        if ($window.scrollTop() > 10 && !navHasShadow) {
            $nav.removeClass('no-transition').removeClass('no-shadow');
            navHasShadow = true;
        } else if ($window.scrollTop() <= 10 && navHasShadow) {
            $nav.addClass('no-shadow');
            navHasShadow = false;
        }
        
        // Adds logo halfway down the header
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
    
    /*
     * Home page header bubbles
     */
    var bubbleSizes     = ['small', 'medium', 'large'],
        bubbleColors    = ['primary', 'secondary', 'accent'];
    
    // Creates a single bubble, then removes it
    var makeBubble = function() {
        // Sets random x and y position 0-100
        var xPosition = Math.floor(Math.random() * 101),
            yPosition = Math.floor(Math.random() * 101);
        
        // Chooses a random color from the bubbleColors array
        var color = bubbleColors[Math.floor(Math.random() * bubbleColors.length)];
        
        // Chooses a random size from the bubbleSizes array
        var size = bubbleSizes[Math.floor(Math.random() * bubbleSizes.length)];
        
        var $bubble = $('<div class="header-bubble ' + color + '-header-bubble ' + size + '-header-bubble" style="top: ' + yPosition + '%; left: ' + xPosition + '%;"></div>');
        
        $homeHeader.append($bubble);
        
        setTimeout(function() {
            $bubble.remove();
        }, 5000);
    };
    
    var makingBubbles = false,
        makeBubbles = false;
    
    // Creates bubbles only at large width
    var startMakingBubbles = function() {
        if (isMobileWidth() && makingBubbles) {
            if (makeBubbles) { clearInterval(makeBubbles); }
            makingBubbles = false;
        } else if (!isMobileWidth() && !makingBubbles) {
            makeBubbles = setInterval(makeBubble, 1000);
            makingBubbles = true;
        }
    }
    
    startMakingBubbles();
    $window.resize(startMakingBubbles);
});