<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Size;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Orders::with(['ordersDetails','customer','payment','transport'])->get();
    }

    public function getOrders($customer_id) {
        return Orders::with('ordersDetails', 'ordersDetails.product',
        'ordersDetails.color', 'ordersDetails.size')->with('customer')->with('payment')
        ->with('transport')->where('customer_id', $customer_id)
        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orders = new Orders();
        $orders->payment_id= $request->payment_id;
        $orders->transport_id = $request->transport_id;
        $orders->customer_id = $request->customer_id;
        $orders->order_date = new DateTime();
        $orders->delivery_address = $request->delivery_address;
        $orders->note = '';
        $orders->total = $request->total;
        $orders->status = 1;

        $orders->save();

        //get list cartDetails
        // $cart = (new CartController)->getCart($request->customer_id);
        // $cartDetails = $cart->cart_details;
        $cartDetails = $request->cartDetails;
        
        foreach($cartDetails as $item) {
            $ordersDetail = new OrdersDetail();
            $ordersDetail->orders_id= $orders->id;
            $ordersDetail->product_id = $item['product_id'];
            $ordersDetail->color_id = $item['color_id'];
            $ordersDetail->size_id = $item['size_id'];
            $ordersDetail->quantity = $item['quantity'];
            $ordersDetail->price = $item['price'];
            
            //update size
            $size = new Size();
            $size->updateSize($item, 1);

            $ordersDetail->save();
        }

        //remove cart after order
        DB::table("cart_detail")->where("cart_id", $cartDetails[0]['cart_id'])->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return orders::with('customer','payment','transport','ordersDetails','ordersStatus')
        ->where("id","=",$id)
        ->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('orders')
        ->where('id', $id)
        ->update([
          'status' => (int)$request->status
        ]);
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = $this->show($id); 

        foreach($orders->ordersDetails as $item) {
            $size = new Size();
            $size->updateSize($item, 2);
        }
        
        $orders->delete();
        DB::table("orders_detail")->where("orders_id", $id)->delete();
    }
}
