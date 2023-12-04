@extends('layout.main')
@section('title', 'Contact')
@section('style')
@endsection
@section('content')
    <div class="main-content main-content-contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="trail-item trail-end active">
                                Liên hệ
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area content-contact col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <h3 class="custom_blog_title">Liên Hệ Với Chúng Tôi</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-main-content">
            <div class="google-map">
                <div class="herald-google-maps" id="herald-google-maps" data-hue="" data-lightness="1" data-map-style="2"
                     data-saturation="-99" data-longitude="21.0501671" data-latitude="105.7292917" data-pin-icon=""
                     data-zoom="14" data-map-type="ROADMAP">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-contact">
                            <div class="col-lg-8 no-padding">
                                <div class="form-message">
                                    <h2 class="title">
                                        Liên hệ với chúng tôi
                                    </h2>
                                    <form action="">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">Họ và tên <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">Số điện thoại <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="phone">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Địa chỉ</label>
                                                <input type="text" class="form-control" name="address">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="">Lời nhắn</label>
                                                <textarea class="form-control" name="message" id="" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <button style="margin-top: 15px; padding: 7px 25px;">Gửi</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 no-padding">
                                <div class="form-contact-information">
                                    <form action="#" class="herald-contact-info">
                                        <h2 class="title">
                                            Thông Tin Liên Hệ
                                        </h2>
                                        <div class="info">
                                            <div class="item address">
												<span class="icon">

												</span>
                                                <span class="text">
													 Phương Canh, Nam Từ Liêm, Hà Nội
												</span>
                                            </div>
                                            <div class="item phone">
												<span class="icon">

												</span>
                                                <span class="text">
													0338 994 xxx
												</span>
                                            </div>
                                            <div class="item email">
												<span class="icon">

												</span>
                                                <span class="text" style="text-transform: none">
                                                    rabvapestore@gmail.com
												</span>
                                            </div>
                                        </div>
                                        <div class="socials">
                                            <a href="#" class="social-item" target="_blank">
												<span class="icon fa fa-facebook">

												</span>
                                            </a>
                                            <a href="#" class="social-item" target="_blank">
												<span class="icon fa fa-twitter-square">

												</span>
                                            </a>
                                            <a href="#" class="social-item" target="_blank">
												<span class="icon fa fa-instagram">

												</span>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
