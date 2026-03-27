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
        $category = null; // Əgər heç bir kateqoriya seçilməyibsə, null qalsın

        if ($slug) {
            // Eager Loading: Kateqoriyanı çəkəndə onun anasını və 
            // alt kateqoriyalarını (məhsul sayı ilə birgə) yükləyirik.
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

        $products = $query->latest()->paginate(12);

        // Menyu üçün ana kateqoriyalar
        $categories = Category::whereNull('parent_id')->with('subcategories')->get();

        // compact-a 'category' dəyişənini də əlavə etdik
        return view('products', compact('products', 'categories', 'category'));
    }
}
