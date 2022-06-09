@extends('client.shared.layout')
@section('content')

<section class="product" ng-controller="DetailController">
    <div class="container">
        <div class="product__present-wrap">
            <nav aria-label="breadcrumb">
                <div class="breadcrumb__wrap">
                    <p>Chi tiết sản phẩm</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active"><a href="#">Chi tiết sản phẩm</a></li>
                    </ol>
                </div>
            </nav>
            <div class="product__present-information">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product__present-information-slide">

                                <div class="slide__gallery-thumbs">
                                    <div ng-repeat="image in selectedColor.listImages track by $index">
                                        <!-- <img ng-src="@{{ image }}" class="show" alt=""> -->
                                        <img ng-if="(image.substring(0, 5) === 'https')" ng-src="@{{ image }}" class="show" alt="">
                                        <img ng-if="!(image.substring(0, 5) === 'https')" ng-src="/upload/product/@{{ product.id }}/@{{ image }}" class="show" alt="">
                                    </div>
                                </div>
                                
                                <div class="slide__gallery">
                                    <div ng-repeat="image in selectedColor.listImages track by $index">
                                        <!-- <img ng-src="@{{ image }}" class="show" alt=""> -->
                                        <img ng-if="(image.substring(0, 5) === 'https')" ng-src="@{{ image }}" class="show" alt="">
                                        <img ng-if="!(image.substring(0, 5) === 'https')" ng-src="/upload/product/@{{ product.id }}/@{{ image }}" class="show" alt="">
                                    </div>
                                </div>       
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product__present-information-content">
                            <div class="content__show">
                                <h3 class="content__show-name">@{{ product.product_name }}</h3>
                                <p class="content__show-price">@{{ product.price.price | currency:"":0}} VNĐ</p>
                                
                                <div>
                                    <span class="content__show-label">Tình trạng: </span>
                                    <span class="content__show-quantity-remaining"
                                    ng-class="selectedSize.quantity > 0 ? 'available' : 'sold'"
                                    >
                                    @{{ selectedSize.quantity > 0 ? 'Còn ' + selectedSize.quantity + ' sản phẩm' : 'Hết hàng' }}
                                    </span>
                                </div>
                            </div>

                            <div class="content__options">
                                <div>
                                    <span class="content__show-label">Màu sắc: </span>
                                    
                                    <div class="d-flex align-items-center">
                                        <div class="dropdown content__options-select">
                                            <button class="btn btn-secondary dropdown-toggle"
                                                type="button"
                                                id="dropdownSelectDetailColor" 
                                                data-bs-toggle="dropdown">
                                                @{{ selectedColor.color_name }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li ng-repeat="color in product.color track by $index">
                                                    <a 
                                                    ng-click="changeColor(color, $index)"
                                                    ng-class="color.id == selectedColor.id ? 'selected' : ''"
                                                    class="dropdown-item" href="javascript:void(0)">
                                                        @{{ color.color_name }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div ng-style="{ 'background': selectedColor.hex }"
                                         class="content__options-select-color ms-3"></div>
                                    </div>
                                </div>

                                <div>
                                    <span class="content__show-label">Size: </span>
                                    
                                    <div class="d-flex align-items-center">
                                        <div class="dropdown content__options-select">
                                            <button class="btn btn-secondary dropdown-toggle"
                                                type="button"
                                                id="dropdownSelectDetailSize" 
                                                data-bs-toggle="dropdown">
                                                @{{ selectedSize.size_name }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li ng-repeat="size in product.size | filter: filterSize">
                                                    <a 
                                                    ng-click="changeSize(size, $index)"
                                                    ng-class="size.id == selectedSize.id ? 'selected' : ''"
                                                    class="dropdown-item" href="javascript:void(0)">
                                                        @{{ size.size_name }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <span class="content__show-label">Số lượng: </span>

                                    <div class="content__options-amount">
                                        <input ng-click="handlingAmount($event, 0)" class="content__options-amount-item btn-sub" type="text" value="-" readonly>
                                        <input class="content__options-amount-item content__options-amount-value" type="text" value="1" readonly>
                                        <input ng-click="handlingAmount($event, 1)" class="content__options-amount-item btn-plus" type="text" value="+" readonly>
                                    </div>
                                </div>
                                
                                <div>
                                    <a href="#" 
                                    style="color: #d36942; 
                                    text-decoration: underline;">
                                    Bảng kích cỡ của sản phẩm</a>
                                </div>

                                <div class="content__options-buy">
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <a href="javascript:void(0)" ng-click="addToCart(product)"
                                                class="content__options-btn 
                                                content__options-btn-toCart">Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="#" 
                                                class="content__options-btn 
                                                content__options-btn-toHeart">
                                                <i class="ti-heart"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <a href="/checkout" 
                                    ng-click="addToCart(product)"
                                    class="content__options-btn
                                    content__options-btn-toCheckout">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a href="#tab-description" class="nav-link active" 
                            data-bs-toggle="tab">Mô tả sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-supplement" class="nav-link"
                                data-bs-toggle="tab">Thông tin bổ sung</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-description">
                            <div>
                                <p ng-bind-html="product.description"> 
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-supplement">
                            <p>Đang cập nhật ...</p>
                        </div>
                    </div>
                </div>

                <div style="display: none">
                    <div class="unit__header">
                        <div>
                            <a href="#" class="unit__header-title">Sản phẩm tương tự</a>
                            <p class="unit__header-description">Những sản phẩm có liên quan tại Zeus studio</p>
                        </div>
                        <a href="#" class="btn btn-dark btn-watch-more">
                            <span>Xem thêm</span> 
                        </a>
                    </div>
                    <!-- <div class="product__similar-slide owl-carousel owl-theme">
                        <div class="item">
                            <div class="product__wrap">
                                <div class="product__wrap-img">
                                    <a href="#">
                                        <img src="./assets/images/product-4.jpg"
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
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script src="/assets/client/dist/controllers/DetailController.js"></script> -->

@stop