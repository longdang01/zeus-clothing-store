<header class="header">
    <div class="header__topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 text-start">
                    <ul class="header__topbar-list">
                        <li class="header__topbar-list-item">
                            <i class="ti-headphone-alt"></i>
                            <span>093 237 42 81</span>
                        </li><li class="header__topbar-list-item">
                            <i class="ti-email"></i>
                            <span>zeus-studio@gmail.com</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-7 text-end">
                    <ul class="header__topbar-list" ng-controller="CustomerController">
                        <li class="header__topbar-list-item">
                            <i class="ti-location-pin"></i>
                            <a href="#">Địa chỉ cửa hàng</a>
                        </li><li ng-if="status == 1" class="header__topbar-list-item">
                            <i class="ti-alarm-clock"></i>
                            <a href="/orders" >Đơn hàng của bạn</a>
                        </li></li><li ng-if="status == 0" class="header__topbar-list-item">
                            <i class="ti-power-off"></i>
                            <a href="/customers/login">Đăng nhập</a>
                        </li><li ng-if="status == 0" class="header__topbar-list-item">
                            <i class="ti-id-badge"></i>
                            <a href="/customers/register">Đăng ký</a>
                        </li><li ng-if="status == 1" class="header__topbar-list-item">
                            <i class="fa-solid fa-hand-sparkles"></i>
                            <span>Hi, @{{ customer.customer_name }}</span>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header__tools">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <a href="/home" class="header__brand">Zeus<span>.</span></a>
                </div>
                <div class="col-lg-8">
                    <div class="header__tools-search text-center">
                        <div class="header__tools-search-bar">
                            <select class="search-bar--select">
                                <option data-display="Tất cả sản phẩm">Tất cả sản phẩm</option>
                                <!-- <option value="1">Sản phẩm nam</option>
                                <option value="2">Sản phẩm nữ</option> -->
                            </select>
                            <form action="#" ng-controller="ProductController">
                                <input type="text" id="keySearch" name="keySearch"
                                ng-model="product_name"
                                placeholder="Tìm kiếm sản phẩm tại đây ...">
                                <a 
                                href="/products"
                                ng-click="search(3, product_name)"
                                type="submit"
                                class="btn btn-search">
                                    <i class="ti-search"></i>
                                </a>
                                <!-- <button
                                ng-click="search(3, product_name)"
                                type="submit"
                                class="btn btn-search">
                                    <i class="ti-search"></i>
                                </button> -->
                            </form>    
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <ul class="header__tools-general">
                        <li>
                            <a href="#" class="header__tools-general-cart"
                            data-bs-toggle="modal" data-bs-target="#miniCart">
                                <i class="ti-bag"></i>
                                <span>@{{ totalCart }}</span>
                            </a>
                        </li>
                        <li class="header__tools-general-user dropdown">
                            <a href="#" class="header__tools-general-user-link dropdown-toggle" 
                            id="user-dropdown" 
                            data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti-user"></i>
                            </a>
                            <ul class="header__navbar-item-dropdown dropdown-menu animate slideIn" 
                            aria-labelledby="user-dropdown" ng-controller="CustomerController">
                                <li ng-if="status == 1">
                                    <a href="#" class="dropdown-item">
                                        <i class="ti-settings"></i>
                                        Tài khoản của bạn
                                    </a>
                                </li>
                                <li ng-if="status == 1">
                                    <a href="/orders" class="dropdown-item">
                                        <i class="ti-briefcase"></i>
                                        Đơn hàng của bạn
                                    </a>
                                </li>
                                <li ng-if="status == 1">
                                    <a href="#" class="dropdown-item">
                                        <i class="ti-heart"></i>
                                        Yêu thích 
                                    </a>
                                </li>
                                <li ng-if="status == 1">
                                    <a ng-click="logOut()" href="#" class="dropdown-item">
                                        <i class="ti-power-off"></i>
                                        Đăng xuất
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <nav class="header__navbar">
        <div class="container">
            <div class="row">
                <div class="@{{ (page === '/home' || page === '/' || page === '/home#') ? 'col-lg-3 text-start' : 'hide'}}">
                    <div class="header__navbar-category">
                        <h3>
                            <i class="ti-align-left"></i>
                            Danh mục sản phẩm
                            <i class="fa-solid fa-angle-down"></i>
                        </h3>
                        <ul class="header__navbar-item-dropdown">
                            <li>
                                <a href="#newArrival">New Arrivals
                                    <!-- <i class="fa-solid fa-angle-right"></i> -->
                                </a>
                                <ul class="header__navbar-item-dropdown-child dropdown-child-right">
                                    <!-- <li><a href="#">Tất cả sản phẩm</a></li> -->
                                    <!-- <li><a href="#">Nam</a></li>
                                    <li><a href="#">Nữ</a></li> -->
                                </ul>
                            </li>
                            <li><a href="#bestSeller">Best Selling
                                <!-- <i class="fa-solid fa-angle-right"></i> -->
                            </a>
                                <ul class="header__navbar-item-dropdown-child dropdown-child-right">
                                    <!-- <li><a href="#">Tất cả sản phẩm</a></li> -->
                                    <!-- <li><a href="#">Nam</a></li>
                                    <li><a href="#">Nữ</a></li> -->
                                </ul>
                            </li>
                            <!-- <li><a href="#">Sale -->
                                <!-- <i class="fa-solid fa-angle-right"></i> -->
                            <!-- </a>
                                <ul class="header__navbar-item-dropdown-child dropdown-child-right"> -->
                                    <!-- <li><a href="#">Tất cả sản phẩm</a></li> -->
                                    <!-- <li><a href="#">Nam</a></li>
                                    <li><a href="#">Nữ</a></li> -->
                                <!-- </ul>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="@{{ (page === '/home' || page === '/' || page === '/home#') ? 'col-lg-7' : 'col-lg-10' }}" >
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <a href="#" class="header__navbar-item-link active">Trang chủ</a>
                        </li><li class="header__navbar-item">
                            <a href="/products" class="header__navbar-item-link">
                                Sản phẩm
                                <i class="fa-solid fa-angle-down"></i>
                            </a>
                            <ul class="header__navbar-item-dropdown">
                                <!-- <li><a href="#">Tất cả sản phẩm</a></li> -->
                                <!-- <li><a href="#">Nam</a></li>
                                <li><a href="#">Nữ</a></li> -->
                            </ul>
                        </li><li class="header__navbar-item">
                            <a href="#" class="header__navbar-item-link">
                                Shop
                                <span class="header__navbar-item-link--dot"></span>
                            </a>
                            <ul class="header__navbar-item-dropdown">
                                <li><a href="/carts">Xem giỏ hàng (@{{ totalCart }} sản phẩm)</a></li>
                                <li><a href="/checkout">Thanh toán</a></li>
                            </ul>
                        </li><li class="header__navbar-item">
                            <a href="#" class="header__navbar-item-link">Dịch vụ</a>
                        </li><li class="header__navbar-item">
                            <a href="#" class="header__navbar-item-link">Blog</a>
                        </li><li class="header__navbar-item">
                            <a href="#" class="header__navbar-item-link">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 text-end">
                    <div class="header__navbar-help">
                        <h3>
                            <i class="ti-align-justify"></i>
                        </h3>
                        <ul class="header__navbar-item-dropdown">
                            <li style="display: none">
                                <a href="#"><i class="ti-search"></i></a>
                            </li><li style="display: none">
                                <a href="#"><i class="ti-user"></i></a>
                                <ul class="header__navbar-item-dropdown-child dropdown-child-left">
                                    <li><a href="#">Đăng nhập</a></li>
                                    <li><a href="#">Đăng ký</a></li>
                                </ul>
                            </li><li>
                                <a href="#">Hướng dẫn mua hàng</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>  
        </div>
    </nav>
</header>

<!-- <script src="/assets/client/dist/controllers/CartController.js"></script>
<script src="/assets/client/dist/controllers/CustomerController.js"></script> -->

