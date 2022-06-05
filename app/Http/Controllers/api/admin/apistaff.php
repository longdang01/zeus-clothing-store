<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class apistaff extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return staff::with('users','position','role')->get();
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
        DB::table('staff')->insert([
            'username' => $request->username,
            'position_id' => $request->position_id,
            'role_id' => $request->role_id,
            'staff_name' => $request->staff_name,
            'picture' => $request->picture!=null?$request->picture:"",
            'dob' => Carbon::parse($request->dob)->format('Y-m-d'),
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        return staff::with('users',"role","position")
        ->where('username','=',$request->username)
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
        return staff::with('users')
        ->where('id','=',$id)
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
        DB::table('staff')
              ->where('id', $request->id)
              ->update([
                'position_id' => $request->position_id,
                'role_id' => $request->role_id,
                'staff_name' => $request->staff_name,
                'picture' => $request->picture!=null?$request->picture:"",
                'dob' => Carbon::parse($request->dob)->format('Y-m-d'),
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email
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
        staff::findOrFail($id)->delete();
        return "Deleted";
    }
}
