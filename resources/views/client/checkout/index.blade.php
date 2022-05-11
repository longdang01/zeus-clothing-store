@extends('client.shared.layout')
@section('content')

<section class="checkout">
    <div class="container">
        <div class="checkout__wrap">
            <nav aria-label="breadcrumb">
                <div class="breadcrumb__wrap">
                    <p>Thanh toán</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active"><a href="#">Thanh toán</a></li>
                    </ol>
                </div>
            </nav>

            <div ng-controller="CheckoutController" class="checkout__wrap-main" style="margin-top: 4rem">
                <div class="checkout__wrap-main-list" style="margin-top: 2rem">
                    <div class="checkout__wrap-main-header">
                        <p>Danh sách sản phẩm</p>
                        <a data-bs-toggle="collapse" href="#collapseCheckoutList"
                        role="button" aria-expanded="false" aria-controls="collapseCheckoutList"><i class="ti-minus"></i></a>
                    </div>
                    <div class="collapse" id="collapseCheckoutList">
                        <div class="card card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Phân loại hàng</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="product in cart.cart_details">
                                        <td>
                                            <img ng-src="@{{ product.color.avatar }}" 
                                            alt="">
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
                                                <!-- <input ng-click="handlingAmount($event, 0, product); updateCartDetail($event, product)" class="content__options-amount-item btn-sub" type="text" value="-" readonly> -->
                                                <input style="border-left: 1px solid #d6d6d6; border-right: 1px solid #d6d6d6;"
                                                 class="content__options-amount-item content__options-amount-value"
                                                type="text" value="@{{ product.quantity }}" readonly>
                                                <!-- <input ng-click="handlingAmount($event, 1, product); updateCartDetail($event, product)" class="content__options-amount-item btn-plus" type="text" value="+" readonly> -->
                                            </div>
                                        </td>
                                        <td>@{{ product.price * product.quantity | currency:"":0 }} VNĐ</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="checkout__wrap-main-info" style="margin-top: 2rem">
                    <div class="checkout__wrap-main-header">
                        <p>Thông tin thanh toán</p>
                        <a data-bs-toggle="collapse" href="#collapseCheckoutInfo"
                        role="button" aria-expanded="false" aria-controls="collapseCheckoutInfo"><i class="ti-minus"></i></a>
                    </div>
                    <div class="collapse show" id="collapseCheckoutInfo">
                        <div class="card card-body">
                            <div class="row" style="padding: 1rem">
                                <div class="col-md-8 ps-0" style="display: flex; flex-direction: column;
                                justify-content: space-between;
                                padding-right: 3rem" 
                                >
                                    <div class="mb-5">
                                        <div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" placeholder="Họ và tên">
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-7">
                                                    <input type="email" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" placeholder="Số điện thoại">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" id="specific_address" class="form-control" placeholder="Địa chỉ (số nhà, thôn)">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select id="province" class="form-select"
                                                            ng-model="selectedProvince"
                                                            ng-change="selectAddress(0)">
                                                        <option value="">Tỉnh</option>  
                                                        <option ng-repeat="province in listProvinces"
                                                                value="@{{ province.Id }}">
                                                            @{{ province.Name }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select id="district" class="form-select"
                                                            ng-model="selectedDistrict"
                                                            ng-change="selectAddress(1)">
                                                        <option value="">Huyện</option>
                                                        <option ng-repeat="district in listDistricts"
                                                                value="@{{ district.Id }}">
                                                            @{{ district.Name }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select id="commune" class="form-select"
                                                            ng-model="selectedCommune">
                                                        <option value="">Xã</option>
                                                        <option ng-repeat="commune in listCommunes"
                                                                value="@{{ commune.Id }}">
                                                            @{{ commune.Name }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <div style="margin-bottom: 2rem" class="d-flex align-items-center
                                            justify-content-between">
                                            <h3>Phương thức vận chuyển</h3>
                                            <h3 style="margin-left: auto">@{{ transport.fee| currency:"":0 }} VNĐ</h3>
                                        </div>
                                        <div>
                                            <select class="form-select"
                                                    ng-model="selectedTransport"
                                                    ng-change="selectTransport()"
                                                    >
                                                <option value="">Chọn hình thức vận chuyển</option>
                                                <option ng-repeat="transport in transports"
                                                        value="@{{ transport.id }}">
                                                    @{{ transport.transport_type }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div style="margin-bottom: 2rem" class="d-flex align-items-center
                                            justify-content-between">
                                            <h3>Phương thức thanh toán</h3>
                                        </div>
                                        <div>
                                            <select class="form-select"
                                                    ng-model="selectedPayment"
                                                    ng-change="selectPayment()"
                                                    >
                                                <option value="">Chọn hình thức thanh toán</option>
                                                <option ng-repeat="payment in payments"
                                                        value="@{{ payment.id }}">
                                                    @{{ payment.payment_type }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="background: #f9f9f9">
                                    <div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Mã giảm giá (nếu có)">
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <a href="#" class="btn btn-dark d-flex 
                                            justify-content-center align-items-center w-100"
                                            style="font-size: 1.4rem; height: 50px; padding: 1rem 0;"
                                            >Áp dụng</a>
                                        </div>
                                        <div class="mb-3 checkout__total">
                                            <p>Số lượng: </p>
                                            <p>@{{ totalCart }} sản phẩm</p>
                                        </div>
                                        <div class="mb-3 checkout__total">
                                            <p>Tổng tiền: </p>
                                            <p>@{{ totalCartItem | currency:"":0 }} VNĐ</p>
                                        </div>
                                        <div class="mb-3 checkout__total" >
                                            <p>Ship: </p>
                                            <p>+@{{ ship | currency:"":0 }} VNĐ</p>
                                        </div>
                                        <div class="mb-3 checkout__total">
                                            <p>Coupon: </p>
                                            <p>-0 VNĐ</p>
                                        </div>
                                        <div class="mb-3 checkout__total">
                                            <p>Thành tiền: </p>
                                            <p>@{{ totalCartItem + ship | currency:"":0 }} VNĐ</p>
                                        </div>
                                        <div class="mt-3">
                                            <a href="#"
                                            ng-click="purchase()"
                                            class="btn btn-dark d-flex 
                                            justify-content-center align-items-center w-100"
                                            style="font-size: 1.4rem; height: 50px; padding: 1rem 0;"
                                            >Thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- 
<script src="/assets/client/dist/controllers/CartController.js"></script>
<script src="/assets/client/dist/controllers/CheckoutController.js"></script> -->

@stop