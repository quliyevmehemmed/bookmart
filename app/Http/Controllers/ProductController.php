<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimum 2MB
        ]);

        // 2. Bütün məlumatları massivə yığırıq
        $data = $request->all();

        // 3. Slug yaradırıq (URL üçün)
        $data['slug'] = Str::slug($request->title);

        // 4. Şəkil varsa, onu yükləyirik
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $data['image'] = 'uploads/products/' . $imageName;
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
