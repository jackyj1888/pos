<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = null;
        if($request->has('q'))
        {
            $products= Product::where('name','like',"%$request->q%")->get();
        } else{
            $products= Product::all();
        }
        if($request->has('id') && $request->filled('id')){
            $product = Product::find($request->id);
            $showDialogShow= true;
        }
        else{
            $product = null;
            $showDialogShow= false;
        }
        $categories = Category::all(['id','name']);
        return Inertia::render('Product/Index',[
            'products' => $products,
            'categories' => $categories,
            'q' => $request->q,
            'product' => $product,
            'showDialogShow' => $showDialogShow,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]));
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product -> delete();

        return redirect()-> route('product.index');
    }
}
