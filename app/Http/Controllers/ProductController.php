<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\ProductType;

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
        $product_types = ProductType::all();
        return view('products.index', compact('products','product_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_types = ProductType::all();
        return view('products.create', compact('product_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'price' => $request->get('price') * 100,
            'product_type_id' => $request->get('product_type_id'),
            'description' => $request->get('description'),
            'link' => $request->get('link') ? $request->get('link') : '',
            'discounted_price' => $request->get('discounted_price') * 100
        ]);
        $product->save();
        return redirect('/products')->with('success', 'Product saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if ($product == 'all') {
            return view('products.all');
        }
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product_types = ProductType::all();
        return view('products.edit', compact('product','product_types'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);

        $product = Product::find($id);
        $product->name =  $request->get('name');
        $product->price = $request->get('price') * 100;
        $product->product_type_id = $request->get('product_type_id');
        $product->description = $request->get('description');
        $product->link = $request->get('link');
        $product->discounted_price = $request->get('discounted_price') * 100;
        $product->save();

        return redirect('/products')->with('success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductList  $productList
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products')->with('success', 'Product deleted!');
    }
}
