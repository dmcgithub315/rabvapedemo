@extends('layout.main')
@section('title', 'Sản Phẩm')
@section('style')
@endsection
@section('content')
{{--    {{var_dump($terms)}}--}}
    <div class="main-content main-content-product left-sidebar">
        <div class="off-canvas-overlay"></div>

        <div class="off-canvas">
            <h3>GIỎ HÀNG</h3>
            <div id="cart-alert">
                <p style="margin-left: 10px;">Chưa có sản phẩm nào trong giỏ hàng!</p>
            </div>
            <div id="cart-content" style="display: none;">
                <ul class="quick-cart-list">
                </ul>
                <hr>
                <div class="text-center">
                    <a href="/cart" class="quick-cart-btn button">XEM GIỎ HÀNG</a>
                    <a href="/checkout" class="quick-cart-btn button">THANH TOÁN</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
{{--                                <a href="{{route('home')}}">Home</a>--}}
                            </li>
                            <li class="trail-item trail-end active">
                                Sản Phẩm
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area shop-grid-content no-banner col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <h3 class="custom_blog_title">
                            Sản Phẩm
                        </h3>
                        <div class="shop-top-control">
                            <div class="select-item select-form">
                                <span class="title">Hiển thị</span>
                                <select title="sort" data-placeholder="12 Sản phẩm/Trang" class="chosen-select post_per_page_select">
                                    <option value="12">12 Sản phẩm/Trang</option>
                                    <option value="9">9 Sản phẩm/Trang</option>
                                    <option value="6">6 Sản phẩm/Trang</option>
                                    <option value="3">3 Sản phẩm/Trang</option>
                                </select>
                            </div>
                            <div class="filter-choice select-form">
                                <span class="title">Sắp xếp</span>
                                <select name="sort" title="sort-by" data-placeholder="Price: Low to High" class="chosen-select sort_by_select">
                                    <option value="default">Sắp xếp bởi</option>
                                    <option value="price-low">Giá thấp đến cao</option>
                                    <option value="price-high">Giá cao đến thấp</option>
                                    <option value="newest">Mới nhất</option>
{{--                                    <option <?= $sort == 'default' ? 'selected' : '' ?> value="default">Sắp xếp bởi</option>--}}
{{--                                    <option <?= $sort == 'price-low' ? 'selected' : '' ?> value="price-low">Giá thấp đến cao</option>--}}
{{--                                    <option <?= $sort == 'price-high' ? 'selected' : '' ?> value="price-high">Giá cao đến thấp</option>--}}
{{--                                    <option <?= $sort == 'newness' ? 'selected' : '' ?> value="newness">Mới nhất</option>--}}
                                </select>
                            </div>
                        </div>
                        <ul id="category_list_items" class="row list-products auto-clear equal-container product-grid">

                        </ul>
                        <div class="full position-relative" style="margin-bottom: 60px">
                            <div class="wp-pagenavi" role="navigation">
                                <a href="#" data-page="1">1</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="wrapper-sidebar shop-sidebar">
                        <div class="widget woof_Widget">
                            <div class="widget widget-categories">
                                <h3 class="widgettitle">Danh Mục</h3>
                                <ul class="list-categories">
                                    @foreach($terms as $term)
                                        <li>
                                            <input type="checkbox" id="category_{{$term['id']}}" name="categories[]" value="{{$term['id']}}" onchange="window.location.href = '/'" >
                                            <label for="category_{{$term['id']}}" class="label-text">
                                                    {{$term['name']}} ({{$term['count']}})
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
{{--                            <?php if($cat_id != 3 && $cat_id != 5 && $cat_id != 8 &&$cat_id != 9 && $cat_id != 13):?>--}}
{{--                            <div class="widget">--}}
{{--                                <form action="<?= get_category_link($category); ?>" method="post" id="juice-brand-form">--}}
{{--                                    <h4 class="widgettitle">Thương hiệu tinh dầu</h4>--}}
{{--                                    <ul class="list-brand">--}}
{{--                                        <li>--}}
{{--                                            <input id="tropical" type="checkbox" name="juice-brand[]" value="Tropical House" onchange="juiceBrandSubmitForm()" <?php if (isset($_POST['juice-brand']) && in_array('Tropical House', $_POST['juice-brand'])) echo "checked" ?>>--}}
{{--                                            <label for="tropical" class="label-text">Tropical</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input id="deko" type="checkbox" name="juice-brand[]" value="Deko" onchange="juiceBrandSubmitForm()" <?php if (isset($_POST['juice-brand']) && in_array('Deko', $_POST['juice-brand'])) echo "checked" ?>>--}}
{{--                                            <label for="deko" class="label-text">Deko</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input id="queen" type="checkbox" name="juice-brand[]" value="Queen" onchange="juiceBrandSubmitForm()" <?php if (isset($_POST['juice-brand']) && in_array('Queen', $_POST['juice-brand'])) echo "checked" ?>>--}}
{{--                                            <label for="queen" class="label-text">Queen</label>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <?php endif;?>--}}
{{--                            <?php if($cat_id != 3 && $cat_id != 5 && $cat_id != 8 &&$cat_id != 9 && $cat_id != 13):?>--}}
{{--                            <div class="widget widget-brand" style="margin-top:30px;">--}}
{{--                                <h3 class="widgettitle">Nồng độ nicotine</h3>--}}
{{--                                <form action="<?= get_category_link($category); ?>" method="post" id="nicotine-strength-form">--}}
{{--                                    <ul class="list-brand">--}}
{{--                                        <li>--}}
{{--                                            <input id="3mg" type="checkbox" name="nicotine[]" value="3mg" onchange="nicotineSubmitForm()" <?php if(isset($_POST['nicotine']) && in_array('3mg', $_POST['nicotine'])) echo "checked" ?>>--}}
{{--                                            <label for="3mg" class="label-text">3mg</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input id="6mg" type="checkbox" name="nicotine[]" value="6mg" onchange="nicotineSubmitForm()" <?php if(isset($_POST['nicotine']) && in_array('6mg', $_POST['nicotine'])) echo "checked" ?>>--}}
{{--                                            <label for="6mg" class="label-text">6mg</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input id="30mg" type="checkbox" name="nicotine[]" value="30mg" onchange="nicotineSubmitForm()" <?php if(isset($_POST['nicotine']) && in_array('30mg', $_POST['nicotine'])) echo "checked" ?>>--}}
{{--                                            <label for="30mg" class="label-text">30mg</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input id="50mg" type="checkbox" name="nicotine[]" value="50mg" onchange="nicotineSubmitForm()" <?php if(isset($_POST['nicotine']) && in_array('50mg', $_POST['nicotine'])) echo "checked" ?>>--}}
{{--                                            <label for="50mg" class="label-text">50mg</label>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <?php endif;?>--}}
{{--                            <?php if($cat_id != 3 && $cat_id != 5 && $cat_id != 8 &&$cat_id != 9 && $cat_id != 13):?>--}}
{{--                            <div class="widget">--}}
{{--                                <form action="<?= get_category_link($category); ?>" method="post" id="bottle-size-form">--}}
{{--                                    <h4 class="widgettitle">Thể tích chai</h4>--}}
{{--                                    <ul class="list-brand">--}}
{{--                                        <li>--}}
{{--                                            <input id="10ml" type="checkbox" name="capacity[]" value="10ml" onchange="capacitySubmitForm()" <?php if(isset($_POST['capacity']) && in_array('10ml', $_POST['capacity'])) echo "checked" ?>>--}}
{{--                                            <label for="10ml" class="label-text">10ml</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input id="30ml" type="checkbox" name="capacity[]" value="30ml" onchange="capacitySubmitForm()" <?php if(isset($_POST['capacity']) && in_array('30ml', $_POST['capacity'])) echo "checked" ?>>--}}
{{--                                            <label for="30ml" class="label-text">30ml</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input id="60ml" type="checkbox" name="capacity[]" value="60ml" onchange="capacitySubmitForm()" <?php if(isset($_POST['capacity']) && in_array('60ml', $_POST['capacity'])) echo "checked" ?>>--}}
{{--                                            <label for="60ml" class="label-text">60ml</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input id="100ml" type="checkbox" name="capacity[]" value="100ml" onchange="capacitySubmitForm()" <?php if(isset($_POST['capacity']) && in_array('100ml', $_POST['capacity'])) echo "checked" ?>>--}}
{{--                                            <label for="100ml" class="label-text">100ml</label>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <?php endif;?>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            loadItems(1, 12, 'default');
            var post_per_page = $('.post_per_page_select').val();
            var sort_by = $('.sort_by_select').val();

            $(document).on('click', '.wp-pagenavi a', function (e) {
                e.preventDefault();
                var page = $(this).data('page');
                loadItems(page, post_per_page, sort_by);
            });
            $('.post_per_page_select').on('change', function () {
                loadItems(1, post_per_page, sort_by);
            });
        });

        function loadItems(page, postPerPage, sort) {
            $.ajax({
                url: "{{ route('list_items') }}",
                type: 'POST',
                dataType: 'json',
                cache: false,
                data: {
                    page: page,
                    postPerPage: postPerPage,
                    sort: sort,
                },
                success: function (data) {
                    let listItems = '';
                    $.each(data.products, function (key, product) {
                        listItems += '<li class="product-item product-type-variable col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-1"><div class="product-inner equal-element" style="min-height: 380px;"><div class="product-top"></div><div class="product-thumb"><div class="thumb-inner"><a href="{{ route('load_single_page') }}/' + product.ID + '"><img src="' + product.thumbnail + '" alt=""></a><div class="thumb-group"><a href="#" class="button quick-wiew-button" data-id="">Quick View</a><div class="loop-form-add-to-cart"><a href="#" class="single_add_to_cart_button button off-canvas-toggle navbar-text" id="quick_add_to_cart" onclick="quickAddToCart();" data-bs-toggle="offcanvas">Add to cart</a></div></div></div></div><div class="product-info"><h5 class="product-name product_title"><a href="">' + product.post_title + '</a></h5><div class="group-info">';
                        if (product.quantity <= 0) {
                            listItems += '<div class="price"><ins>Liên hệ</ins></div>';
                        } else {
                            listItems += '<div class="price"><del>' + product.pre_price + '₫</del><ins>' + product.price + '₫</ins></div>';
                        }
                        listItems += '</div></div></div></li>';
                    });

                    $('#category_list_items').html(listItems);

                    updatePagination(data.page, data.totalPages);
                }
            });
        }

        function updatePagination(currentPage, totalPages) {
            var pagination = $('.wp-pagenavi');
            pagination.empty();

            if (currentPage > 1) {
                pagination.append('<a href="#" data-page="' + (parseInt(currentPage) - 1) + '"><</a>');
            }

            for (var i = 1; i <= totalPages; i++) {
                pagination.append('<a href="#" data-page="' + i + '" class="' + (parseInt(currentPage) === i ? 'current' : '') + '">' + i + '</a>');
            }

            if (currentPage < totalPages) {
                pagination.append('<a href="#" data-page="' + (parseInt(currentPage) + 1) + '">></a>');
            }
        }
    </script>
@endsection
