@extends('client.shared.layout')
@section('content')


<div class="container">
    <nav aria-label="breadcrumb">
        <div class="breadcrumb__wrap">
            <p>Trang chủ</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="#">Đăng ký</a></li>
            </ol>
        </div>
    </nav>
</div>

<section class="shop register section" ng-controller="CustomerController">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="register-form">
                    <h2>Đăng ký</h2>
                    <p>Please register in order to checkout more quickly</p>
                    <!-- Form -->
                    <form class="form" method="post" action="#">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Họ tên<span>*</span></label>
                                    <input type="text" ng-model="customer.customer_name"
                                     name="name" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Username<span>*</span></label>
                                    <input type="text" ng-model="customer.username" 
                                    name="text" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mật khẩu<span>*</span></label>
                                    <input type="password" ng-model="customer.password" 
                                    name="password" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Xác minh mật khẩu<span>*</span></label>
                                    <input type="password" ng-model="confirmPassword" name="confirmPassword" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <a href="" ng-click="register()" class="btn">Đăng ký</a>
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

<div class="modal fade" id="notify" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thông báo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p style="font-size: 1.4rem;" >@{{ notify }}</p>
      </div>
      <div class="modal-footer">
        <a style="font-size: 1.4rem; padding: 1rem 1.5rem;" href="" onclick="location.reload()" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</a>
        <a style="font-size: 1.4rem; padding: 1rem 1.5rem; background: #d36942;" href="/customers/login" class="btn btn-primary">Đăng nhập</a>
      </div>
    </div>
  </div>
</div>

<!-- <script src="/assets/client/dist/controllers/CustomerController.js"></script> -->

@stop