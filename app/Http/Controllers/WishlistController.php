<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $ids = session('wishlist', []);
        $products =  Product::whereIn('id', $ids)->get();

        return view('wishlist', compact('products'));
    }

    public function add(Product $product)
    {
        $wishlist = session('wishlist', []);

        if (!in_array($product->id, $wishlist, true)) {
            $wishlist[] = $product->id;
        }

        session(['wishlist' => $wishlist]);

        if (request()->expectsJson() || request()->ajax()) {
            return response()->json([
                'in_wishlist' => true,
                'count' => count($wishlist),
            ]);
        }

        return back();
    }

    public function remove(Product $product)
    {
        $wishlist = session('wishlist', []);
        $wishlist = array_values(array_diff($wishlist, [$product->id]));

        session(['wishlist' => $wishlist]);

        if (request()->expectsJson() || request()->ajax()) {
            return response()->json([
                'in_wishlist' => false,
                'count' => count($wishlist),
            ]);
        }

        return back();
    }
}
