<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('backend.order.index',compact('orders'));
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
        //Getting Cart Items
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        //Total Amount
        $sum = Cart::where('user_id',Auth::user()->id)->sum('amount');

        //First Step Save in Order Table
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->total = $sum;
        $order->save();

        foreach($carts as $cart){
            $od = new OrderDescription();
            $od->order_id = $order->id;
            $od->product_id = $cart->product_id;
            $od->qty = $cart->qty;
            $od->rate = $cart->selling_price;
            $od->amount = $cart->amount;
            $od->save();
        }

        foreach($carts as $cart){
            $cart->delete();
        }
        toast("You order has been placed",'success');
        return redirect('/');

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
