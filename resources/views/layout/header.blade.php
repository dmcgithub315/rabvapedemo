<header class="header style7">
    <div class="container">
        <div class="main-header">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="/themes/rabvape/assets/images/logo.webp" alt="img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                    <div class="block-search-block">
                        <form action="" class="form-search form-search-width-category" method="get">
                            <div class="form-content">
                                <div class="category">
                                    <select title="cate" data-placeholder="Danh mục" class="chosen-select"
                                            tabindex="1" name="category">
                                        <option value="danh-muc">Danh mục</option>
                                        <option value="pod-system">Pod System</option>
                                        <option value="pod-1-lan">Pod 1 Lần</option>
                                        <option value="tinh-dau">Tinh Dầu</option>
                                        <option value="phu-kien">Phụ Kiện</option>
                                        <option value="blog">Blog</option>
                                    </select>
                                </div>
                                <div class="inner">
                                    <input type="text" class="input" name="s" placeholder="Tìm kiếm sản phẩm">
                                </div>
                                <button class="btn-search" type="submit">
                                    <span class="icon-search"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                    <div class="header-control">
                        <div class="block-minicart herald-mini-cart block-header herald-dropdown">
                            <a href="javascript:void(0);" class="shopcart-icon" data-herald="herald-dropdown">
                                Cart
                                <span class="count" id="cart-count"></span>
                            </a>
                            <div class="shopcart-description herald-submenu">
                                <div class="content-wrap">
                                    <h3 class="title">Giỏ hàng</h3>
                                    <div id="mini-cart-header">
                                    </div>
                                    <div class="actions">
                                        <a class="button button-viewcart" href="/cart">
                                            <span>Xem giỏ hàng</span>
                                        </a>
                                        <a href="/checkout" class="button button-checkout">
                                            <span>Thanh toán</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="menu-bar mobile-navigation menu-toggle" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav-container rows-space-20">
        <div class="container">
            <div class="header-nav-wapper main-menu-wapper">
                <div class="vertical-wapper block-nav-categori">
                    <div class="block-title">
							<span class="icon-bar">
								<span></span>
								<span></span>
								<span></span>
							</span>
                        <span class="text">Tất Cả Danh Mục</span>
                    </div>
                    <div class="block-content verticalmenu-content">
                        <ul class="herald-nav-vertical vertical-menu herald-clone-mobile-menu">
                            <li class="menu-item">
                                <a href="/moi-ve" class="herald-menu-item-title" title="New Arrivals">Sản Phẩm Mới</a>
                            </li>
                            <li class="menu-item">
                                <a title="Hot Sale" href="/best-seller/" class="herald-menu-item-title">Sản Phẩm Bán Chạy</a>
                            </li>
                            <li class="menu-item">
                                <a title="Pod System" href="/pod-system/" class="herald-menu-item-title">Pod System</a>
                            </li>
                            <li class="menu-item">
                                <a title="Pod 1 Lần" href="/pod-1-lan/" class="herald-menu-item-title">Pod 1 Lần</a>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a title="Tinh Dầu" href="/tinh-dau/" class="herald-menu-item-title">Tinh Dầu</a>
                                <span class="toggle-submenu"></span>
                                <ul role="menu" class=" submenu">
                                    <li class="menu-item">
                                        <a title="Tinh Dầu Freebase" href="/tinh-dau-freebase/" class="herald-item-title">Tinh Dầu Freebase</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="Tinh Dầu Saltnic" href="/tinh-dau-saltnic/" class="herald-item-title">Tinh Dầu Saltnic</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a title="Phụ Kiện" href="/phu-kien/" class="herald-menu-item-title">Phụ Kiện</a>
                                <span class="toggle-submenu"></span>
                                <ul role="menu" class=" submenu">
                                    <li class="menu-item">
                                        <a title="Đầu Rỗng Máy" href="/dau-rong-may/" class="herald-item-title">Đầu Rỗng Máy</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="OCC Coil Máy" href="/occ-coil-may/" class="herald-item-title">OCC Coil Máy</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-nav">
                    <div class="container-wapper">
                        <ul class="herald-clone-mobile-menu herald-nav main-menu " id="menu-main-menu">
                            <li class="menu-item">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('about')}}" class="herald-menu-item-title" title="About">Giới Thiệu</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('category')}}">Sản Phẩm</a>
                            </li>
                            <li class="menu-item">
                                <a href="/blog-category/tin-tuc/">Tin Tức</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('contact')}}" class="herald-menu-item-title" title="Contact">Liên Hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-device-mobile">
    <div class="wapper">
        <div class="item mobile-logo">
            <div class="logo">
                <a href="">
                    <img src="/themes/rabvape/assets/images/logo.png" alt="img">
                </a>
            </div>
        </div>
        <div class="item item mobile-search-box has-sub">
            <a href="#">
						<span class="icon">
							<i class="fa fa-search" aria-hidden="true"></i>
						</span>
            </a>
            <div class="block-sub">
                <a href="#" class="close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="header-searchform-box">
                    <form action="" class="header-searchform">
                        <div class="searchform-wrap">
                            <input type="text" class="search-input" name="s" placeholder="Nhập từ khóa để tìm kiếm ...">
                            <input type="submit" class="submit button" value="Search">
                            <input type="text" class="d-none" value="danh-muc">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="item menu-bar">
            <a class=" mobile-navigation  menu-toggle" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </div>
</div>
