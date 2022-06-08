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
use Carbon\Carbon;

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
        ->where('is_active', 1)->get();

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

        return $products->where('is_active', 1)->get();
    }

    public function getNew()
    {
        $products = Product::with('subCategory')
        ->with('supplier')->with('brand')
        ->with('price')->with('color')->with('size')
        ->where('is_active', 1)->orderBy('created_at', 'desc')->take(8)->get();
        return $products;
    }

    public function getBestSeller()
    {
        $products = Product::
        join('orders_detail', 'orders_detail.product_id', '=', 'product.id')
        ->selectRaw('product.id, product.sub_category_id, product.brand_id,
        product.supplier_id, product.product_name, SUM(orders_detail.quantity) AS quantity_sold')
        ->where('is_active', 1)
        ->groupBy('product.id', 'product.sub_category_id', 'product.brand_id',
        'product.supplier_id', 'product.product_name') 
        ->orderByDesc('quantity_sold')
        ->with('subCategory')->with('supplier')
        ->with('brand')->with('price')->with('color')->with('size')->take(8)->get();

        return $products;
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
            'description' => $request->description,
            'is_active' => 1,
            'created_at' => Carbon::parse(Carbon::now()),
            'updated_at'=> Carbon::parse(Carbon::now()),
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
        $product = Product::with('subCategory')
        ->with('supplier')->with('brand')
        ->with('price')->with('color')->with('size')
        ->where('is_active', 1)->findOrFail($id);
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
            'description' => $request->description,
            'is_active' => $request->is_active,
            'updated_at'=> Carbon::parse(Carbon::now()),
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
