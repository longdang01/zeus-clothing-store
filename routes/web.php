<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('client.home.index'); });
Route::get('/home', function () { return view('client.home.index'); });
Route::get('/products', function() { return view('client.product.index'); });
Route::get('/products/{name}', function() { return view('client.detail.index'); });
Route::get('/carts', function() { return view('client.cart.index'); });
Route::get('/checkout', function() { return view('client.checkout.index'); });
Route::get('/orders', function() { return view('client.orders.index'); });


Route::get('/customers/login', function() { return view('client.customer.login'); });
Route::get('/customers/register', function() { return view('client.customer.register'); });

// Route::get('/product', function () { return view('client.product.index'); });

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/admin/index', function () {
    return view('admin.index');
});
Route::get('/admin/category', function () {
    return view('admin.category');
});
Route::get('/admin/brand', function () {
    return view('admin.brand');
});
Route::get('/admin/cart', function () {
    return view('admin.cart');
});
Route::get('/admin/customer', function () {
    return view('admin.customer');
});
Route::get('/admin/product', function () {
    return view('admin.product');
});
Route::get('/admin/order', function () {
    return view('admin.order');
});
Route::get('/admin/staff', function () {
    return view('admin.staff');
}); 
Route::get('/admin/sub_category', function () {
    return view('admin.sub_category');
}); 
Route::get('/admin/news', function () {
    return view('admin.news');
}); 
Route::get('/admin/login', function () {
    return view('admin.login');
}); 
Route::get('/admin/register', function () {
    return view('admin.register');
}); 
Route::get('/admin/payment', function () {
    return view('admin.payment');
}); 
Route::get('/admin/position', function () {
    return view('admin.position');
}); 
Route::get('/admin/role', function () {
    return view('admin.role');
}); 
Route::get('/admin/supplier', function () {
    return view('admin.supplier');
}); 
Route::get('/admin/transport', function () {
    return view('admin.transport');
}); 
