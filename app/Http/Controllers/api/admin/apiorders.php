<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class apiorders extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return orders::with(['customer','payment','transport'])->get();
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
        $order = DB::table('orders')->insert([
            'customer_id' => $request->customer_id,
            'payment_id' => $request->payment_id,
            'transport_id' => $request->transport_id,
            'order_date' => Carbon::parse(Carbon::now())->format('Y-m-d'),
            'delivery_address' => $request->delivery_address,
            'note' => $request->note,
            'total' => $request->total,
            'status' => $request->status
        ]);
        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return orders::with('customer','payment','transport','ordersDetail','ordersStatus')
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
        orders::findOrFail($id)->delete();
        return "Deleted";
    }
}
