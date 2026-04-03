<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $governmentCategory = Category::find(17);
        $literatureCategory = Category::find(1);
        $testCategory = Category::find(10);
        $governmentProducts = $this->getProductsByParentCategory(17, 4);
        $literatureProducts = $this->getProductsByParentCategory(1, 4);
        $testProducts = $this->getProductsByParentCategory(10, 4);

        return view('home', compact(
            'products',
            'governmentProducts',
            'literatureProducts',
            'testProducts',
            'governmentCategory',
            'literatureCategory',
            'testCategory'
        ));
    }

    public function show($slug)
    {   
        $product = Product::with('category.parent')->where('slug', $slug)->firstOrFail();
        return view('detail', compact('product'));
    }

    private function getProductsByParentCategory(int $parentCategoryId, int $limit = 4)
    {
        return Product::where(function ($q) use ($parentCategoryId) {
                $q->where('category_id', $parentCategoryId)
                    ->orWhereHas('category', function ($subQ) use ($parentCategoryId) {
                        $subQ->where('parent_id', $parentCategoryId);
                    });
            })
            ->where('status', 1)
            ->latest()
            ->take($limit)
            ->get();
    }
}
