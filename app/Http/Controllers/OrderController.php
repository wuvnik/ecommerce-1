<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $completes = DB::select('select * FROM orders  ' );
        return view('cart.completed', ['completes'=>$completes]);
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
        // dd(auth()->id());
        $request->validate([
            'shipping_fullname'=>'required',
            'shipping_state'=>'required',
            'shipping_city'=>'required',
            'shipping_address'=>'required',
            'shipping_phone'=>'required',
            'shipping_postcode'=>'required',
        ]);

        $order=new Order();

        //create order number
        $order->order_number=uniqid('OrderNumber');

        $order->shipping_fullname=$request->input('shipping_fullname');
        $order->shipping_state=$request->input('shipping_state');
        $order->shipping_city=$request->input('shipping_city');
        $order->shipping_address=$request->input('shipping_address');
        $order->shipping_phone=$request->input('shipping_phone');
        $order->shipping_postcode=$request->input('shipping_postcode');

        if(!$request->has('billing_fullname')){
            $order->billing_fullname=$request->input('shipping_fullname');
            $order->billing_state=$request->input('shipping_state');
            $order->billing_city=$request->input('shipping_city');
            $order->billing_address=$request->input('shipping_address');
            $order->billing_phone=$request->input('shipping_phone');
            $order->billing_postcode=$request->input('shipping_postcode');
        }else {
            $order->billing_fullname=$request->input('billing_fullname');
            $order->billing_state=$request->input('billing_state');
            $order->billing_city=$request->input('billing_city');
            $order->billing_address=$request->input('billing_address');
            $order->billing_phone=$request->input('billing_phone');
            $order->billing_postcode=$request->input('billing_postcode');
        }

        $order->grand_total= \Cart::session(auth()->id())->getTotal();
        $order->item_count= \Cart::session(auth()->id())->getContent()->count();

        $order->user_id=auth()->id();
        // $order->status='pending';
        $order->save();
        // dd('order created', $order);

        //save items in the order
        $cartItems=\Cart::session(auth()->id())->getContent();
        // dd($cartItems);

        foreach($cartItems as $item){
            $order->items()->attach($item->id, [
                'price'=>$item->price,
                'quantity'=>$item->quantity,
                ]);
        }

        //PAYMENT
        // if(request('payment_method') == 'debit' ){

        // }

        //empty the cart
        \Cart::session(auth()->id())->clear();
        // return "order completed";
        // return view('cart.completed');
        // $completes = DB::select('select * FROM orders  ' )->where('users.id', auth()->id)->get();
        $completes = Order::where('user_id', '=', auth()->id())->get();
        return view('cart.completed', ['completes'=>$completes]);
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
