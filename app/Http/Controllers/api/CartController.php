<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cart::with('cartDetails')->get();
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
        $cart = $this->getCart($request->customer_id);
        if(!$cart) {
            $cart = new Cart();
            $cart->customer_id = $request->customer_id;
            $cart->status = 1;
            $cart->save();
        }

        $cartDetails = $this->getCartDetail($request, $cart);

        if(!$cartDetails) {
            $cartDetails = new CartDetail();
            $quantity = $request->quantity;
        } else {
            $quantity = $request->quantity + $cartDetails->quantity;
        }
        
        $cartDetails->cart_id = $cart->id;
        $cartDetails->product_id = $request->product_id;
        $cartDetails->color_id = $request->color_id;
        $cartDetails->size_id = $request->size_id;
        $cartDetails->quantity = $quantity;
        $cartDetails->price = $request->price;
        $cartDetails->status = 1;

        $cartDetails->save();
        return $cart;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cart::findOrFail($id);
    }

    public function getCart($customer_id) {
        return Cart::with('cartDetails', 'cartDetails.product',
        'cartDetails.color', 'cartDetails.size')
        ->where('customer_id', $customer_id)->first();
    }

    public function getCartDetail($request, $cart) {
        return CartDetail::with('product')->with('color')->with('size')->
        where('product_id', $request->product_id)->
        where('color_id', $request->color_id)->
        where('size_id', $request->size_id)->
        where('cart_id', $cart->id)
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
    }
}
