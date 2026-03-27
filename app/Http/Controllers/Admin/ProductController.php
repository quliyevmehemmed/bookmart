<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $categoryId = null)
    {
        $query = Product::query();

        if ($categoryId) {

            $category = Category::find($categoryId);

            if ($category->parent_id == null) {

                $query->where(function ($q) use ($categoryId) {
                    // 1. Birbaşa həmin kateqoriyaya aid olan məhsullar
                    $q->where('category_id', $categoryId)
                        // 2. VEYA kateqoriyasının parent_id-si həmin ID olan məhsullar
                        ->orWhereHas('category', function ($q) use ($categoryId) {
                            $q->where('parent_id', $categoryId);
                        });
                });
            } else {
                $query->where('category_id', $categoryId);
            }
        }

        $products = $query->with('category')->latest()->paginate(20);
        $categories = Category::whereNull('parent_id')->with('subcategories')->get();



        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Formada kateqoriyaları seçmək üçün hamısını göndəririk
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Məlumatların düzgünlüyünü yoxlayırıq (Validation)
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 2. Bütün məlumatları massivə yığırıq
        $data = $request->all();

        // 3. Slug yaradırıq (URL üçün)
        $data['slug'] = Str::slug($request->title);

        // 4. Şəkil varsa, onu yükləyirik
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $data['image'] = $imageName;
        }

        // 5. BAZAYA YAZIRIQ (Bütün sütunlar bura daxildir)
        \App\Models\Product::create($data);

        return redirect()->back()->with('success', 'Məhsul bütün məlumatları ilə birlikdə əlavə edildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
