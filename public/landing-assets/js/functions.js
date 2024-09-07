/*global jQuery */
/* Contents
// ------------------------------------------------>
	1.  Background INSERT
	2.  NAVBAR FIXED
	3.	NAVBAR TOGGLE
	4.  NAVBAR SCROLL TO
	5.  NAVBAR SCROLLING SECTION
    6.  AJAX MAILCHIMP
    7.  AJAX CAMPAIGN MONITOR
	8.  PRICING SWITCHER
    9.  COUNTER UP
    10. OWL CAROUSEL
    11. MAGNIFIC POPUP VIDEO
    12. WOW
    13. AJAX CONTACT FORM
    14. SCROLL TO
*/
(function($) {
    "use strict";

    /* ------------------  Background INSERT ------------------ */

    var $bgSection = $(".bg-section");

    $bgSection.each(function() {
        var bgSrc = $(this).children("img").attr("src");
        var bgUrl = 'url(' + bgSrc + ')';
        $(this).parent().css("backgroundImage", bgUrl);
        $(this).parent().addClass("bg-section");
        $(this).remove();
    });

    /* ------------------ NAVBAR FIXED ------------------ */

    $(window).scroll(function() {
        /* affix after scrolling 100px */
        if (
            $(document).scrollTop() > $(window).height() ||
            $(document).scrollTop() > 105
        ) {
            $(".navbar-sticky").addClass("navbar-fixed");
        } else {
            $(".navbar-sticky").removeClass("navbar-fixed");
        }
    });

    /* ------------------  NAVBAR TOGGLE ------------------ */

    $('.navbar-toggler').on('click', function() {
        $('.navbar-toggler-icon').toggleClass('active');
    });

    /* ------------------  NAVBAR SCROLL TO ------------------ */

    var aScroll = $('.nav-item .nav-link'),
        $navbarCollapse = $('.navbar-collapse');
    aScroll.on('click', function(event) {
        var target = $($(this).attr('href'));
        $(this).parent(".nav-item").siblings().removeClass('active');
        $(this).parent('.nav-item').addClass('active');

        if (target.length > 0) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }

        // If click link and navabr is show
        if ($('.navbar-collapse').hasClass('show')) {
            $('.navbar-collapse').toggleClass('show');
            $('.navbar-toggler-icon').toggleClass('active');
            $('.navbar-toggler').toggleClass('collapsed');
        }
    });

    /* ------------------ NAVBAR SCROLLING SECTION ------------------ */

    var $section = $('section'),
        $bodyScroll = $('.body-scroll');
    if ($bodyScroll.length > 0) {
        $(window).on("scroll", function() {
            $section.each(function() {
                var sectionID = $(this).attr("id"),
                    sectionTop = $(this).offset().top - 100,
                    sectionHight = $(this).outerHeight(),
                    wScroll = $(window).scrollTop(),
                    $navHref = $("a[href='#" + sectionID + "']"),
                    $nav = $('.navbar-nav').find($navHref).parent();
                if (wScroll > sectionTop - 1 && wScroll < sectionTop + sectionHight - 1) {
                    $nav.addClass('active');
                    $nav.siblings().removeClass('active');
                }
            });
        });
    }

    /* ------------------  AJAX MAILCHIMP ------------------ */

    $('.mailchimp').ajaxChimp({
        url: "http://wplly.us5.list-manage.com/subscribe/post?u=91b69df995c1c90e1de2f6497&id=aa0f2ab5fa", //Replace with your own mailchimp Campaigns URL.
        callback: chimpCallback

    });

    function chimpCallback(resp) {
        if (resp.result === 'success') {
            $('.subscribe-alert').html('<h5 class="alert alert-success">' + resp.msg + '</h5>').fadeIn(1000);
            //$('.subscribe-alert').delay(6000).fadeOut();

        } else if (resp.result === 'error') {
            $('.subscribe-alert').html('<h5 class="alert alert-danger">' + resp.msg + '</h5>').fadeIn(1000);
        }
    }

    /* ------------------  AJAX CAMPAIGN MONITOR  ------------------ */

    $('#campaignmonitor').submit(function(e) {
        e.preventDefault();
        $.getJSON(
            this.action + "?callback=?",
            $(this).serialize(),
            function(data) {
                if (data.Status === 400) {
                    alert("Error: " + data.Message);
                } else { // 200
                    alert("Success: " + data.Message);
                }
            });
    });

    /* ------------------  PRICING SWITCHER  ------------------ */

    var $pricingHolder = $('.pricing-holder'),
        $pricingPanel = $('.pricing-panel');

    if ($pricingHolder.length > 0) {

        // If clicked on swaitcher panel
        $pricingPanel.on('mousewheel', function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });
    }

    /* ------------------  COUNTER UP ------------------ */

    $(".counting").counterUp({
        delay: 10,
        time: 1000
    });

    /* ------------------ OWL CAROUSEL ------------------ */

    $(".owl-carousel").each(function() {
        var $Carousel = $(this);
        $Carousel.owlCarousel({
            loop: $Carousel.data('loop'),
            autoplay: $Carousel.data("autoplay"),
            margin: $Carousel.data('space'),
            nav: $Carousel.data('nav'),
            dots: $Carousel.data('dots'),
            dotsSpeed: $Carousel.data('speed'),
            center: $Carousel.data('center'),
            thumbs: true,
            thumbsPrerendered: true,
            thumbContainerClass: 'owl-thumbs',
            thumbItemClass: 'owl-thumb-item',
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: $Carousel.data('slide-res')
                },
                1000: {
                    items: $Carousel.data('slide'),
                }
            }
        });
    });

    // $('.owl-thumbs .owl-thumb-item').click(function () {
    //     $(this).siblings(".owl-thumb-item").removeClass('active');
    //     $(this).addClass('active');
    //     console.log($(this).index())
    //     $(".owl-carousel").trigger('to.owl.carousel', [$(this).index(), 300]);
    // });

    // $(".owl-carousel").on('changed.owl.carousel', function(event) {
    //     var items     = event.item.count;     // Number of items
    //     var item      = event.item.index;     // Position of the current item
    //     var owlDots = document.querySelectorAll('.owl-thumbs .owl-thumb-item');
    //     if (owlDots.length > 0 ) {
    //         console.log(owlDots[item]);
    //         owlDots[item].click()
    //     }
    // })

    /* ------------------  MAGNIFIC POPUP VIDEO ------------------ */

    $('.popup-video').magnificPopup({
        disableOn: 700,
        mainClass: 'mfp-fade',
        removalDelay: 0,
        preloader: false,
        fixedContentPos: false,
        type: 'iframe',
        iframe: {
            markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                '</div>',
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: '//www.youtube.com/embed/%id%?autoplay=1'
                }
            },
            srcAction: 'iframe_src',
        }
    });

    /* ------------------  WOW ------------------ */

    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 50,
        mobile: false,
        live: true

    });
    wow.init();

    /* ------------------  AJAX CONTACT FORM  ------------------ */

    var contactForm = $(".contactForm"),
        contactResult = $('.contact-result');

    contactForm.validate({
        debug: false,
        submitHandler: function(contactForm) {
            $(contactResult, contactForm).html('Please Wait...');
            $.ajax({
                type: "POST",
                url: "assets/php/contact.php",
                data: $(contactForm).serialize(),
                timeout: 20000,
                success: function(msg) {
                    //window.location.href = "thanks-you.html";
                    // Active this line if you need to add message alerts instead of Thanks You page
                    $(contactResult, contactForm).html('<div class="alert alert-success" role="alert"><strong>Thank you. We will contact you shortly.</strong></div>').delay(3000).fadeOut(2000);
                },
                error: $('.thanks').show()
            });
            return false;
        }
    });

    contactForm.removeAttr("novalidate");

    /* ------------------  SCROLL TO ------------------ */

    var aScroll = $('.scroll-to');
    aScroll.on('click', function(event) {
        var target = $($(this).attr('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });
    /* ------------------  PRICING SWITCHER  ------------------ */

    var $pricingSwitcher = $('.pricing-switcher'),
        $pricingLabel = $('.pricing-switcher a'),
        $pricingContainer = $('.pricing-container'),
        $pricingPanel = $('.pricing-panel');

    if ($pricingSwitcher.length > 0) {
        // If clicked on swaitcher label
        $pricingLabel.on('click', function() {
            if ($(this).hasClass('active')) {
                return false
            }
            $(this).siblings('a').removeClass('active');
            $(this).addClass('active');
            $pricingContainer.toggleClass('monthly yearly');
            $pricingPanel.toggleClass('hidden visible');
        });

    }

}(jQuery));