/*--------------------------
    Project Name: Lamba
    Version: 1.0
    Author: 7oorof
    Devloped by: Ahmed Abdallah (a.abdallah999@gmail.com)
    Relase Date: July 2020
---------------------------*/
/*---------------------------
      Table of Contents
    --------------------
    01- Pre Loading
    02- Mobile Menu
    03- Sticky Navbar
    04- Scroll Top Button
    05- Scroll Top Button
    06- Set Background-img to section 
    07- Add active class to accordions
    08- Progress bars
    09- Increase and Decrease Input Value 
    10- Contact Form  Validation
    11- Load More Items
    12- Slick Carousel
    13- Popup Video
    14- CounterUp
    15- NiceSelect Plugin
    16- Range Slider
    17- Count Down Timer
    18- AOS Animation Plugin
    19- Portfolio Filtering and Sorting
     
 ----------------------------*/

$(function () {

    "use strict";

    // Global variables
    var $win = $(window);

    /*==========  Pre Loading   ==========*/
    $win.on('load', function () {
        $(".preloader").fadeOut(5000);
        $(".preloader").remove();
    });

    /*==========   Mobile Menu   ==========*/
    var $navToggler = $('.navbar-toggler');
    $navToggler.on('click', function () {
        $(this).toggleClass('actived');
    })
    $navToggler.on('click', function () {
        $('.navbar-collapse').toggleClass('menu-opened');
    })

    /*==========   Sticky Navbar   ==========*/
    $win.on('scroll', function () {
        if ($win.width() >= 992) {
            var $navbar = $('.navbar');
            if ($win.scrollTop() > 0) {
                $navbar.addClass('sticky-navbar');
            } else {
                $navbar.removeClass('sticky-navbar');
            }
        }
    });

    /*==========  Open and Close Popup   ==========*/
    // open Popup
    function openPopup(popupTriggerBtn, popup, addedClass, removedClass) {
        $(popupTriggerBtn).on('click', function (e) {
            e.preventDefault();
            $(popup).toggleClass(addedClass, removedClass).removeClass(removedClass);
        });
    }
    // Close Popup
    function closePopup(closeBtn, popup, addedClass, removedClass) {
        $(closeBtn).on('click', function () {
            $(popup).removeClass(addedClass).addClass(removedClass);
        });
    }
    // close popup when clicking on an other place on the Document
    function closePopupFromOutside(popup, stopPropogationElement, popupTriggerBtn, removedClass, addedClass) {
        $(document).on('mouseup', function (e) {
            if (!$(stopPropogationElement).is(e.target) && !$(popupTriggerBtn).is(e.target) && $(stopPropogationElement).has(e.target).length === 0 && $(popup).has(e.target).length === 0) {
                $(popup).removeClass(removedClass).addClass(addedClass);
            }
        });
    }

    openPopup('.action-btn__search', '.search-popup', 'active', 'inActive') // Open Search popup
    closePopup('.search-popup__close', '.search-popup', 'active', 'inActive') // Close Search popup
    openPopup('.action-btn__humburgerMenu', '.hamburger-menu', 'active', 'inActive') // Open sidenav popup
    closePopup('.hamburger-menu__close', '.hamburger-menu', 'active', 'inActive') // Close sidenav popup
    openPopup('.action-btn__cart', '.cart-popup', 'active', 'inActive') // Open Search popup
    closePopupFromOutside('.cart-popup', '.cart-popup', '.action-btn__cart', 'active');  // close popup when clicking on an other place on the Document
    openPopup('.action-btn__menuPopup', '.menu-popup', 'active', 'inActive') // Open menu-popup
    closePopup('.menu-popup__close', '.menu-popup', 'active', 'inActive') // Close menu-popup

    /*==========   Scroll Top Button   ==========*/
    var $scrollTopBtn = $('#scrollTopBtn');
    // Show Scroll Top Button
    $win.on('scroll', function () {
        if ($(this).scrollTop() > 700) {
            $scrollTopBtn.addClass('actived');
        } else {
            $scrollTopBtn.removeClass('actived');
        }
    });
    // Animate Body after Clicking on Scroll Top Button
    $scrollTopBtn.on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });

    /*==========   Set Background-img to section   ==========*/
    $('.bg-img').each(function () {
        var imgSrc = $(this).children('img').attr('src');
        $(this).parent().css({
            'background-image': 'url(' + imgSrc + ')',
            'background-size': 'cover',
            'background-position': 'center',
        });
        $(this).parent().addClass('bg-img');
        $(this).remove();
    });

    /*==========   Add active class to accordions   ==========*/
    $('.accordion-item__header').on('click', function () {
        $(this).parent('.accordion-item').toggleClass('opened');
        $(this).parent('.accordion-item').siblings().removeClass('opened');
    })
    $('.accordion-item__title').on('click', function (e) {
        e.preventDefault()
    });

    /*==========   Progress bars  ==========*/
    if ($(".animated-Progressbars").length > 0) {
        $(window).on('scroll', function () {
            var skillsOffset = $(".animated-Progressbars").offset().top - 130,
                skillsHight = $(this).outerHeight(),
                winScrollTop = $(window).scrollTop();
            if (winScrollTop > skillsOffset - 1 && winScrollTop < skillsOffset + skillsHight - 1) {
                $('.progress-bar').each(function () {
                    $(this).width($(this).attr('aria-valuenow') + '%');
                });
                $('.progress-item__percentage').each(function () {
                    $(this).text($(this).parent('.progress-bar').attr('aria-valuenow') + '%')
                });
            }
        });
    }

    /*==========   Increase and Decrease Input Value   ==========*/
    // Increase Value
    $('.increase-qty').on('click', function () {
        var $qty = $(this).parent().find('.qty-input');
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal)) {
            $qty.val(currentVal + 1);
        }
    });
    // Decrease Value
    $('.decrease-qty').on('click', function () {
        var $qty = $(this).parent().find('.qty-input');
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal) && currentVal > 1) {
            $qty.val(currentVal - 1);
        }
    });

    /*==========   Contact Form  Validation ==========*/
    var contactForm = $("#contactForm"),
        contactResult = $('.contact-result');
    contactForm.validate({
        debug: false,
        submitHandler: function (contactForm) {
            $(contactResult, contactForm).html('Please Wait...');
            $.ajax({
                type: "POST",
                url: "assets/php/contact.php",
                data: $(contactForm).serialize(),
                timeout: 20000,
                success: function (msg) {
                    $(contactResult, contactForm).html('<div class="alert alert-success" role="alert"><strong>Thank you. We will contact you shortly.</strong></div>').delay(3000).fadeOut(2000);
                },
                error: $('.thanks').show()
            });
            return false;
        }
    });

    /*==========   Load More Items  ==========*/
    function loadMore(loadMoreBtn, loadedItem) {
        $(loadMoreBtn).on('click', function (e) {
            e.preventDefault();
            $(this).fadeOut();
            $(loadedItem).fadeIn();
        })
    }

    loadMore('#loadMorePortfolio', '.portfolio-hidden > .portfolio-item');

    /*==========   Slick Carousel ==========*/
    $('.slick-carousel').slick();

    /*==========  Popup Video  ==========*/
    $('.popup-video').magnificPopup({
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
    $('.popup-gallery-item').magnificPopup({
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    });

    /*==========   counterUp  ==========*/
    $(".counter").counterUp({
        delay: 10,
        time: 4000
    });

    /*==========  NiceSelect Plugin  ==========*/
    $('select').niceSelect();

    /*==========   Range Slider  ==========*/
    var $rangeSlider = $("#rangeSlider"),
        $rangeSliderResult = $("#rangeSliderResult");
    $rangeSlider.slider({
        range: true,
        min: 0,
        max: 300,
        values: [50, 200],
        slide: function (event, ui) {
            $rangeSliderResult.val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $rangeSliderResult.val("$" + $rangeSlider.slider("values", 0) + " - $" + $rangeSlider.slider("values", 1));

    /*==========   Count Down Timer ==========*/
    $(".countdown").each(function () {
        var countingDate = $(this).data("count-date"),
            newDate = new Date(countingDate);
        $(this).countdown({
            until: newDate,
            format: "MMMM Do , h:mm:ss a"
        });
    });

    /*==========  AOS Animation Plugin  ==========*/
    AOS.init({ duration: 800, offset: 50 });

    /*==========  image zoomsl Plugin  ==========*/
    // [Zoom Effect on Hovering] Find it in shop-single-product.html
    $(".zoomin").imagezoomsl();

    /*  ==========  Portfolio Filtering and Sorting  ========== */
    var $portfolioFilter = $(".portfolio-filter"),
        portfolioLength = $portfolioFilter.length,
        filterButton = $portfolioFilter.find("a"),
        $gridWrapper = $("#grid-wrapper");

    filterButton.on("click", function (e) {
        e.preventDefault();
        $portfolioFilter.find("a.active").removeClass("active");
        $(this).addClass("active");
    });
    if (portfolioLength > 0) {
        $gridWrapper.imagesLoaded().progress(function () {
            $gridWrapper.isotope({
                filter: "*",
                animationOptions: {
                    duration: 750,
                    itemSelector: ".grid-item",
                    easing: "linear",
                    queue: false,
                }
            });
        });
    }
    filterButton.on("click", function (e) {
        e.preventDefault();
        var $selector = $(this).attr("data-filter");
        $gridWrapper.imagesLoaded().progress(function () {
            $gridWrapper.isotope({
                filter: $selector,
                animationOptions: {
                    duration: 750,
                    itemSelector: ".grid-item",
                    easing: "linear",
                    queue: false,
                }
            });
            return false;
        });
    });

});