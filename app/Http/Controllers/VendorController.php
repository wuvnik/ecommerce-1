<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id=$request->user()->id;

        $products=Product::where('seller_id', $user_id)->paginate(5);

        return view('products.index', 
        compact('products'))->with('i', (request()->input('page', 1)-1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //get seller id
                $seller_id=$request->user()->id;

                //validate
                $request->validate([
                    'product_name'=>'required',
                    'product_title'=>'required',
                    'product_description'=>'required',
                    'product_price'=>'required',
                    'image_path'=>'required|mimes:jpg,png,jpeg|max:5048',
                    'stock'=>'required',
                    // 'seller_id'=>'required'
                ]);
        
                //new name for image file
                $newImageName= time(). '-' .$request->product_name .'.' .$request->image_path->extension();
        
                //move img file to images\public 
                $request->image_path->move(public_path('images'), $newImageName);
        
                // TODO admin approval
        
                //Create product
                $product=Product::create([
                    'product_name'=>$request->input('product_name'),
                    'product_title'=>$request->input('product_title'),
                    'product_description'=>$request->input('product_description'),
                    'product_price'=>$request->input('product_price'),
                    'image_path'=>$newImageName,
                    'stock'=>$request->input('stock'),
                    'seller_id'=>$seller_id,
                ]);
        
                //return index view
                return redirect()->route('vendor.index')
                ->with('success', 'Items successfully uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::where('id', $id)->get();
        // dd($product);
        // return view('products.show')->with('product_name'=>$product->product_name);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        // $prod=Product::where('seller_id', '=', $request->user()->id());
        $product=Product::where('id', $id)->get();
        return view('products.edit', compact('product'));

        // if($product->seller_id == $request->user()->id){
        //     // dd('can edit');
        //     return view('products.edit', compact('product'));
        // }else{
        //     dd("not your item");
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Product $product)
    {
        // dd($request);
        $request->validate([
            'product_name'=>'required',
            'product_title'=>'required',
            'product_description'=>'required',
            'product_price'=>'required',
            'image_path'=>'required',
            'stock'=>'required',
        ]);
    
        // $product->update($request->all());
        Product::where('id', $id)->update([
            'product_name'=>$request->product_name,
            'product_title'=>$request->product_title,
            'product_description'=>$request->product_description,
            'product_price'=>$request->product_price,
            'image_path'=>$request->image_path,
            'stock'=>$request->stock,
        ]);

        return redirect()->route('vendor.index')
        ->with('success', 'Item is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product->delete();
        Product::find($id)->delete();

        return redirect()->route('vendor.index')
        ->with('success', 'Item is successfully deleted');
    }

    public function listings(Product $products){

        $products=Product::latest()->paginate(5);

        return view('testnew', compact('products'));

    }

    public function userShow(Product $product){

        return view('products.showproduct', compact('product'));
    }
}
