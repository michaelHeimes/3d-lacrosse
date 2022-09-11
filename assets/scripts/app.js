/**
 * Required
 */
 
 //@prepros-prepend vendor/foundation/js/plugins/foundation.core.js

/**
 * Optional Plugins
 * Remove * to enable any plugins you want to use
 */
 
 // What Input
 //@*prepros-prepend vendor/whatinput.js
 
 // Foundation Utilities
 // https://get.foundation/sites/docs/javascript-utilities.html
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.box.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.imageLoader.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.keyboard.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.mediaQuery.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.motion.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.nest.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.timer.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.touch.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.triggers.min.js


// JS Form Validation
//@prepros-prepend vendor/foundation/js/plugins/foundation.abide.js

// Accordian
//@prepros-prepend vendor/foundation/js/plugins/foundation.accordion.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.accordionMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveAccordionTabs.js

// Menu enhancements
//@prepros-prepend vendor/foundation/js/plugins/foundation.drilldown.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.dropdown.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.dropdownMenu.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.responsiveMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveToggle.js

// Equalize heights
//@*prepros-prepend vendor/foundation/js/plugins/foundation.equalizer.js

// Responsive Images
//@prepros-prepend vendor/foundation/js/plugins/foundation.interchange.js

// Navigation Widget
//@*prepros-prepend vendor/foundation/js/plugins/foundation.magellan.js

// Offcanvas Naviagtion Option
//@prepros-prepend vendor/foundation/js/plugins/foundation.offcanvas.js

// Carousel (don't ever use)
//@*prepros-prepend vendor/foundation/js/plugins/foundation.orbit.js

// Modals
//@prepros-prepend vendor/foundation/js/plugins/foundation.reveal.js

// Form UI element
//@*prepros-prepend vendor/foundation/js/plugins/foundation.slider.js

// Anchor Link Scrolling
//@prepros-prepend vendor/foundation/js/plugins/foundation.smoothScroll.js

// Sticky Elements
//@prepros-prepend vendor/foundation/js/plugins/foundation.sticky.js

// Tabs UI
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tabs.js

// On/Off UI Switching
//@*prepros-prepend vendor/foundation/js/plugins/foundation.toggler.js

// Tooltips
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tooltip.js

// What Input
//@prepros-prepend vendor/what-input.js

// Swiper
//@prepros-prepend vendor/swiper-bundle.js

// DOM Ready
(function($) {
	'use strict';
    
    var _app = window._app || {};
    
    _app.foundation_init = function() {
        $(document).foundation();
    }
        
    _app.emptyParentLinks = function() {
            
        $('.menu li a[href="#"]').click(function(e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = false;
        });	
        
    };
    
    _app.fixed_nav_hack = function() {
        
            
            $('.off-canvas').on('opened.zf.offCanvas', function() {
                $('header.site-header').addClass('off-canvas-content is-open-right has-transition-push');			
            });
            
            $('.off-canvas').on('close.zf.offCanvas', function() {
                $('header.site-header').removeClass('off-canvas-content is-open-right has-transition-push');
            });
            
            $(window).on('resize', function() {
                if ($(window).width() > 1023) {
                    $('.off-canvas').foundation('close');
                    $('header.site-header').removeClass('off-canvas-content has-transition-push');
                }
            });
    
    }
    
    _app.mobile_nav = function() {
        $(document).on('click', 'a#menu-toggle', function(){
            
            if ( $(this).hasClass('clicked') ) {
                $(this).removeClass('clicked');
                $('#off-canvas').fadeOut(200);
            
            } else {
            
                $(this).addClass('clicked');
                $('#off-canvas').fadeIn(200);
            
            }
            
        });
    }
    
    _app.display_on_load = function() {
        $('.display-on-load').css('visibility', 'visible');
    }

    _app.page_nav_dropdown = function() {
        if( $('.page-nav').length ) {
            let $pageNav = $('.page-nav');
            let $toggleBtn = $($pageNav).find('#page-nav-toggle');
            let $currentPage = $($pageNav).find('.is-active');
            let $currentPageTitle = $currentPage.text();
            console.log($currentPage);
                        
            $($toggleBtn).click(function(e){
                e.preventDefault();
                $(this).next('.page-nav-wrap').toggle();
                $(this).toggleClass('open');
            });
            
            $(window).on("load resize", function() {
            
                if ($(window).width() < 640) {
                    $($toggleBtn).text($currentPageTitle);
                    $($currentPage).hide();
                } else {
                    $($currentPage).show();
                }
                
                if ($(window).width() > 639) {
                    $('.page-nav-wrap').show();
                }
                
            });
            
        }
    }

    _app.home_region_dropdown = function() {
        if( $('body').hasClass('home') ) {
            
            $(window).on('load resize', function() {
            
                if ($(window).width() < 900) {
                   $('#home-region-nav-dropdown').foundation('close');
                }
                else {
                  $('#home-region-nav-dropdown').foundation('open');
                }
            
            });
            
        }
    }   
    
    _app.pros_slider = function() {
        if( $('body').hasClass('home') ) {
            const swiper = new Swiper('.pros-slider', {
              loop: true,
              slidesPerView: 'auto',
              spaceBetween: 15,
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
              breakpoints: {
                640: {
                    spaceBetween: 0,
                },
              },
    
            });
        }
    }
    
    _app.team_dropdown = function() {
        if( $('body').hasClass('page-template-page-roster') ) {
            $('.top .right button').click(function(e){
                e.preventDefault();
                $(this).next('div').find('div').toggle();
                $(this).toggleClass('open');
            });
        }
    }
    
    _app.default_banner = function() {
        if( $('body').hasClass('page-template-default') ) {
            if( $('.entry-content module:first').hasClass('img-copy-card') ) {
                
            } else {
                $('.banner').addClass('no-pull');
            }
        }
    }
    
    _app.header_nav = function() {
        const $header = $('header.site-header');
        const $regionsDropdown = $('header.site-header #top-bar-menu .region-nav .menu.submenu.is-dropdown-submenu');
        $(window).on('load resize', function() {
            const $regionsDropdownHeight = $regionsDropdown.height();
            if($regionsDropdownHeight > 120) {
                $($header).css('padding-bottom', $regionsDropdownHeight * .5);
            }
        });
    }
            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        _app.emptyParentLinks();
        //_app.fixed_nav_hack();
        
        // Custom Functions
        _app.display_on_load();
        _app.page_nav_dropdown();
        _app.home_region_dropdown();
        _app.pros_slider();
        _app.team_dropdown();
        _app.mobile_nav();
        _app.default_banner();
        _app.header_nav();
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
    });
	
	
})(jQuery);