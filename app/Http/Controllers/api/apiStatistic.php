<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class apiStatistic extends Controller
{
    public function getTopCustomer(Request $request)
    {
        $res = DB::table('orders')
        ->leftJoin('customer','orders.customer_id','=','customer.id')
        ->select('customer_name',DB::raw("SUM(total) as totalprice"))
        ->where(DB::raw('MONTH(orders.created_at)'),$request->month)
        ->groupBy("orders.customer_id","customer.customer_name")
        ->orderBy('totalprice','desc')
        ->take($request->top)
        ->get();
        return $res;
    }
    public function getTopProduct(Request $request)
    {
        $res = DB::table('orders_detail')
        ->leftJoin('product','orders_detail.product_id','=','product.id')
        ->select('orders_detail.product_id','product_name',DB::raw("SUM(price*quantity) as totalprice"),DB::raw("SUM(quantity) as amount"))
        ->where(DB::raw('MONTH(orders_detail.created_at)'),$request->month)
        ->groupBy("orders_detail.product_id","product.product_name")
        ->orderBy('amount','desc')
        ->take($request->top)
        ->get();
        return $res;
    }
    public function getInforProduct(Request $request)
    {
        $res = DB::table('orders_detail')
        ->leftJoin('product','orders_detail.product_id','=','product.id')
        ->select('product_name',DB::raw("SUM(price*quantity) as totalprice"),DB::raw("SUM(quantity) as amount"))
        ->where(DB::raw('MONTH(orders_detail.created_at)'),$request->month)
        ->where('orders_detail.product_id',$request->id)
        ->groupBy("orders_detail.product_id","product.product_name")
        ->orderBy('amount','desc')
        ->get();
        return $res;
    }
}
