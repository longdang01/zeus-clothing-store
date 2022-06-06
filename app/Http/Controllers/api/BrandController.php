<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        return Brand::all();
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
        DB::table('brand')->insert([
            'brand_name' => $request->brand_name,
            'description' => $request->description
        ]);
        return Brand::orderBy('id', 'desc')
                ->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Brand::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('brand')
              ->where('id', $request->id)
              ->update(['brand_name' => $request->brand_name,'description' => $request->description]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::findOrFail($id)->delete();
        return "Deleted";
    }
}
