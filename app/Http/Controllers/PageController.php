<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //Home page kholne function
    public function home()
    {
        $featuredProduct = Product::orderBy('id','desc')->limit(4)->get();
        $momoItems = Product::orderBy('id','desc')->where('category_id',1)->limit(4)->get();
        $thuppaItems = Product::orderBy('id','desc')->where('category_id',2)->limit(4)->get();
        if(Auth::user()){
            $totalCartItem = Cart::Where('user_id',Auth::user()->id)->count();
        }else{
            $totalCartItem = 0;
        }

        return view('frontend.home',compact('featuredProduct','momoItems','thuppaItems','totalCartItem'));
    }

    //About page kholne function
    public function about()
    {
        if(Auth::user()){
            $totalCartItem = Cart::Where('user_id',Auth::user()->id)->count();
        }else{
            $totalCartItem = 0;
        }
        return view('frontend.about',compact('totalCartItem'));
    }

    //blog kholne function
    public function blog()
    {
        return view('frontend.blog');
    }

    //contact page kholne function
    public function contact()
    {
        return view('frontend.contact');
    }

    public function product($id)
    {
       $product = Product::find($id);
       $categories = Category::all();
       if(Auth::user()){
        $totalCartItem = Cart::Where('user_id',Auth::user()->id)->count();
    }else{
        $totalCartItem = 0;
    }
       return view('frontend.product_description',compact('product','categories','totalCartItem'));
    }

    public function category($id)
    {
       $products = Product::where('category_id',$id)->get();
       if(Auth::user()){
        $totalCartItem = Cart::Where('user_id',Auth::user()->id)->count();
        }else{
            $totalCartItem = 0;
        }
       return view('frontend.product',compact('products','totalCartItem'));
    }

    public function cart(Request $request)
    {
        $cart = new Cart();
        $cart->product_id = $request->product_id;
        $cart->qty = $request->qty;
        $cart->selling_price = $request->selling_price;
        $cart->amount = $request->qty * $request->selling_price;
        $cart->user_id = Auth::user()->id;
        $cart->save();
        toast("Item added to cart successfully",'success');
        return redirect()->back();
    }

    public function cartItems()
    {

        if(Auth::user()){
            $totalCartItem = Cart::Where('user_id',Auth::user()->id)->count();
            $cartItems = Cart::where('user_id',Auth::user()->id)->get();
        }else{
            $totalCartItem = 0;
            return redirect('/login');
        }
        return view('frontend.cart',compact('cartItems','totalCartItem'));
    }

    public function cartDelete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        toast("Item deleted from cart successfully",'success');
        return redirect()->back();
    }


}
