<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class apiproduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return product::with('subCategory','brand','supplier')->get();
        
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
        DB::table('product')->insert([
            'sub_category_id' => $request->sub_category_id,
            'supplier_id' => $request->supplier_id,
            'brand_id' => $request->brand_id,
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'origin' => $request->origin,
            'material' => $request->material,
            'style' => $request->style,
            'gender' => 1,
            'size_table' => $request->size_table,
            'description' => $request->description
        ]);
        return DB::table('product')
        ->select('*')
        ->orderBy('id', 'desc')
        ->take(1)
        ->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return product::with("color","size","price")
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
        DB::table('product')
        ->where('id', $request->id)
        ->update([
            'sub_category_id' => $request->sub_category_id,
            'supplier_id' => $request->supplier_id,
            'brand_id' => $request->brand_id,
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'origin' => $request->origin,
            'material' => $request->material,
            'style' => $request->style,
            'gender' => 1,
            'size_table' => $request->size_table,
            'description' => $request->description
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
        product::findOrFail($id)->delete();
        return "Deleted";
    }
}
