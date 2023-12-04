@extends('layout.main')
@section('title', 'Sản Phẩm')
@section('style')
@endsection
@section('content')
    <div class="main-content main-content-details single right-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="trail-item">
                                <a href=""></a>
                            </li>
                            <li class="trail-item trail-end active">
                                {{$item->post_title}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area content-details col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <div class="details-product">
                            <div class="details-thumd">
                                @if(\App\Helpers\PostMetaHelper::get_album($item->ID))
                                    <div class="image-preview-container image-thick-box image_preview_container">
                                        <img id="img_zoom" data-zoom-image="{{\App\Helpers\PostMetaHelper::get_album($item->ID)[0]}}" src="{{\App\Helpers\PostMetaHelper::get_album($item->ID)[0]}}" alt="{{$item->post_title}}">
                                    </div>
                                @else
                                    <div class="image-preview-container image-thick-box image_preview_container">
                                        <img id="img_zoom" data-zoom-image="{{\App\Helpers\PostMetaHelper::get_thumbnail_url($item->ID)}}" src="{{\App\Helpers\PostMetaHelper::get_thumbnail_url($item->ID)}}" alt="{{$item->post_title}}">
                                    </div>
                                @endif
                                <div class="product-preview image-small product_preview">
                                    <div id="thumbnails" class="thumbnails_carousel owl-carousel" data-nav="true" data-autoplay="false" data-dots="false" data-loop="false" data-margin="10" data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}'>
                                        @foreach(\App\Helpers\PostMetaHelper::get_album($item->ID) as $image)
                                            <a href="#" data-image="{{$image}}" data-zoom-image="{{$image}}" class="active">
                                                <img src="{{$image}}" data-large-image="{{$image}}" alt="{{$item->post_title}}">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="details-infor">
                                <h1 class="product-title">
                                    {{$item->post_title}}
                                </h1>
                                <!--                            <div class="stars-rating">-->
                                <!--                                <div class="star-rating">-->
                                <!--                                    <span class="star-5"></span>-->
                                <!--                                </div>-->
                                <!--                                <div class="count-star">-->
                                <!--                                    (7)-->
                                <!--                                </div>-->
                                <!--                            </div>-->
                                <div class="availability">
                                    Tình trạng:
                                    <a href="#">
                                        {{\App\Helpers\PostMetaHelper::get_field($item->ID, 'quantity') > 0 ? 'Còn hàng' : 'Cháy hàng'}}
                                    </a>
                                </div>
                                <div class="price">
                                    @if(\App\Helpers\PostMetaHelper::get_field($item->ID, 'quantity') > 0)
                                        <span>{{number_format(\App\Helpers\PostMetaHelper::get_field($item->ID, 'price'))}}₫</span>
                                    @else
                                        <span>Liên Hệ</span>
                                    @endif
                                </div>
                                <div class="product-details-description">
                                    <p>
                                        {{\App\Helpers\PostMetaHelper::get_field($item->ID, 'inbox') ? str_replace("/", "</br>", \App\Helpers\PostMetaHelper::get_field($item->ID, 'inbox')) : ''}}
                                    </p>
                                    <ul>
                                        @if(\App\Helpers\PostMetaHelper::get_field($item->ID, 'type'))
                                            <li>LOẠI SẢN PHẨM: {{\App\Helpers\PostMetaHelper::get_field($item->ID, 'type')}}</li>
                                        @endif
                                        @if(\App\Helpers\PostMetaHelper::get_field($item->ID, 'brand'))
                                            <li>THƯƠNG HIỆU: {{\App\Helpers\PostMetaHelper::get_field($item->ID, 'brand')}}</li>
                                        @endif
                                    </ul>
                                </div>
                                <form action="" method="post">
{{--                                    <div class="variations">--}}
{{--                                        <?php $nicotine = get_field('nicotine'); if($nicotine):?>--}}
{{--                                        <div class="attribute attribute_color">--}}
{{--                                            <div class="size-text text-attribute">--}}
{{--                                                Hàm lượng nicotine:--}}
{{--                                            </div>--}}
{{--                                            <div class="list-size list-item">--}}
{{--                                                <select name="nicotine" title="">--}}
{{--                                                        <?php--}}
{{--                                                    foreach ($nicotine as $nicotineKey => $mg):--}}
{{--                                                        ?>--}}
{{--                                                    <option value="<?= $mg; ?>"><?= $mg; ?>mg</option>--}}
{{--                                                    <?php endforeach;?>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <?php endif;?>--}}
{{--                                        <?php $capacity = get_field('capacity'); if($capacity):?>--}}
{{--                                        <div class="attribute attribute_size">--}}
{{--                                            <div class="size-text text-attribute">--}}
{{--                                                Dung tích:--}}
{{--                                            </div>--}}
{{--                                            <div class="list-size list-item">--}}
{{--                                                <select name="capacity" title="">--}}
{{--                                                        <?php--}}
{{--                                                    foreach ($capacity as $capacityKey => $capacityValue):--}}
{{--                                                        ?>--}}
{{--                                                    <option value="<?= $capacityValue; ?>"><?= $capacityValue; ?>ml</option>--}}
{{--                                                    <?php endforeach;?>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <?php endif;?>--}}
{{--                                        <?php $colors = get_field('colors'); if($colors):?>--}}
{{--                                        <div class="attribute attribute_size">--}}
{{--                                            <div class="size-text text-attribute">--}}
{{--                                                Màu:--}}
{{--                                            </div>--}}
{{--                                            <div class="list-size list-item">--}}
{{--                                                <div class="form-check form-check-inline">--}}
{{--                                                        <?php--}}
{{--                                                    foreach ($colors as $key => $color):--}}
{{--                                                        ?>--}}
{{--                                                    <input class="form-check-input" type="radio" name="color" id="color<?= $key; ?>" value="<?= $color['color_name']; ?>" required="required" >--}}
{{--                                                    <label class="form-check-label" for="color<?= $key; ?>"><span style="width:16px;height:16px; display: inline-block; background-color: <?= $color['color_code']; ?> "></span> <?= $color['color_name']; ?></label>--}}
{{--                                                    <?php endforeach;?>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <?php endif;?>--}}
{{--                                    </div>--}}
                                    @if(\App\Helpers\PostMetaHelper::get_field($item->ID, ' quantity') > 0)
                                        <div class="group-button">
                                            <div class="quantity-add-to-cart">
                                                <div class="quantity">
                                                    <div class="control">
                                                        <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                        <input type="text" data-step="1" data-min="0" value="1" title="Qty" name="quantity" class="input-qty qty" size="4">
                                                        <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                                    </div>
                                                </div>
                                                <button class="single_add_to_cart_button button">Thêm vào giỏ hàng</button>
                                                <input type="text" class="hidden" name="id" value="<?= get_the_ID(); ?>">
                                            </div>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                        <div class="tab-details-product">
                            <ul class="tab-link">
                                <li class="active">
                                    <a data-toggle="tab" aria-expanded="true" href="#product-descriptions">Mô tả </a>
                                </li>
                            </ul>
                            <div class="tab-container">
                                <div id="product-descriptions" class="tab-panel active">
                                    <p>{{$item->post_content}}</p>
                                </div>
                            </div>
                        </div>
                        <div style="clear: left;"></div>
                        <div class="related products product-grid">
                            <h2 class="product-grid-title">Có thể bạn thích</h2>
{{--                            <div class="owl-list-item owl-theme">--}}
{{--                                <?php--}}
{{--                                if ($listItem->have_posts()) : while ($listItem->have_posts()) : $listItem->the_post();--}}
{{--                                    ?>--}}
{{--                                <div class="product-item item style-1">--}}
{{--                                    <div class="product-inner equal-element">--}}
{{--                                        <div class="product-top">--}}
{{--                                            <div class="flash">--}}
{{--                                            <span class="onnew">--}}
{{--                                                <span class="text">--}}
{{--                                                    new--}}
{{--                                                </span>--}}
{{--                                            </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-thumb">--}}
{{--                                            <div class="thumb-inner">--}}
{{--                                                <a href="<?= get_permalink()?>">--}}
{{--                                                    <img src="<?= get_the_post_thumbnail_url()?>" alt="<?= get_the_title()?>">--}}
{{--                                                </a>--}}
{{--                                                <div class="thumb-group">--}}
{{--                                                    <!--                                                <div class="yith-wcwl-add-to-wishlist">-->--}}
{{--                                                    <!--                                                    <div class="yith-wcwl-add-button">-->--}}
{{--                                                    <!--                                                        <a href="#">Add to Wishlist</a>-->--}}
{{--                                                    <!--                                                    </div>-->--}}
{{--                                                    <!--                                                </div>-->--}}
{{--                                                    <a href="#" class="button quick-wiew-button">Quick View</a>--}}
{{--                                                    <div class="loop-form-add-to-cart">--}}
{{--                                                        <button class="single_add_to_cart_button button">Add to cart--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-info">--}}
{{--                                            <h5 class="product-name product_title">--}}
{{--                                                <a href="<?= get_permalink()?>"><?= get_the_title()?></a>--}}
{{--                                            </h5>--}}
{{--                                            <div class="group-info">--}}
{{--                                                <div class="price">--}}
{{--                                                    <del>--}}
{{--                                                            <?= number_format(get_field('preprice'))?>₫--}}
{{--                                                    </del>--}}
{{--                                                    <ins>--}}
{{--                                                            <?= number_format(get_field('price'))?>₫--}}
{{--                                                    </ins>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <?php--}}
{{--                                endwhile;--}}
{{--                                endif;?>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="sidebar sidebar-details col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="wrapper-sidebar">
                        <div class="widget widget-categories">
                            <form action="" method="post" id="category-form">
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
                            </form>
                        </div>
                        <div class="widget widget-related-products">
                            <h3 class="widgettitle">Sản phẩm liên quan</h3>
{{--                            <div class="slider-related-products owl-slick nav-top-right equal-container"  data-slick ='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1 }},{"breakpoint":"992","settings":{"slidesToShow":2}}]'>--}}
{{--                                <?php--}}
{{--                                if ($relatedItem->have_posts()) : while ($relatedItem->have_posts()) : $relatedItem->the_post();--}}
{{--                                    ?>--}}
{{--                                <div class="product-item style-1">--}}
{{--                                    <div class="product-inner equal-element">--}}
{{--                                        <div class="product-top">--}}
{{--                                            <div class="flash">--}}
{{--													<span class="onnew">--}}
{{--														<span class="text">--}}
{{--															new--}}
{{--														</span>--}}
{{--													</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-thumb">--}}
{{--                                            <div class="thumb-inner">--}}
{{--                                                <a href="<?= get_permalink()?>">--}}
{{--                                                    <img src="<?= get_the_post_thumbnail_url()?>" alt="<?= get_the_title()?>">--}}
{{--                                                </a>--}}
{{--                                                <div class="thumb-group">--}}
{{--                                                    <!--                                                <div class="yith-wcwl-add-to-wishlist">-->--}}
{{--                                                    <!--                                                    <div class="yith-wcwl-add-button">-->--}}
{{--                                                    <!--                                                        <a href="#">Add to Wishlist</a>-->--}}
{{--                                                    <!--                                                    </div>-->--}}
{{--                                                    <!--                                                </div>-->--}}
{{--                                                    <a href="#" class="button quick-wiew-button">Quick View</a>--}}
{{--                                                    <div class="loop-form-add-to-cart">--}}
{{--                                                        <button class="single_add_to_cart_button button">Add to cart--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-info">--}}
{{--                                            <h5 class="product-name product_title">--}}
{{--                                                <a href="<?= get_permalink()?>"><?= get_the_title()?></a>--}}
{{--                                            </h5>--}}
{{--                                            <div class="group-info">--}}
{{--                                                <div class="price">--}}
{{--                                                    <del>--}}
{{--                                                            <?= number_format(get_field('preprice'))?>₫--}}
{{--                                                    </del>--}}
{{--                                                    <ins>--}}
{{--                                                            <?= number_format(get_field('price'))?>₫--}}
{{--                                                    </ins>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <?php endwhile;--}}
{{--                                endif;?>--}}
{{--                            </div>--}}
                        </div>
                        <div class="widget widget-banner">
                            <a href="">
                                <img src="/themes/rabvape/assets/images/widget-banner.jpg" alt="banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
    </script>
@endsection
