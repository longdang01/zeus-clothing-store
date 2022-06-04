<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class apicolor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return color::all();
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
        DB::table('color')->insert([
            'product_id' => $request->product_id,
            'color_name' => $request->color_name,
            'hex' => $request->hex,
            'avatar' => $request->avatar!=null?$request->avatar:"",
            'images' => $request->images!=null?$request->images:""
        ]);
        return DB::table('color')
        ->select('*')
        ->where('product_id','=',$request->product_id)
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
        return color::with("sizes")
        ->where("id","=",$id)
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
        $color = color::find($id);
        DB::table('color')
              ->where('id', $id)
              ->update([
                'color_name' => $request->color_name,
                'hex' => $request->hex,
                'avatar' => $request->avatar!=null||""?$request->avatar:$color->avatar,
                'images' => $request->images!=null?$request->images:$color->images
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
        color::findOrFail($id)->delete();
        return "Deleted";
    }
}
