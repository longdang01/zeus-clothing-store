<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\OrdersStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class apiorders_status extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DB::table('orders_status')
            ->where('orders_id','=',$request->orders_id,'and','active','=',1)
            ->update([
            'active' => 0
        ]);
        DB::table('orders_status')->insert([
            'orders_id' => $request->orders_id,
            'status_name' => $request->status_name,
            'date_start' => Carbon::parse(Carbon::now())->format('Y-m-d h:m:s'),
            'active' => 1
        ]);  
        return DB::table("orders_status")
        ->select('*')
        ->where('orders_id','=',$request->orders_id)
        ->where('active','=','1')
        ->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::table("orders_status")->where("orders_id","=",$id)->get();
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
    public function update(Request $request)
    {
        DB::table('orders_status')
            ->where('id','=',$request->id)
            ->update([
            'active' => 0
        ]);
        $order_status = DB::table('orders_status')->insert([
            'orders_id' => $request->orders_id,
            'status_name' => $request->status_name,
            'date_start' => Carbon::parse(Carbon::now())->format('Y-m-d'),
            'active' => 1
        ]);      
        return $order_status;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
