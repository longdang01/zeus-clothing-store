@extends('client.shared.layout')
@section('content')


<div class="container">
    <nav aria-label="breadcrumb">
        <div class="breadcrumb__wrap">
            <p>Trang chủ</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="#">Đăng nhập</a></li>
            </ol>
        </div>
    </nav>
</div>

<section class="shop login section" ng-controller="CustomerController">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2>Đăng nhập</h2>
                    <p>Please register in order to checkout more quickly</p>
                    <!-- Form -->
                    <form class="form" method="post" action="#">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Username<span>*</span></label>
                                    <input type="text" ng-model="user.username" name="username" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mật khẩu<span>*</span></label>
                                    <input type="password" ng-model="user.password" name="password" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <a href="" ng-click="login()" class="btn">Đăng nhập</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Nhớ mật khẩu</label>
                                    </div>
                                    <a href="#" class="lost-pass">Quên mật khẩu?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script src="/assets/client/dist/controllers/CustomerController.js"></script> -->
@stop