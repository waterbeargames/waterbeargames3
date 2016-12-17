jQuery('document').ready(function($){
    var $window = $(window),
        $document = $(document),
        $body = $('body'),
        $adminBar = $('#wpadminbar'),
        $header = $('.main-header'),
        $homeHeader = $('.home .main-header'),
        $nav = $('.main-nav'),
        $mobileMenu = $('#dl-menu'),
        $main = $('main'),
        $footer = $('.main-footer');
    
    // Check for valid jQuery selector
    function isValidSelector(selector) {
        try {
            var $element = $(selector);
        } catch(error) {
            return false;
        }
        return true;
    }
    
    // Check if mobile width
    var isMobileWidth = function() {
        if ($mobileMenu.css('display') === 'block') {
            return true;
        } else {
            return false;
        }
    }
    
    // Adds parent links to their own submenus in DL Menu if they have a link
    // because the parent link no longer functions as an actual link.
    $('#dl-menu li.menu-item-has-children').each(function() {
        t = $(this);
        
        if (!!t.children('a').attr('href') && t.children('a').attr('href') !== '#') {
            $clone = t.clone();
            $clone.children('ul').remove();
            $clone.removeClass('menu-item-has-children current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor');
            t.children('ul').prepend($clone);
        }
    });
    
    // DL Menu initialization
    $('#dl-menu ul ul').addClass('dl-submenu');
    $('#dl-menu').dlmenu({
        animationClasses: {
            classin: 'dl-animate-in-1',
            classout: 'dl-animate-out-1'
        }
    });
    
    // Adjust nav position if admin bar is present
    var adjustNavPosition = function() {
        if ($nav.css('position') === 'fixed' && $adminBar.css('position') === 'absolute') {
            scrollTop = $window.scrollTop();
            adminBarHeight = $adminBar.height();
            
            if (scrollTop < adminBarHeight) {
                $nav.css('top', adminBarHeight - scrollTop);
            } else {
                $nav.css('top', 0);
            }
        } else {
            $nav.css('top', '');
        }
    }
    
    adjustNavPosition();
    $window.scroll(adjustNavPosition);
    $window.resize(adjustNavPosition);
    
    // Fix anchor links causing a section to be covered by the nav on page load
    var anchorLinkSection = window.location.hash;

    if (anchorLinkSection && isValidSelector(anchorLinkSection) && $(anchorLinkSection).length > 0) {
        var navHeight = 0,
            adminBarHeight = 0;

        if ($nav.css('bottom') !== '0px') {
            navHeight = $nav.outerHeight();
        }

        if ($adminBar.length > 0 && $adminBar.css('position') === 'fixed') {
            adminBarHeight = $adminBar.height();
        }

        $window.load(function() {
            $('html, body').animate({
               scrollTop: $(anchorLinkSection).offset().top - navHeight - adminBarHeight
            }, 0);
        });
    }
    
    // Submenu appearance
    var $navSubMenuParent = $('.desktop-nav-menu .menu-item-has-children');
    
    var adjustSubMenuPosition = function(navSubMenuParent) {
        var windowWidth = $window.width(),
            $navSubMenu = navSubMenuParent.children('.sub-menu');
        
        $navSubMenu.removeClass('show-adjust');
        
        var navSubMenuLeft = $navSubMenu.offset().left,
            navSubMenuWidth = $navSubMenu.width(),
            spaceLeft = windowWidth - navSubMenuLeft - navSubMenuWidth;
            
        if (spaceLeft < 0) {
            $navSubMenu.addClass('show-adjust');
        }
    };
    
    $navSubMenuParent.each(function() {
        var $t = $(this);
        
        adjustSubMenuPosition($t);
        $window.resize(function() {
            adjustSubMenuPosition($t);
        });
    });
    
    $navSubMenuParent.mouseenter(function() {
        var t = $(this),
            $otherSubMenuParents = t.siblings('.menu-item-has-children');

        setTimeout(function() {
            t.children('ul').addClass('show');
            t.siblings('.menu-item-has-children').find('ul').removeClass('show');
        }, 400);
    }).mouseleave(function() {
        var t = $(this);

        setTimeout(function() {
            t.find('ul').removeClass('show');
        }, 400);
    });
    
    $navSubMenuParent.on('touchstart', function(e) {
        t = $(this);

        if (!t.children('ul').hasClass('show')) {
            e.preventDefault();
            t.children('ul').addClass('show');
        }
    });
    
    $document.on('touchstart', function(e) {
        $navSubMenuParent.each(function() {
            var t = $(this);
            
            if (t.children('ul').hasClass('show') && !t.is($(e.target)) && t.has($(e.target)).length === 0) {
                t.children('ul').removeClass('show');
            }
        });
    });
    
    // Smooth scrolling
    $('a[href]').click(function(e) {
        var t = $(this),
            link = t.attr('href'),
            linkPath = link.split('#')[0],
            section = '#' + link.split('#')[1],
            currentPage = window.location.pathname;
            
        if (isValidSelector(section) &&
            $(section).length > 0 &&
            (linkPath === '' || linkPath === currentPage) &&
            t.parents('.no-auto-scroll').length === 0 &&
            t.attr('id') !== 'cancel-comment-reply-link') {
                
            e.preventDefault();
            
            var navHeight = $nav.outerHeight(),
                adminBarHeight = 0;
            
            if ($adminBar.length > 0 && $adminBar.css('position') === 'fixed') {
                adminBarHeight = $adminBar.height();
            }
            
            $('html, body').animate({
               scrollTop: $(section).offset().top - navHeight - adminBarHeight
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
    
    /*
     * Add filter attribute with drop shadow to certain SVG elements
     * because styling it through CSS is problematic cross-browser right now
     */
    
    var $svgElements = $('.pz-games .circle-button svg, .header-game-logo .vector-container svg').find('rect, circle, ellipse, path, polygon');
    
    $.each($svgElements, function() {
        $(this).attr('filter', 'url(#dropshadow)');
    });
});