<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return size::all();
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
        DB::table('size')->insert([
            'color_id' => $request->color_id,
            'size_name' => $request->size_name,
            'quantity' => $request->quantity,
            'status' => $request->status
        ]);
        $id =DB::table('size')
        ->select('id')
        ->orderBy('id', 'desc')
        ->take(1)
        ->get();
        return $id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return size::findOrFail($id);
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
        DB::table('size')
              ->where('id', $request->id)
              ->update([
                'size_name' => $request->size_name,
                'quantity' => $request->quantity,
                'status' => $request->status
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
        size::findOrFail($id)->delete();
        return "Deleted";
    }
}
