<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('subCategory')
        ->with('supplier')->with('brand')
        ->with('price')->with('color')->with('size')
        // ->with(['category' => function($query) {
        //     $query->where('category.id', 1);
        // }])
        ->get();

        return [$products, Category::all()];
    }

    public function getProducts(Request $request)
    {
        $products = Product::with('subCategory')->with('supplier')->with('brand')
        ->with('price')->with('color')->with('size');

        if($request->product_name) { 
            $products = $products->where
            ('product_name', 'LIKE', "%$request->product_name%");
        }

        if($request->sub_category_id) { 
            $products = $products->where
            ('sub_category_id', '=', $request->sub_category_id);
        }

        if($request->category_id) {
            $products = $products->whereHas
            ('subCategory', function($query) use($request) {
                return $query->where('category_id', $request->category_id);
            });
        }

        return $products->get();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('subCategory')
        ->with('supplier')->with('brand')
        ->with('price')->with('color')->with('size')
        ->findOrFail($id);
        return $product;
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
        //
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
