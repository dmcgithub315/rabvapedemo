<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - RabVapeStore</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nâng cao trải nghiệm vaping cùng RabVape.">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/themes/rabvape/assets/images/rabvape.png">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/animate.min.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/slick.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/chosen.min.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/lightbox.min.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/js/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/jquery.scrollbar.min.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/mobile-menu.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/themes/rabvape/assets/css/style.css">
    @yield('style')
</head>
<body class="home">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0&appId=255099980359054&autoLogAppEvents=1" nonce="9FEgH2HX"></script>
@include('layout.header')
@yield('content')
@include('layout.footer')

<a href="#" class="backtotop">
    <i class="fa fa-chevron-up"></i>
</a>
<script src="/themes/rabvape/assets/js/jquery-1.12.4.min.js"></script>
<script src="/themes/rabvape/assets/js/jquery.plugin-countdown.min.js"></script>
<script src="/themes/rabvape/assets/js/jquery-countdown.min.js"></script>
<script src="/themes/rabvape/assets/js/bootstrap.min.js"></script>
<script src="/themes/rabvape/assets/js/owl.carousel.min.js"></script>
<script src="/themes/rabvape/assets/js/magnific-popup.min.js"></script>
<script src="/themes/rabvape/assets/js/isotope.min.js"></script>
<script src="/themes/rabvape/assets/js/jquery.scrollbar.min.js"></script>
<script src="/themes/rabvape/assets/js/jquery-ui.min.js"></script>
<script src="/themes/rabvape/assets/js/mobile-menu.js"></script>
<script src="/themes/rabvape/assets/js/chosen.min.js"></script>
<script src="/themes/rabvape/assets/js/slick.js"></script>
<script src="/themes/rabvape/assets/js/jquery.elevateZoom.min.js"></script>
<script src="/themes/rabvape/assets/js/jquery.actual.min.js"></script>
<script src="/themes/rabvape/assets/js/fancybox/source/jquery.fancybox.js"></script>
<script src="/themes/rabvape/assets/js/lightbox.min.js"></script>
<script src="/themes/rabvape/assets/js/owl.thumbs.min.js"></script>
<script src="/themes/rabvape/assets/js/jquery.scrollbar.min.js"></script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>
<script src="/themes/rabvape/assets/js/frontend-plugin.js"></script>
<script>
    $(document).ready(function() {
        // Lấy chiều rộng của class .post-item
        var width = $('.post-item').width();
        // Đặt giá trị vào thuộc tính data-width của phần tử .fb-comments
        $('.fb-comments').attr('data-width', width);
    });
    $('.newsletter-form-wrap br').remove();

    jQuery(document).ready(function($) {
        var cartInfo = '';
        $('#cart-info p').each(function() {
            var text = $(this).text();
            cartInfo += text + '\n';
        });
        $('.your-bill-input').val(cartInfo);
    });


    $('.button-payment').click(function() {
        // Kiểm tra xem tất cả các input có class wpcf7-validates-as-required đã được điền hết
        var isFormValid = true;
        $('.shipping-address-form-wrapp input.wpcf7-validates-as-required').each(function() {
            if ($.trim($(this).val()) == '') {
                isFormValid = false;
                return false; // Thoát khỏi vòng lặp each nếu phát hiện input chưa điền
            }
        });
        // Nếu tất cả các input đều đã được điền hết, thực hiện thay đổi class
        if (!isFormValid) {
            $('.checkout-message').empty();
            $('.checkout-message').append('Vui lòng điền đầy đủ thông tin!');
        }
        if (isFormValid) {
            $('.shipping-address-form-wrapp').addClass('d-none');
            $('.payment-method-wrapp').removeClass('d-none').addClass('active');

        }
    });
    $('.btn-back-to-shipping').on('click', function() {
        $('.shipping-address-form-wrapp').removeClass('d-none').addClass('active');
        $('.payment-method-wrapp').removeClass('active').addClass('d-none');
    });
    $('.btn-pay-now').on('click', function() {
        // jQuery.ajax({
        //     type: "post",
        //     dataType: "text",
        //     url: "/wp-admin/admin-ajax.php",
        //     data: {
        //         action: 'delete_session',
        //     },
        //     success: function(result){
        //         if (result.success) {
        //             statsCart();
        //             console.log('success');
        //         } else {
        //             console.log('Đã có lỗi xảy ra');
        //         }
        //     }
        // });
        $('#wpcf7-f149-o1').submit();
        $('.end-checkout-wrapp').addClass('active').removeClass('d-none');
        $('.payment-method-wrapp').addClass('d-none').removeClass('active');
    });
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for(let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    // Lấy tất cả các phần tử radio
    const paymentMethodRadios = document.querySelectorAll('input[name="payment_method_id"]');

    // Lặp qua các phần tử radio và thêm xử lý sự kiện cho mỗi phần tử
    paymentMethodRadios.forEach(radio => {
        // Thêm xử lý sự kiện click cho phần tử radio
        radio.addEventListener('click', event => {
            // Lấy phần tử cha của phần tử radio đang được chọn
            const parentBox = event.target.closest('.content-box');

            // Lấy tất cả các phần tử content-box-row-secondary trong phần tử cha
            const secondaryRows = parentBox.querySelectorAll('.content-box-row-secondary');

            // Lặp qua các phần tử content-box-row-secondary và ẩn/hiển thị tương ứng
            secondaryRows.forEach(row => {
                // Nếu phần tử radio được chọn có thuộc tính checked và giá trị value khác với giá trị của phần tử radio hiện tại, ẩn phần tử content-box-row-secondary tương ứng
                if (event.target.checked && event.target.value !== row.getAttribute('for').replace('payment_method_id_', '')) {
                    row.classList.add('hidden');
                }
                // Nếu phần tử radio được chọn không có thuộc tính checked hoặc có giá trị value bằng với giá trị của phần tử radio hiện tại, hiển thị phần tử content-box-row-secondary tương ứng
                else {
                    row.classList.remove('hidden');
                }
            });
        });
    });

    function nicotineSubmitForm() {
        document.getElementById("nicotine-strength-form").submit();
    }
    function capacitySubmitForm() {
        document.getElementById("bottle-size-form").submit();
    }
    function juiceBrandSubmitForm() {
        document.getElementById("juice-brand-form").submit();
    }
    function confirmDelete(){
        if(confirm("Bạn có muốn xóa sản phẩm này ?"))
            return true;

        return false;
    }
    statsCart();
    function statsCart() {
        // jQuery.ajax({
        //     type: "post",
        //     dataType: "json",
        //     url: "/wp-admin/admin-ajax.php",
        //     data: {
        //         action: 'stats_cart',
        //     },
        //     success: function(result){
        //         if (result.success) {
        //             if (result.cart.length) {
        //                 $('#cart-content').show();
        //                 $('#cart-alert').hide();
        //                 $("#mini-cart-header").empty();
        //                 $(".quick-cart-list").empty();
        //                 $(".shopping-cart-body").empty();
        //                 let offcanvasHtml = '';
        //                 let minicartHtml = '';
        //                 let nicotine = '';
        //                 let capacity = '';
        //                 let color = '';
        //                 $.each(result.cart, function (index, cart_item) {
        //                     if(!cart_item['nicotine']) {
        //                         nicotine = '';
        //                     } else {
        //                         nicotine = cart_item['nicotine'] + 'mg ';
        //                     }
        //                     if(!cart_item['color']) {
        //                         color = '';
        //                     } else {
        //                         color = cart_item['color'];
        //                     }
        //                     if(!cart_item['capacity']) {
        //                         capacity = '';
        //                     } else {
        //                         capacity = cart_item['capacity'] + 'ml';
        //                     }
        //                     offcanvasHtml += '<li><div class="quick-cart-item"> <a href="javascript:void(0);" onclick="deleteItemCart('+"'"+cart_item['cart_key']+"'"+');" class="remove remove-quick-cart">x</a> <div> <a href="'+ cart_item['url'] +'"> <img src="'+ cart_item['thumb'] +'" alt="" class="quick-cart-img"></a></div><div class="quick-cart-title"> <a href="'+ cart_item['link'] +'">'+ cart_item['title'] +'</a> <div> <span>'+ color + nicotine + '</span> <span>'+ capacity +'</span> </div> <p>'+ cart_item['quantity'] +' x '+ cart_item["price"] +'₫</p> </div> </div> <hr> </li>';
        //
        //                     minicartHtml += '<li class="product-cart mini_cart_item"><a href="'+cart_item['url']+'" class="product-media"><img src="'+cart_item['thumb']+'" alt="img"> </a> <div class="product-details"> <h5 class="product-name"><a href="'+cart_item['url']+'">'+cart_item['title']+'</a></h5> <div class="variations"> <span class="attributes-select attributes-color">'+ color + nicotine + '</span><span class="attributes-select attributes-size">'+ capacity +'</span><br> </div><span class="product-price"><span class="price"><span><strong>'+ cart_item['price'] +'</strong> ₫</span></span> </span><span class="product-quantity">X'+ cart_item['quantity'] +'</span> <div class="product-remove"> <a href="'+cart_item['link']+'/?remove='+cart_item['cart_key']+'" onclick="confirmDelete();"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </div></div> </li>';
        //                 })
        //
        //                 offcanvasHtml += '<p class="text-center">Tổng tiền: <strong>'+ result.totalPrice+'₫</strong></p>';
        //
        //                 $( ".quick-cart-list" ).append( offcanvasHtml );
        //                 let minicartWrapper = '<ul class="minicart-items" style="list-style-type: none!important;"></ul><div class="subtotal"><span class="total-title">Tổng: </span><span class="total-price"><span class="Price-amount">'+result.totalPrice+'₫</span></span></div>';
        //                 $('#mini-cart-header').append(minicartWrapper);
        //                 $( ".minicart-items" ).append( minicartHtml );
        //                 let shoppingCartHtml = '';
        //                 $.each(result.cart, function (index, cart_item) {
        //                     let nicotine_wrap = '';
        //                     if (cart_item['nicotine_select']) {
        //                         nicotine_wrap = '<select class="wrap_select select-nicotine" data-key='+cart_item['cart_key']+'>';
        //                         $.each(cart_item['nicotine_select'], function (index, mg) {
        //                             if (mg  === cart_item['nicotine']) {
        //                                 nicotine_wrap += '<option value="' + mg + '" selected>' + mg + 'mg</option>';
        //                             } else {
        //                                 nicotine_wrap += '<option value="' + mg + '">' + mg + 'mg</option>';
        //                             }
        //                         });
        //                         nicotine_wrap += '</select>';
        //                     }
        //                     let capacity_wrap = '';
        //                     if (cart_item['capacity_select']) {
        //                         capacity_wrap = '<select class="wrap_select select-capacity" data-key='+cart_item['cart_key']+'>';
        //                         $.each(cart_item['capacity_select'], function (index, ml) {
        //                             if (ml == cart_item['capacity']) {
        //                                 capacity_wrap += '<option value="' + ml + '" selected>' + ml + 'ml</option>';
        //                             } else {
        //                                 capacity_wrap += '<option value="' + ml + '">' + ml + 'ml</option>';
        //                             }
        //                         });
        //                         capacity_wrap += '</select>';
        //                     }
        //                     let colors_wrap = '';
        //                     if (cart_item['color_select']) {
        //                         colors_wrap = '<select class="wrap_select select-color" data-key='+cart_item['cart_key']+'>';
        //                         $.each(cart_item['color_select'], function (index, color) {
        //                             if (color.color_name == cart_item['color']) {
        //                                 colors_wrap += '<option value="' + color.color_name + '" selected>' + color.color_name + '</option>' ;
        //                             } else {
        //                                 colors_wrap += '<option value="' + color.color_name + '">' + color.color_name + '</option>' ;
        //                             }
        //                         });
        //                         colors_wrap += '</select>';
        //                     }
        //                     shoppingCartHtml += '<tr class="cart_item"> <td class="product-remove"> <a href="'+cart_item['link']+'/?remove='+cart_item['cart_key']+'" onclick="confirmDelete();" class="remove"></a> </td> <td class="product-thumbnail"> <a href="'+cart_item['url']+'"> <img src="'+cart_item['thumb']+'" alt="img"class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"> </a> </td> <td class="product-name" data-title="Product"> <a href="'+cart_item['url']+'" class="title">'+cart_item['title']+'</a><span class="attributes-select attributes-color">'+ colors_wrap + nicotine_wrap  + '</span> <span class="attributes-select attributes-color">'+ capacity_wrap + '</span><br><span class="attributes-select attributes-size" style=""><strong>'+cart_item['price']+'</strong> ₫ </span></td> <td class="product-quantity" data-title="Quantity"> <div class="quantity"> <div class="control"> <a class="btn-number qtyminus quantity-minus" href="#">-</a><input type="text" data-step="1" data-min="0" data-key="'+cart_item['cart_key']+'" value="'+cart_item['quantity']+'" title="Qty" class="input-qty qty" size="4"><a href="#" class="btn-number qtyplus quantity-plus">+</a></div></div></td><td class="product-price" data-title="Price"><span class="woocommerce-Price-amount amount">'+cart_item['total_price']+' ₫</span></td></tr>';
        //                 });
        //                 shoppingCartHtml += '<tr><td class="actions"> <div class="order-total"><span class="title">Tổng tiền: </span><span class="total-price">'+result.totalPrice+' ₫</span></div></td></tr>'
        //                 $( ".shopping-cart-body" ).append( shoppingCartHtml );
        //
        //             } else {
        //                 $('#cart-content').hide();
        //                 $('#cart-alert').show();
        //             }
        //             $('#cart-count').html(result.count);
        //             $('#cart-count-mobile').html(result.count);
        //         } else {
        //
        //         }
        //     }
        // });
    }
    function quickAddToCart (item_id) {
        // jQuery.ajax({
        //     type: "post",
        //     dataType: "json",
        //     url: "/wp-admin/admin-ajax.php",
        //     data: {
        //         action: 'add_shopping_cart',
        //         id: item_id,
        //     },
        //     success: function(result){
        //         if (result.success) {
        //             statsCart();
        //         } else {
        //             console.log('Đã có lỗi xảy ra');
        //         }
        //     }
        // });
        return false;
    }
    function deleteItemCart(key) {
        // jQuery.ajax({
        //     type: "post",
        //     dataType: "json",
        //     url: "/wp-admin/admin-ajax.php",
        //     data: {
        //         action: 'delete_shopping_cart',
        //         key: key,
        //     },
        //     success: function(result){
        //         if (result.success) {
        //             statsCart();
        //         } else {
        //             console.log('Đã có lỗi xảy ra');
        //         }
        //     }
        // });
        return false;
    }
    $(document).on('change', '.wrap_select', function() {
        // Lấy giá trị đã chọn trong select
        let selectedValue = $(this).val();

        // Chia selectedValue ra nicotine, capacity và color
        let nicotine = $(this).hasClass('select-nicotine') ? selectedValue : $(this).closest('.cart_item').find('.select-nicotine').val();
        let capacity = $(this).hasClass('select-capacity') ? selectedValue : $(this).closest('.cart_item').find('.select-capacity').val();
        let color = $(this).hasClass('select-color') ? selectedValue : $(this).closest('.cart_item').find('.select-color').val();

        // Lấy thông tin cart_key
        let cart_key = $(this).data('key');

        // Gọi Ajax để cập nhật giỏ hàng
        // $.ajax({
        //     type: "post",
        //     dataType: "json",
        //     url: "/wp-admin/admin-ajax.php",
        //     data: {
        //         action: 'update_select_cart',
        //         key: cart_key,
        //         nicotine: nicotine,
        //         capacity: capacity,
        //         color: color
        //     },
        //     success: function(result){
        //         if (result.success) {
        //             statsCart();
        //         } else {
        //             console.log('Đã có lỗi xảy ra');
        //         }
        //     }
        // });
    });
    //----------------Woocommerce plus and minus-------------------------
    $(document).on('click', '.quantity .quantity-plus, .quantity .quantity-minus', function (e) {
        // Get values
        var $qty = $(this).closest('.quantity').find('.qty'),
            currentVal = parseFloat($qty.val()),
            max = parseFloat($qty.attr('max')),
            min = parseFloat($qty.attr('min')),
            step = $qty.attr('step');
        // Format values
        if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
        if (max === '' || max === 'NaN') max = 15;
        if (min === '' || min === 'NaN') min = 0;
        if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;
        // Change the value
        if ($(this).is('.quantity-plus')) {
            if (max && ( max == currentVal || currentVal > max )) {
                $qty.val(max);
            } else if (currentVal < 15) {
                $qty.val(currentVal + parseFloat(step));
                currentVal += 1;
            }
        } else {
            if (min && ( min == currentVal || currentVal < min )) {
                $qty.val(min);
            } else if (currentVal > 0) {
                $qty.val(currentVal - parseFloat(step));
                currentVal -= 1;
            }
        }
        let key = $(this).siblings('.qty').attr('data-key');
        // jQuery.ajax({
        //     type: "post",
        //     dataType: "json",
        //     url: "/wp-admin/admin-ajax.php",
        //     data: {
        //         action: 'update_shopping_cart',
        //         key: key,
        //         quantity: currentVal,
        //     },
        //     success: function(result){
        //         if (result.success) {
        //             statsCart();
        //         } else {
        //             console.log('Đã có lỗi xảy ra');
        //         }
        //     }
        // });
        return false;
        // Trigger change event
        $qty.trigger('change');
        e.preventDefault();
    });

    function quickview_popup() {
        var window_size = parseFloat(jQuery('body').innerWidth());
        window_size += kt_get_scrollbar_width();
        if (window_size > 992) {
            $(document).on('click', '.quick-wiew-button', function () {
                let product_id = $(this).data('id');
                // jQuery.ajax({
                //     type: "post",
                //     dataType: "json",
                //     url: "/wp-admin/admin-ajax.php",
                //     data: {
                //         action:'quick_view',
                //         id: product_id,
                //     },
                //     success: function(result){
                //         if (result.success) {
                //             let image_wrap = '';
                //             let nicotine_wrap = '';
                //             let capacity_wrap = '';
                //             if (result.field.album) {
                //                 $.each(result.field.album, function (index, image_url) {
                //                     image_wrap += '<div class="details-item"><img src="'+image_url+'" alt="img"></div>';
                //                 })
                //             }
                //             if (result.field.nicotine) {
                //                 $.each(result.field.nicotine, function (index,  mg) {
                //                     nicotine_wrap += '<option value="'+mg+'">'+mg+'mg</option>';
                //                 })
                //             }
                //             if (result.field.capacity) {
                //                 $.each(result.field.capacity, function (index,  ml) {
                //                     capacity_wrap += '<option value="'+ml+'">'+ml+'ml</option>';
                //                 })
                //             }
                //             $.magnificPopup.open({
                //                 items: {
                //                     src: '<div class="kt-popup-quickview "><div class="details-thumb"><div class="slider-product slider-for">'+image_wrap+'</div><div class="slider-product-button slider-nav nav-center">'+image_wrap+'</div></div><div class="details-infor"><h1 class="product-title">'+result.product.title+'</h1><div class="availability">Tình trạng:<a href="'+result.product.url+'">'+result.field.status+'</a></div><div class="price"><span>'+result.field.price+'</span></div><div class="product-details-description">'+result.field.description_top+'</div><form action="'+result.link+'" method="post"><div class="variations"><div id="nicotine_select" class="attribute attribute_color"> <div class="size-text text-attribute">Nồng độ nicotine: </div> <div class="list-size list-item"> <select name="nicotine" title="size">'+nicotine_wrap+' </select> </div> </div><div id="capacity_select" class="attribute attribute_size"><div class="size-text text-attribute">Kích thước:</div><div class="list-size list-item"><select name="capacity" title="size">'+capacity_wrap+' </select></div> </div> </div><div class="group-button"><div class="quantity-add-to-cart"><div class="quantity"><div class="control"><a class="btn-number qtyminus quantity-minus" href="#">-</a><input type="text" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4"><a href="#" class="btn-number qtyplus quantity-plus">+</a></div></div><button class="single_add_to_cart_button button">Thêm vào giỏ hàng</button><input type="text" class="hidden" name="id" value="'+product_id+'"></div></div></form></div></div>',
                //                     type: 'inline'
                //                 }
                //             })
                //             if (!result.field.nicotine) {
                //                 $("#nicotine_select").addClass("d-none");
                //             }
                //             if (!result.field.capacity) {
                //                 $("#capacity_select").addClass("d-none");
                //             };
                //             slick_quickview_popup();
                //         }
                //     }
                // });
                return false;
            });
        }
    }
    function kt_get_scrollbar_width() {
        var $inner = jQuery('<div style="width: 100%; height:200px;">test</div>'),
            $outer = jQuery('<div style="width:200px;height:150px; position: absolute; top: 0; left: 0; visibility: hidden; overflow:hidden;"></div>').append($inner),
            inner = $inner[0],
            outer = $outer[0];
        jQuery('body').append(outer);
        var width1 = parseFloat(inner.offsetWidth);
        $outer.css('overflow', 'scroll');
        var width2 = parseFloat(outer.clientWidth);
        $outer.remove();
        return (width1 - width2);
    }

    function slick_quickview_popup() {
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            focusOnSelect: true,
            infinite: true,
            prevArrow: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            nextArrow: '<i class="fa fa-angle-right " aria-hidden="true"></i>',
        });
    }
    //---------------------------Price filter----------------------
    $('.slider-range-price').each(function () {
        var min = $(this).data('min');
        var max = $(this).data('max');
        var unit = $(this).data('unit');
        var value_min = $(this).data('value-min');
        var value_max = $(this).data('value-max');
        var label_result = $(this).data('label-result');
        var t = $(this);
        $(this).slider({
            range: true,
            min: min,
            max: max,
            values: [value_min, value_max],
            slide: function (event, ui) {
                var result = ' <span>' + unit + ui.values[0] + ' </span>  <span> ' + unit + ui.values[1] + '</span>';
                // var result = label_result + " <span>" + unit + ui.values[0] + ' </span>  <span> ' + unit + ui.values[1] + '</span>';
                t.closest('.price-slider-wrapper').find('.price-slider-amount').html(result);
            }
        });
    });
</script>
<script>
    $('.off-canvas-toggle').on('click', function(event) {
        event.preventDefault();
        $('body').toggleClass('off-canvas-active');
    });

    $(document).on('mouseup touchend', function(event) {
        var offCanvas = $('.off-canvas')
        if (!offCanvas.is(event.target) && offCanvas.has(event.target).length === 0) {
            $('body').removeClass('off-canvas-active')
        }
    });
    document.addEventListener('wpcf7mailsent', function(event) {
        if (event.detail.contactFormId === 149) {
            let items = document.querySelectorAll('#item-title');
            let prices = document.querySelectorAll('#item-price');
            let notes = document.querySelectorAll('#item-note');
            let quantities = document.querySelectorAll('#item-quantity');
            let totalPrice = document.querySelector('#total-price').textContent;
            let data = [];
            for (let i = 0; i < items.length; i++) {
                let item = {
                    title: items[i].textContent,
                    price: prices[i].textContent,
                    note: notes[i].textContent,
                    quantity: quantities[i].textContent
                };
                data.push(item);
            }

            let billName = document.querySelector('input[name="your-name"]').value;
            let billPhone = document.querySelector('input[name="your-phone"]').value;
            let billEmail = document.querySelector('input[name="your-email"]').value;
            let billAddress = document.querySelector('input[name="your-address"]').value;
            let billNote = document.querySelector('textarea[name="your-note"]').value;
            let bill = {
                name: billName,
                phone : billPhone,
                email: billEmail,
                address: billAddress,
                note: billNote
            }
            // $.ajax({
            //     type: "post",
            //     dataType: "json",
            //     url: "/wp-admin/admin-ajax.php",
            //     data: {
            //         action: 'insert_order',
            //         bill: bill,
            //         data: data,
            //         totalPrice: totalPrice,
            //     },
            //     success: function(result){
            //         if (result.success) {
            //             statsCart();
            //         } else {
            //             console.log('Đã có lỗi xảy ra');
            //         }
            //     }
            // });
            console.log(data);
            console.log(bill);
            location.href = '/ordered';
        }
    });
</script>
@yield('script')
</body>
</html>
