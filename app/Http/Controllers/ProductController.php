<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, $slug = null)
    {
        $query = Product::query()->where('status', 1);
        $category = null;

        if ($request->has('q') && $request->q != '') {
            $searchTerm = $request->q;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('author', 'LIKE', "%{$searchTerm}%");
            });
        }

        if ($slug) {
            $category = Category::where('slug', $slug)
                ->with(['parent', 'subcategories' => function ($q) {
                    $q->withCount('products');
                }])
                ->firstOrFail();

            if ($category->parent_id == null) {
                $query->where(function ($q) use ($category) {
                    $q->where('category_id', $category->id)
                        ->orWhereHas('category', function ($subQ) use ($category) {
                            $subQ->where('parent_id', $category->id);
                        });
                });
            } else {
                $query->where('category_id', $category->id);
            }
        }

        $sort = $request->get('sort');
        if ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'newest') {
            $query->orderBy('created_at', 'desc');
        } else {
            $query->latest();
        }

        $products = $query->paginate(12)->appends($request->query());

        $categories = Category::whereNull('parent_id')->with('subcategories')->get();

        return view('products', compact('products', 'categories', 'category'));
    }

    public function searchAjax(Request $request)
    {
        if ($request->has('q') && $request->q != '') {
            $searchTerm = $request->q;

            // Sadəcə ilk 6 və ya 8 nəticəni gətiririk ki, pəncərə çox uzanmasın
            $products = Product::where('status', 1)
                ->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('author', 'LIKE', "%{$searchTerm}%");
                })
                ->take(8)
                ->get(['id', 'title', 'author', 'price', 'image', 'slug']);

            return response()->json($products);
        }

        return response()->json([]);
    }
}

