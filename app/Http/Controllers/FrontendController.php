<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function show($slug)
    {   
        $product = Product::with('category.parent')->where('slug', $slug)->firstOrFail();
        return view('detail', compact('product'));
    }
}
