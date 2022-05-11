@extends('client.shared.layout')
@section('content')

<section class="cart" ng-controller="CartController">
    <div class="container">
        <div class="cart__wrap">
            <nav aria-label="breadcrumb">
                <div class="breadcrumb__wrap">
                    <p>Giỏ hàng</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active"><a href="#">Giỏ hàng</a></li>
                    </ol>
                </div>
            </nav>

            <div class="cart__wrap-main" style="margin-top: 4rem">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Phân loại hàng</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="product in cart.cart_details">
                            <td>
                                <img ng-src="@{{ product.color.avatar }}" alt="">
                            </td>
                            <td>
                                <a href="#">@{{ product.product.product_name }}</a>
                            </td>
                            <td>
                                @{{ product.color.color_name }}/@{{ product.size.size_name }}
                            </td>
                            <td>@{{ product.price | currency:"":0 }} VNĐ</td>
                            <td>
                                <div class="content__options-amount">
                                    <input ng-click="handlingAmount($event, 0, product); updateCartDetail($event, product)" class="content__options-amount-item btn-sub" type="text" value="-" readonly>
                                    <input class="content__options-amount-item content__options-amount-value"
                                     type="text" value="@{{ product.quantity }}" readonly>
                                    <input ng-click="handlingAmount($event, 1, product); updateCartDetail($event, product)" class="content__options-amount-item btn-plus" type="text" value="+" readonly>
                                </div>
                            </td>
                            <td>@{{ product.price * product.quantity | currency:"":0 }} VNĐ</td>
                            <td>
                                <a href="#"
                                ng-click="removeCartDetail(product)"                                
                                >
                                    <i class="ti-close"></i>
                                </a>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>

                <div class="cart__wrap-main-footer" style="margin-top: 4rem">
                    <div class="row">
                        <div class="col-lg-7"></div>
                        <div class="col-lg-5" style="padding: 2rem; border-radius: 5px; border: 1px solid #e6e6e6">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p style="font-weight: 600">Giỏ hàng: @{{ totalCart }} sản phẩm</p>
                                <p style="font-weight: 600">Tổng tiền: @{{ totalCartItem | currency:"":0 }} VNĐ</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a style="
                                    display: block;
                                    text-align: center;
                                    background: black;
                                    color: white;
                                    padding: 1rem 1.5rem;
                                    font-size: 1.3rem;
                                    border-radius: 3px;
                                    font-weight: 600
                                    " href="/products">Tiếp tục mua hàng</a>
                                </div>
                                <div class="col-lg-6">
                                    <a style="
                                    display: block;
                                    text-align: center;
                                    background: black;
                                    color: white;
                                    padding: 1rem 1.5rem;
                                    font-size: 1.3rem;
                                    border-radius: 3px;
                                    font-weight: 600
                                    " href="/checkout">Tiến hành thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<!-- <script src="/assets/client/dist/controllers/CartController.js"></script> -->

@stop