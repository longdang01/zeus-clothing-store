<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\OrdersDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrdersDetail::with('product','color','size')->get();
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
        $ordersDetail = new OrdersDetail();
        $ordersDetail->orders_id= $request->orders_id;
        $ordersDetail->product_id = $request->product_id;
        $ordersDetail->color_id = $request->color_id;
        $ordersDetail->size_id = $request->size_id;
        $ordersDetail->quantity = $request->quantity;
        $ordersDetail->price = $request->price;

        $ordersDetail->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return OrdersDetail::with('product','color','size')
        ->where("orders_id","=",$id)
        ->get();
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
        DB::table('orders_detail')
              ->where('id', $id)
              ->update([
                'orders_id' => $request->orders_id,
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'quantity' => $request->quantity,
                'price' => $request->price
              ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrdersDetail::findOrFail($id)->delete();
        return "Deleted";
    }

   
}
