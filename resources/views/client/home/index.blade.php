@extends('client.shared.layout')
@section('content')

<!-- [Banner] -->
<section class="banner">
    <div class="banner__wrap">
        <div class="banner__slide owl-carousel owl-theme">
            <div class="banner__slide-item">
                <img src="./upload/banner/banner-1.jpg" class="banner__slide-image">
            </div>
            <div class="banner__slide-item">
                <img src="./upload/banner/banner-2.jpg" class="banner__slide-image">
            </div>
            <div class="banner__slide-item">
                <img src="./upload/banner/banner-3.jpg" class="banner__slide-image">
            </div>
        </div>
        <div class="banner__content">
            <p>Zeus studio</p>
            <h3><span>Create</span> your <span>own</span> style</h3>
            <a href="#" class="">Shop now!</a>
        </div>
    </div>
</section>

<!-- [New arrival] -->
<section class="unit">
    <div class="container">
        <div class="unit__header">
            <div>
                <a href="#" class="unit__header-title">New arrival</a>
                <p class="unit__header-description">Sản phẩm mới tại Zeus studio</p>
            </div>
            <a href="#" class="btn btn-dark btn-watch-more">
                <span>Xem thêm</span> 
            </a>
        </div>
        <div class="unit__body">
            <ul class="nav nav-pills">
                <!-- <li class="nav-item">
                    <a href="#newarrival-all" class="nav-link active" 
                    data-bs-toggle="tab">Tất cả sản phẩm</a>
                </li> -->
                <li class="nav-item">
                    <a href="#newarrival-man" class="nav-link active" data-bs-toggle="tab">Nam</a>
                </li>
                <li class="nav-item">
                    <a href="#newarrival-woman" class="nav-link" data-bs-toggle="tab">Nữ</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- <div class="tab-pane fade show active" id="newarrival-all">
                </div> -->
                <div class="tab-pane fade show active" id="newarrival-man">
                    <div class="unit__main owl-carousel owl-theme">
                        <div class="item">
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product.jpg"
                                        class="product__img">
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <span class="product__price">350,000đ</span>
                                </div>
                            </div>
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product-2.jpg"
                                        class="product__img">
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <span class="product__price">350,000đ</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product-3.jpg"
                                        class="product__img">
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <span class="product__price">350,000đ</span>
                                </div>
                            </div>
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product-4.jpg"
                                        class="product__img">
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <span class="product__price">350,000đ</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade" id="newarrival-woman">
                    <p>Messages tab content ...</p>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- [Collection] -->
<section class="collection">
    <div class="container">
        <div class="unit__header">
            <div>
                <a href="#" class="unit__header-title">Bộ sưu tập</a>
                <p class="unit__header-description">Sản phẩm nam và nữ tại Zeus studio</p>
            </div>
            <a href="#" class="btn btn-dark btn-watch-more">
                <span>Xem thêm</span> 
            </a>
        </div>
        <div class="unit__body">
            <div class="row">
                <div class="col-lg-6">
                    <a href="#" class="collection__wrap">
                        <img src="./upload/banner/banner-2.jpg" class="collection__wrap-img">
                        <div class="overlay"></div>
                        <div class="collection__wrap-btn">
                            <button class="btn btn-collection">Man's Collection</button>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="#" class="collection__wrap">
                        <img src="./upload/banner/banner-1.jpg" class="collection__wrap-img">
                        <div class="overlay"></div>
                        <div class="collection__wrap-btn">
                            <button class="btn btn-collection">Woman's Collection</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- [Best seller] -->
<section class="unit">
    <div class="container">
        <div class="unit__header">
            <div>
                <a href="#" class="unit__header-title">Best seller</a>
                <p class="unit__header-description">Sản phẩm bán chạy nhất tại Zeus studio</p>
            </div>
            <a href="#" class="btn btn-dark btn-watch-more">
                <span>Xem thêm</span> 
            </a>
        </div>
        <div class="unit__body">
            <ul class="nav nav-pills">
                <!-- <li class="nav-item">
                    <a href="#bestseller-all" class="nav-link active" 
                    data-bs-toggle="tab">Tất cả sản phẩm</a>
                </li> -->
                <li class="nav-item">
                    <a href="#bestseller-man" class="nav-link active" data-bs-toggle="tab">Nam</a>
                </li>
                <li class="nav-item">
                    <a href="#bestseller-woman" class="nav-link" data-bs-toggle="tab">Nữ</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- <div class="tab-pane fade show active" id="bestseller-all">
                </div> -->
                <div class="tab-pane fade show active" id="bestseller-man">
                    <div class="unit__main owl-carousel owl-theme">
                        <div class="item">
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product.jpg"
                                        class="product__img">
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#" class="btn-quick-view"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <span class="product__price">350,000đ</span>
                                </div>
                            </div>
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product-2.jpg"
                                        class="product__img">
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <span class="product__price">350,000đ</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product-3.jpg"
                                        class="product__img">
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <span class="product__price">350,000đ</span>
                                </div>
                            </div>
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product-4.jpg"
                                        class="product__img">
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <span class="product__price">350,000đ</span>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
                <div class="tab-pane fade" id="bestseller-woman">
                    <p>Messages tab content ...</p>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- [Services Displayed] -->
<section class="unit">
    <div class="container">

    <div class="unit__header">
        <div>
            <a href="#" class="unit__header-title">Chính sách</a>
            <p class="unit__header-description">Một số chính sách từ Zeus studio</p>
        </div>
        <a href="#" class="btn btn-dark btn-watch-more">
            <span>Xem thêm</span> 
        </a>
    </div>
    <div class="unit__body">
        <div class="services__wrap">
            <div class="row">
                <div class="col-lg-4">
                    <div class="services__wrap-item">
                        <a href="#" class="services__wrap-item-picture">
                            <i class="ti-package"></i>
                        </a>
                        <div class="services__wrap-item-info">
                            <a href="#" class="services__wrap-item-info-name"
                            >Bảo hành</a>
                            <p class="services__wrap-item-info-description"
                            >Trong vòng 30 ngày kể từ khi nhận hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="services__wrap-item">
                        <a href="#" class="services__wrap-item-picture">
                            <i class="ti-reload"></i>
                        </a>
                        <div class="services__wrap-item-info">
                            <a href="#" class="services__wrap-item-info-name"
                            >Đổi trả</a>
                            <p class="services__wrap-item-info-description"
                            >Trong 15 ngày kể từ khi nhận hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="services__wrap-item">
                        <a href="#" class="services__wrap-item-picture">
                            <i class="ti-package"></i>
                        </a>
                        <div class="services__wrap-item-info">
                            <a href="#" class="services__wrap-item-info-name"
                            >Bảo mật</a>
                            <p class="services__wrap-item-info-description"
                            >Cam kết bảo mật thông tin khách hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- [Sale] -->
<section class="unit">
    <div class="container">
        <div class="unit__header">
            <div>
                <a href="#" class="unit__header-title">Sale</a>
                <p class="unit__header-description">Sản phẩm đang được giảm giá tại Zeus studio</p>
            </div>
            <a href="#" class="btn btn-dark btn-watch-more">
                <span>Xem thêm</span> 
            </a>
        </div>
        <div class="unit__body">
            <ul class="nav nav-pills">
                <!-- <li class="nav-item">
                    <a href="#sale-all" class="nav-link active" 
                    data-bs-toggle="tab">Tất cả sản phẩm</a>
                </li> -->
                <li class="nav-item">
                    <a href="#sale-man" class="nav-link active" data-bs-toggle="tab">Nam</a>
                </li>
                <li class="nav-item">
                    <a href="#sale-woman" class="nav-link" data-bs-toggle="tab">Nữ</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- <div class="tab-pane fade show active" id="sale-all">
                </div> -->
                <div class="tab-pane fade show active" id="sale-man">
                    <div class="unit__main owl-carousel owl-theme">
                        <div class="item">
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product.jpg"
                                        class="product__img">
                                        <span class="product__wrap-img-sale-level">
                                            <span>20%</span>
                                        </span>
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <div>
                                        <span class="product__price dash">350,000đ</span>
                                        <span class="product__price-sale">280,000đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product-2.jpg"
                                        class="product__img">
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <div>
                                        <span class="product__price dash">350,000đ</span>
                                        <span class="product__price-sale">280,000đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product-3.jpg"
                                        class="product__img">
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <div>
                                        <span class="product__price dash">350,000đ</span>
                                        <span class="product__price-sale">280,000đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./upload/product/product-4.jpg"
                                        class="product__img">
                                    </a>
    
                                    <div class="product__options-wrap">
                                        <div class="product__options">
                                            <a href="#" class="product__options-add-to-cart">
                                                Thêm vào giỏ hàng
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <div class="product__options-child">
                                                <a href="#"><i class="ti-eye"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-location-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="product__wrap-info">
                                    <a href="#" class="product__name">Zeus shirt</a>
                                    <div>
                                        <span class="product__price dash">350,000đ</span>
                                        <span class="product__price-sale">280,000đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
                <div class="tab-pane fade" id="sale-woman">
                    <p>Messages tab content ...</p>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- [Blog] -->
<section class="unit">
    <div class="container">
        <div class="unit__header">
            <div>
                <a href="#" class="unit__header-title">Blog</a>
                <p class="unit__header-description">Khám phá tin tức, tips phối đồ từ Zeus studio</p>
            </div>
            <a href="#" class="btn btn-dark btn-watch-more">
                <span>Xem thêm</span> 
            </a>
        </div>
        <div class="unit__body">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="#blog-first-time" class="nav-link active" 
                    data-bs-toggle="tab">Tháng 3/2022</a>
                </li>
                <li class="nav-item">
                    <a href="#blog-second-time" class="nav-link"
                        data-bs-toggle="tab">Tháng 2/2022</a>
                </li>
                <li class="nav-item">
                    <a href="#blog-third-time" class="nav-link"
                        data-bs-toggle="tab">Tháng 1/2022</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="blog-first-time">
                    <div class="blog__slide owl-carousel owl-theme">
                        <div class="item">
                            <div class="blog__wrap">
                                <a href="#" class="blog__wrap-img">
                                    <img class="blog__img" src="./upload/banner/banner-1.jpg">
                                </a>
    
                                <div class="blog__wrap-info">
                                    <p class="blog__wrap-info-time">19 tháng 03, 2022</p>
                                    <a href="#" class="blog__wrap-info-name">Tips phối đồ theo phong cách street style</a>      
                                    <a href="#" class="btn-read">Đọc thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="blog-second-time">
                    <p>Profile tab content ...</p>
                </div>
                <div class="tab-pane fade" id="blog-third-time">
                    <p>Messages tab content ...</p>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- [Newsletter] -->
<section class="unit">
    <div class="container">
        <div class="unit__header">
            <div>
                <a href="#" class="unit__header-title">NEWSLETTER</a>
                <p class="unit__header-description">Nhận các thông tin mới từ Zeus studio về Email của bạn</p>
            </div>
        </div>
        <div class="unit__body">
            <div class="newsletter__wrap">
                <form action="#">
                    <input type="email" class="newsletter__wrap-email"
                        id="email" name="email" placeholder="Email của bạn ...">
                    <button type="submit" class="btn btn-dark newsletter__wrap-btn-send">Gửi</button>
                </form>
            </div>
        </div>
    </div>
</section>
@stop