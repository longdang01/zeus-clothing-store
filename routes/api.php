<?php

use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\CartDetailController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\OrdersController;
use App\Http\Controllers\api\OrdersDetailController;
use App\Http\Controllers\api\PaymentController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\StockController;
use App\Http\Controllers\api\SubCategoryController;
use App\Http\Controllers\api\TransportController;
use App\Http\Controllers\api\UsersController;
use App\Http\Controllers\api\admin\apicategory;
use App\Http\Controllers\api\admin\apibrand;
use App\Http\Controllers\api\admin\apicart;
use App\Http\Controllers\api\admin\apisub_category;
use App\Http\Controllers\api\admin\apiprice;
use App\Http\Controllers\api\admin\apisupplier;
use App\Http\Controllers\api\admin\apicustomer;
use App\Http\Controllers\api\admin\apicolor;
use App\Http\Controllers\api\admin\apinews;
use App\Http\Controllers\api\admin\apisize;
use App\Http\Controllers\api\admin\apiproduct;
use App\Http\Controllers\api\admin\apiorders;
use App\Http\Controllers\api\admin\apiorders_detail;
use App\Http\Controllers\api\admin\apiorders_status;
use App\Http\Controllers\api\admin\apipayment;
use App\Http\Controllers\api\admin\apiposition;
use App\Http\Controllers\api\admin\apirole;
use App\Http\Controllers\api\admin\apistaff;
use App\Http\Controllers\api\admin\apitransport;
use App\Http\Controllers\api\admin\apiUpload;
use App\Http\Controllers\api\admin\apiusers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', ProductController::class);



Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubCategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('users', UsersController::class);   
Route::resource('carts', CartController::class);
Route::resource('cartdetails', CartDetailController::class);
Route::resource('transports', TransportController::class);
Route::resource('payments', PaymentController::class);
Route::resource('orderss', OrdersController::class);
Route::resource('ordersDetails', OrdersDetailController::class);

Route::get('product/get-products', [ProductController::class, 'getProducts']);
Route::get('product/get-new', [ProductController::class, 'getNew']);
Route::get('product/get-best-seller', [ProductController::class, 'getBestSeller']);
Route::get('cart/get-cart/{customer}', [CartController::class, 'getCart']);
Route::get('orders/get-orders/{customer}', [OrdersController::class, 'getOrders']);


Route::resource('category',apicategory::class);
Route::resource('brand',apibrand::class);
Route::resource('cart',apicart::class);
Route::resource('customer',apicustomer::class);
Route::resource('sub_category',apisub_category::class);
Route::resource('price',apiprice::class);
Route::resource('supplier',apisupplier::class);
Route::resource('color',apicolor::class);
Route::resource('size',apisize::class);
Route::resource('product',apiproduct::class);
Route::resource('order',apiorders::class);
Route::resource('order_detail',apiorders_detail::class);
Route::resource('order_status',apiorders_status::class);
Route::resource('staff',apistaff::class);
Route::resource('position',apiposition::class);
Route::resource('role',apirole::class);
Route::resource('user',apiusers::class);
Route::resource('news',apinews::class);
Route::resource('payment',apipayment::class);
Route::resource('position',apiposition::class);
Route::resource('role',apirole::class);
Route::resource('transport',apitransport::class);
Route::post('upload',[apiUpload::class, "uploadFile"]);
Route::post('user/getbyusername',[apiusers::class, "GetbyUsername"]);


//[ not used ]
Route::resource('stocks', StockController::class);

