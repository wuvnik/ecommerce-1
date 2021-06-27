<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $cartItems= \Cart::session(auth()->id())->getContent();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Product $product){

        //if guest
        
        if(!auth()->id()){
            return redirect()->route('login');
        }
        //add to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->route('cart.index');
        
    }

    public function remove($itemId){
        $cartItems= \Cart::session(auth()->id())->remove($itemId);
        return back();
    }

    public function update($rowId, Request $request){
        // dd('fsf');
        \Cart::session(auth()->id())->update($rowId, [
            'quantity'=> array(
                'relative'=>false,
                'value'=>request('quantity')
            )
        ]);

        return back();
        // return view('cart.index');
    }

    public function checkout(){
        return view('cart.checkout');
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
        //
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
    public function update2(Request $request, $id)
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
