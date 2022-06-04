<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class apiUpload extends Controller
{
    public function uploadFile(Request $request) {
        $data = $request->file('file');
        $filename = $request->file('file')->getClientOriginalName();
        $path = public_path("/upload/".$request->object.'/'.$request->id);
        $data->move($path, $filename);
        return response()->json([
            'success' => 'done',
            'valueimg'=>$data ]);
    }
}
