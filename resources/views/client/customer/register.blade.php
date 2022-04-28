@extends('client.shared.layout')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="login-wrap p-4 p-md-5">
                <div class="icon d-flex align-items-center justify-content-center">
                    <i class="ti-user"></i>
                </div>
                <h3 class="text-center mb-4">Đăng ký</h3>
                <form action="#" class="login-form">
                    <div class="form-group">
                        <input type="text" class="form-control rounded-left" placeholder="Họ và tên" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control rounded-left" placeholder="Địa chỉ" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control rounded-left" placeholder="Số điện thoại" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control rounded-left" placeholder="Username" required="">
                    </div>
                    <div class="form-group d-flex">
                        <input type="password" class="form-control rounded-left" placeholder="Mật khẩu" required="">
                    </div>
                    <div class="form-group d-flex">
                        <input type="password" class="form-control rounded-left" placeholder="Xác minh mật khẩu" required="">
                    </div>
                    
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@stop