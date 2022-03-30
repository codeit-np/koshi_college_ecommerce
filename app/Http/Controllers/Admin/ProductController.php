<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_percent = $request->discount_percent;
        $product->selling_price = $request->price - ($request->price * $request->discount_percent)/100;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if($request->hasFile('image')){
            $file = $request->image;
            $newName = time() . $file->getClientOriginalName();
            $file->move('images',$newName);
            $product->image = "images/$newName";
        }

        $product->save();
        toast("Record Saved Successfully","success");
        return redirect('/product');
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
        $product = Product::find($id);
        $categories = Category::all();
        return view('backend.product.edit',compact('product','categories'));
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
        $product =  Product::find($id);
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_percent = $request->discount_percent;
        $product->selling_price = $request->price - ($request->price * $request->discount_percent)/100;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if($request->hasFile('image')){
            $file = $request->image;
            $newName = time() . $file->getClientOriginalName();
            $file->move('images',$newName);
            $product->image = "images/$newName";
        }

        $product->update();
        toast("Record Saved Successfully","success");
        return redirect('/product');
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
