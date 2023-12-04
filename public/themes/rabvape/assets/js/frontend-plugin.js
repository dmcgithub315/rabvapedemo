jQuery(document).ready(function ($) {
    "use strict";
    function herald_google_maps() {
        if ($('.herald-google-maps').length <= 0) {
            return;
        }
        $('.herald-google-maps').each(function () {
            var $this = $(this),
                $id = $this.attr('id'),
                $title_maps = $this.attr('data-title_maps'),
                $phone = $this.attr('data-phone'),
                $email = $this.attr('data-email'),
                $zoom = parseInt($this.attr('data-zoom'), 10),
                $latitude = $this.attr('data-latitude'),
                $longitude = $this.attr('data-longitude'),
                $address = $this.attr('data-address'),
                $map_type = $this.attr('data-map-type'),
                $pin_icon = $this.attr('data-pin-icon'),
                $modify_coloring = true,
                $saturation = $this.attr('data-saturation'),
                $hue = $this.attr('data-hue'),
                $map_style = $this.data('map-style'),
                $styles;

            if ($modify_coloring == true) {
                var $styles = [
                    {
                        stylers: [
                            {hue: $hue},
                            {invert_lightness: false},
                            {saturation: $saturation},
                            {lightness: 1},
                            {
                                featureType: "landscape.man_made",
                                stylers: [{
                                    visibility: "on"
                                }]
                            }
                        ]
                    }, {
                        "featureType": "all",
                        "elementType": "labels.text.fill",
                        "stylers": [{"saturation": 36}, {"color": "#000000"}, {"lightness": 40}]
                    }, {
                        "featureType": "all",
                        "elementType": "labels.text.stroke",
                        "stylers": [{"visibility": "on"}, {"color": "#000000"}, {"lightness": 16}]
                    }, {
                        "featureType": "all",
                        "elementType": "labels.icon",
                        "stylers": [{"visibility": "off"}]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#000000"}, {"lightness": 20}]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{"color": "#000000"}, {"lightness": 17}, {"weight": 1.2}]
                    }, {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{"color": "#000000"}, {"lightness": 20}]
                    }, {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{"color": "#000000"}, {"lightness": 21}]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#000000"}, {"lightness": 17}]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{"color": "#000000"}, {"lightness": 29}, {"weight": 0.2}]
                    }, {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{"color": "#000000"}, {"lightness": 18}]
                    }, {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{"color": "#000000"}, {"lightness": 16}]
                    }, {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{"color": "#000000"}, {"lightness": 19}]
                    }, {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{"color": "#000000"}, {"lightness": 17}]
                    }
                ];
            }
            var map;
            var bounds = new google.maps.LatLngBounds();
            var mapOptions = {
                zoom: $zoom,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                draggable: true,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId[$map_type],
                styles: $styles
            };

            map = new google.maps.Map(document.getElementById($id), mapOptions);
            map.setTilt(45);

            // Multiple Markers
            var markers = [];
            var infoWindowContent = [];

            if ($latitude != '' && $longitude != '') {
                markers[0] = [$address, $latitude, $longitude];
                infoWindowContent[0] = [$address];
            }

            var infoWindow = new google.maps.InfoWindow(), marker, i;

            for (i = 0; i < markers.length; i++) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: markers[i][0],
                    icon: $pin_icon
                });

                map.fitBounds(bounds);
            }

            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
                this.setZoom($zoom);
                google.maps.event.removeListener(boundsListener);
            });
        });
    }

    $(document).ready(function () {
        herald_google_maps();
    });
    function herald_init_menu_toggle() {
        var contain = '.herald-nav-toggle';
        $(contain).each(function () {
            var _main = $(this);
            _main.children('.menu-item.parent').each(function () {
                var curent = $(this).find('.submenu');

                $(this).children('.toggle-submenu').on('click', function () {
                    $(this).parent().children('.submenu').slideToggle(500);
                    _main.find('.submenu').not(curent).slideUp(500);

                    $(this).parent().toggleClass('show-submenu');
                    _main.find('.menu-item.parent').not($(this).parent()).removeClass('show-submenu');
                });

                var next_curent = $(this).find('.submenu');

                next_curent.children('.menu-item.parent').each(function () {

                    var child_curent = $(this).find('.submenu');
                    $(this).children('.toggle-submenu').on('click', function () {
                        $(this).parent().parent().find('.submenu').not(child_curent).slideUp(500);
                        $(this).parent().children('.submenu').slideToggle(500);

                        $(this).parent().parent().find('.menu-item.parent').not($(this).parent()).removeClass('show-submenu');
                        $(this).parent().toggleClass('show-submenu');
                    })
                });
            });
        });
    };
    // click menu
    $(document).on('click', '.bar-open-menu', function () {
        $(this).toggleClass('active');
        $(this).closest('.main-header').find('.header-nav').toggleClass('show-menu');
        return false;
    });
    // vertical-menu
    $(document).on('click', function(e) {
        var container = $(".block-nav-categori");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.removeClass('active');
            container.find('.verticalmenu-content').removeClass('show-up');
        }
    });
    $(document).on('click', '.block-title', function () {
        $(this).closest('.block-nav-categori').toggleClass('active');
        $(this).closest('.block-nav-categori').find('.verticalmenu-content').toggleClass('show-up');
        return false;
    });
    $(document).on('click', '.bar-open-menu,.vertical-menu-overlay', function () {
        $('body').toggleClass('vertical-menu-open');
        return false;
    })
    $(document).on('click', '.error-404 .toggle-hightlight', function () {
        $(this).closest('.text-404').find('.search-form').toggleClass('open');
        return false;
    });
    // ----------herald_custom_scrollbar-------------------
    function herald_custom_scrollbar() {
        $('.herald-mini-cart .minicart-items').mCustomScrollbar();
        $('.herald-mini-cart .minicart-items').change(function () {
            $('.herald-mini-cart .minicart-items').mCustomScrollbar();
        });
    }

    function herald_custom_scrollbar_header_nav() {
        $('.header.vertical-style .header-nav .container-wapper').mCustomScrollbar();
        $('.header.vertical-style .header-nav .container-wapper').change(function () {
            $('.header.vertical-style .header-nav .container-wapper').mCustomScrollbar();
        });
    }

    //------------------ Video Lightbox------------
    function herald_video() {
        $('.quick-install').simpleLightboxVideo();
    }

    // --------------------remove_class_equal--------------------------
    function herald_remove_class_review() {
        var _winw = $(window).innerWidth();
        if (_winw < 992) {
            $('.sevice-item.style-1').removeClass('equal-container').find('.equal-element').removeAttr('style');
        }
        else {
            $('.sevice-item.style-1').addClass('equal-container');
        }
    }

    // -----------herald_details_thumd--------------------
    // function herald_details_thumd_zoom() {
    //     /* ------------------------------------------------
    //      Arctic modal
    //      ------------------------------------------------ */
    //     if ($.arcticmodal) {
    //         $.arcticmodal('setDefault', {
    //             type: 'ajax',
    //             ajax: {
    //                 cache: false
    //             },
    //             afterOpen: function (obj) {
    //
    //                 var mw = $('.modal_window');
    //
    //                 mw.find('.custom_select').customSelect();
    //
    //                 mw.find('.product_preview .owl_carousel').owlCarousel({
    //                     margin: 10,
    //                     themeClass: 'thumbnails_carousel',
    //                     nav: true,
    //                     navText: [],
    //                     rtl: window.ISRTL ? true : false
    //                 });
    //
    //                 Core.events.productPreview();
    //
    //                 addthis.toolbox('.addthis_toolbox');
    //             }
    //         });
    //     }
    //     // ---------Popup sizechart---------------
    //     if ($('#size_chart').length > 0) {
    //         $('#size_chart').fancybox();
    //     }
    //
    //     if ($.fancybox) {
    //         $.fancybox.defaults.direction = {
    //             next: 'left',
    //             prev: 'right'
    //         }
    //     }
    //     /* ------------------------------------------------
    //      Fancybox
    //      ------------------------------------------------ */
    //     if ($('.fancybox_item').length) {
    //         $('.fancybox_item').fancybox({
    //             openEffect: 'elastic',
    //             closeEffect: 'elastic',
    //             helpers: {
    //                 overlay: {
    //                     css: {
    //                         'background': 'rgba(0,0,0, .6)'
    //                     }
    //                 },
    //                 thumbs: {
    //                     width: 50,
    //                     height: 50
    //                 }
    //             }
    //         });
    //     }
    //     if ($('.fancybox_item_media').length) {
    //         $('.fancybox_item_media').fancybox({
    //             openEffect: 'none',
    //             closeEffect: 'none',
    //             helpers: {
    //                 media: {}
    //             }
    //         });
    //     }
    //     /* ------------------------------------------------
    //      Elevate Zoom
    //      ------------------------------------------------ */
    //     if ($('#img_zoom').length) {
    //         $('#img_zoom').elevateZoom({
    //             zoomType: "inner",
    //             gallery: 'thumbnails',
    //             galleryActiveClass: 'active',
    //             cursor: "crosshair",
    //             responsive: true,
    //             easing: true,
    //             zoomWindowFadeIn: 500,
    //             zoomWindowFadeOut: 500,
    //             lensFadeIn: 500,
    //             lensFadeOut: 500
    //         });
    //         $(".open_qv").on("click", function (e) {
    //             var ez = $(this).siblings('img').data('elevateZoom');
    //             $.fancybox(ez.getGalleryList());
    //             e.preventDefault();
    //         });
    //     }
    // }

    // -------chosen----------------------------------------------------

    $(".chosen-select").chosen({disable_search_threshold: 10});
    // ====================isotop========================
    function herald_masonry() {
        var masonry = $('.masonry-grid').isotope({
            // set itemSelector so .grid-sizer is not used in layout
            itemSelector: '.grid-item',
            percentPosition: true,
            layoutMode: 'masonry',
            masonry: {
                // set to the element
                columnWidth: '.grid-sizer'
            }
        });
    }

    /* TOGGLE */
    function herald_dropdown() {
        $(document).on('click', '.header-control .close', function () {
            $(this).closest('.herald-dropdown').removeClass('open');
        });
        $(document).on('click', function (event) {
            var _target = $(event.target).closest('.herald-dropdown');
            var _allparent = $('.herald-dropdown');

            if (_target.length > 0) {
                _allparent.not(_target).removeClass('open');
                if (
                    $(event.target).is('[data-herald="herald-dropdown"]') ||
                    $(event.target).closest('[data-herald="herald-dropdown"]').length > 0
                ) {
                    _target.toggleClass('open');
                    return false;
                }
            } else {
                $('.herald-dropdown').removeClass('open');
            }
        });
    }

    function herald_mobile_block() {
        $(document).on('click', '.header-device-mobile .item.has-sub>a', function () {
            $(this).closest('.header-device-mobile').find('.item').removeClass('open');

            $(this).closest('.item').addClass('open');
            return false;
        })
        $(document).on('click', '.header-device-mobile .item .close', function () {
            $(this).closest('.item').removeClass('open');
            return false;
        })
        $(document).on('click', '*', function (event) {
            if (!$(event.target).closest(".header-device-mobile").length) {
                $(".header-device-mobile").find('.item').removeClass('open');
            }
        })
    }

    // =====================slick============================
    function herald_init_carousel() {
        $('.owl-slick').not('.slick-initialized').each(function () {
            var _this = $(this),
                _responsive = _this.data('responsive'),
                _config = [];

            if ($('body').hasClass('rtl')) {
                _config.rtl = true;
            }
            if (_this.hasClass('slick-vertical')) {
                _config.prevArrow = '<span class="pe-7s-angle-up"></span>';
                _config.nextArrow = '<span class="pe-7s-angle-down"></span>';
            } else {
                _config.prevArrow = '<span class="fa fa-angle-left"></span>';
                _config.nextArrow = '<span class="fa fa-angle-right"></span>';
            }
            _config.responsive = _responsive;
            _config.cssEase = 'linear';

            _this.slick(_config);
            _this.on('afterChange', function (event, slick, direction) {
                _this.find('.slick-active:first').addClass('first-slick');
                _this.find('.slick-active:last').addClass('last-slick');
            });
            _this.on('beforeChange', function (event, slick, currentSlide) {
                _this.find('.slick-slide').removeClass('last-slick');
                _this.find('.slick-slide').removeClass('first-slick');
            });
            if (_this.hasClass('slick-vertical')) {
                equal_elems();
                setTimeout(function () {
                    _this.slick('setPosition');
                }, 0);
            }
            _this.find('.slick-active:first').addClass('first-slick');
            _this.find('.slick-active:last').addClass('last-slick');
        });
    }

    /* ---------------------------------------------
     TAB EFFECT
     --------------------------------------------- */
    function herald_tab_fade_effect() {
        // effect click
        $(document).on('click', '.herald-tabs .tab-link a', function () {
            var tab_id = $(this).attr('href');
            var tab_animated = $(this).data('animate');

            tab_animated = ( tab_animated == undefined || tab_animated == "" ) ? '' : tab_animated;
            if (tab_animated == "") {
                return false;
            }

            $(tab_id).find('.product-list-owl .owl-item.active, .product-list-grid .product-item').each(function (i) {

                var t = $(this);
                var style = $(this).attr("style");
                style = ( style == undefined ) ? '' : style;
                var delay = i * 400;
                t.attr("style", style +
                    ";-webkit-animation-delay:" + delay + "ms;"
                    + "-moz-animation-delay:" + delay + "ms;"
                    + "-o-animation-delay:" + delay + "ms;"
                    + "animation-delay:" + delay + "ms;"
                ).addClass(tab_animated + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                    t.removeClass(tab_animated + ' animated');
                    t.attr("style", style);
                });
            })
        })
    }

    // -------------------------newletter-----------------------------
    function newletter_popup() {
        var window_size = parseFloat(jQuery('body').innerWidth());
        window_size += kt_get_scrollbar_width();
        if (window_size > 991) {
            if ($('body').hasClass('home-newletter')) {
                var _content = $('.kt-popup-newsletter');
                $.magnificPopup.open({
                    items: {
                        src: _content,
                        type: 'inline'
                    }
                });
            }
        }
    }

    // ------------------------Quick view----------------------------------------




    // --------------------------------BACK TO TOP-----------------------------
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 1000) {
            $('.backtotop').addClass('show');
        }
        else {
            $('.backtotop').removeClass('show');
        }
    });
    $(document).on('click', 'a.backtotop', function () {
        $('html, body').animate({scrollTop: 0}, 800);
    });


//------------------------EQUAL ELEM----------------------------
    function better_equal_elems() {
        setTimeout(function () {
            $('.equal-container').each(function () {
                var $this = $(this);
                if ($this.find('.equal-element').length) {
                    $this.find('.equal-element').css({
                        'height': 'auto'
                    });
                    var elem_height = 0;
                    $this.find('.equal-element').each(function () {
                        var this_elem_h = $(this).height();
                        if (elem_height < this_elem_h) {
                            elem_height = this_elem_h;
                        }
                    });
                    $this.find('.equal-element').height(elem_height);
                }
            });
        }, 1000);
    }

    $(window).load(function () {
        better_equal_elems();
    });
    $(window).on("resize", function () {
        better_equal_elems();
    });
// ------------------owl-thumbs-----------------------------------------------
    init_carousel();
    function init_carousel() {
        //owl has thumbs 
        $('.owl-carousel.has-thumbs').owlCarousel({
            loop: true,
            items: 1,
            thumbs: true,
            thumbImage: true,
            thumbContainerClass: 'owl-thumbs',
            thumbItemClass: 'owl-thumb-item'
        });
        // owl config
        $(".owl-carousel").each(function (index, el) {
            var config = $(this).data();
            config.navText = ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'];
            var animateOut = $(this).data('animateout');
            var animateIn = $(this).data('animatein');
            var slidespeed = parseFloat($(this).data('slidespeed'));

            if (typeof animateOut != 'undefined') {
                config.animateOut = animateOut;
            }
            if (typeof animateIn != 'undefined') {
                config.animateIn = animateIn;
            }
            if (typeof (slidespeed) != 'undefined') {
                config.smartSpeed = slidespeed;
            }

            if ($('body').hasClass('rtl')) {
                config.rtl = true;
            }

            var owl = $(this);
            owl.on('initialized.owl.carousel', function (event) {
                var total_active = parseInt(owl.find('.owl-item.active').length);
                var i = 0;
                owl.find('.owl-item').removeClass('item-first item-last');
                setTimeout(function () {
                    owl.find('.owl-item.active').each(function () {
                        i++;
                        if (i == 1) {
                            $(this).addClass('item-first');
                        }
                        if (i == total_active) {
                            $(this).addClass('item-last');
                        }
                    });

                }, 100);
            })
            owl.on('refreshed.owl.carousel', function (event) {
                var total_active = parseInt(owl.find('.owl-item.active').length);
                var i = 0;
                owl.find('.owl-item').removeClass('item-first item-last');
                setTimeout(function () {
                    owl.find('.owl-item.active').each(function () {
                        i++;
                        if (i == 1) {
                            $(this).addClass('item-first');
                        }
                        if (i == total_active) {
                            $(this).addClass('item-last');
                        }
                    });

                }, 100);
            })
            owl.on('change.owl.carousel', function (event) {
                var total_active = parseInt(owl.find('.owl-item.active').length);
                var i = 0;
                owl.find('.owl-item').removeClass('item-first item-last');
                setTimeout(function () {
                    owl.find('.owl-item.active').each(function () {
                        i++;
                        if (i == 1) {
                            $(this).addClass('item-first');
                        }
                        if (i == total_active) {
                            $(this).addClass('item-last');
                        }
                    });

                }, 100);
                owl.addClass('owl-changed');
                setTimeout(function () {
                    owl.removeClass('owl-changed');
                }, config.smartSpeed)
            })
            owl.on('drag.owl.carousel', function (event) {
                owl.addClass('owl-changed');
                setTimeout(function () {
                    owl.removeClass('owl-changed');
                }, config.smartSpeed)
            })
            owl.owlCarousel(config);
            // Sections backgrounds
            if ($(window).width() < 992) {
                var itembackground = $(".item-background");
                itembackground.each(function (index) {
                    if ($('.item-background').attr("data-background")) {
                        $(this).css("background-image", "url(" + $(this).data("background") + ")");
                        $(this).css("height", $(this).closest('.owl-carousel').data("height") + 'px');
                        $('.slide-img').css("display", 'none');
                    }
                });
            }
        });
    }

    // ------------------------------------owl-index--------------------------------------
    $('.owl-index').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:false,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            481:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });
    $('.owl-instagram').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:false,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:2
            },
            481:{
                items:3
            },
            992:{
                items:4
            },
            1200:{
                items:5
            },
            2000:{
                items:6
            },
        }
    })
    $('.owl-blogs').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:false,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            481:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    })
    $('.owl-list-item').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:false,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            481:{
                items:2
            },
            1200:{
                items:3
            }
        }
    })

    // -----------------------------mega-menu------------------
    kt_resizeMegamenu();
    function kt_resizeMegamenu() {
        var window_size = parseFloat(jQuery('body').innerWidth());
        window_size += kt_get_scrollbar_width();
        if (window_size > 990) {
            if ($('.container-wapper .main-menu').length > 0) {
                var container = $('.main-menu-wapper');
                if (container != 'undefined') {
                    var container_width = 0;
                    container_width = parseFloat(container.innerWidth());
                    var container_offset = 0;
                    container_offset = container.offset();
                    setTimeout(function () {
                        $('.main-menu .menu-item-has-children').each(function (index, element) {
                            $(element).children('.mega-menu').css({'width': container_width + 'px'});
                            var sub_menu_width = parseFloat($(element).children('.mega-menu').outerWidth());
                            var item_width = parseFloat($(element).outerWidth());
                            $(element).children('.mega-menu').css({'left': '-' + (sub_menu_width / 2 - item_width / 2) + 'px'});
                            var container_left = container_offset.left;
                            var container_right = (container_left + container_width);
                            var item_left = $(element).offset().left;
                            var overflow_left = (sub_menu_width / 2 > (item_left - container_left));
                            var overflow_right = ((sub_menu_width / 2 + item_left) > container_right);
                            if (overflow_left) {
                                var left = (item_left - container_left);
                                $(element).children('.mega-menu').css({'left': -left + 'px'});
                            }
                            if (overflow_right && !overflow_left) {
                                var left = (item_left - container_left);
                                left = left - ( container_width - sub_menu_width );
                                $(element).children('.mega-menu').css({'left': -left + 'px'});
                            }
                        })
                    }, 100);
                }
            }
        }
    }

    // -----------------count down years months -------------------------------
    function herald_countdown() {
        if ($('.herald-countdown').length > 0) {
            var labels = ['Years', 'Months', 'Weeks', 'Days', 'Hrs', 'Mins', 'Secs'];
            var layout = '<span class="box-count day"><span class="number">{dnn}</span> <span class="text">Days</span></span><span class="box-count hrs"><span class="number">{hnn}</span> <span class="text">Hrs</span></span><span class="box-count min"><span class="number">{mnn}</span> <span class="text">Mins</span></span><span class="box-count secs"><span class="number">{snn}</span> <span class="text">Secs</span></span>';
            $('.herald-countdown').each(function () {
                var austDay = new Date($(this).data('y'), $(this).data('m') - 1, $(this).data('d'), $(this).data('h'), $(this).data('i'), $(this).data('s'));
                $(this).countdown({
                    until: austDay,
                    labels: labels,
                    layout: layout
                });
            });
        }
    };
    // --------------------------------------------------------
    $(window).scroll(function () {
        herald_custom_scrollbar();
    });
    $(window).resize(function () {
        quickview_popup();
        herald_masonry()
        kt_resizeMegamenu();
        herald_remove_class_review();
        // herald_details_thumd_zoom();
        herald_custom_scrollbar();
    });
    $(window).load(function () {
        newletter_popup();
        quickview_popup();
        herald_mobile_block();
        herald_remove_class_review();
        herald_custom_scrollbar()
    });
    herald_masonry()
    herald_dropdown();
    herald_init_carousel();
    herald_remove_class_review();
    herald_tab_fade_effect();
    // herald_details_thumd_zoom();
    herald_video();
    kt_resizeMegamenu();
    herald_custom_scrollbar();
    herald_countdown();
    herald_init_menu_toggle();
    herald_custom_scrollbar_header_nav();
}); 