@extends('client.shared.layout')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="login-wrap p-4 p-md-5">
                <div class="icon d-flex align-items-center justify-content-center">
                    <i class="ti-user"></i>
                </div>
                <h3 class="text-center mb-4">Đăng nhập</h3>
                <form action="#" class="login-form">
                    <div class="form-group">
                        <input type="text" class="form-control rounded-left" placeholder="Username" required="">
                    </div>
                    <div class="form-group d-flex">
                        <input type="password" class="form-control rounded-left" placeholder="Password" required="">
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">
                                <input type="checkbox" checked="">
                                <span style="padding-left: 1rem">
                                    Remember Me
                                </span>
                            </label>
                        </div>
                        <div class="w-50 text-end">
                            <a href="#">Forgot Password ?</a>
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@stop