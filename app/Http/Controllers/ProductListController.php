<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class ProductListController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        $product_types = ProductType::all();
        return view('products.all', compact('products','product_types'));
    }
}
