<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('parent')
            ->latest()
            ->paginate(10); // Səhifələmə (Pagination) vacibdir

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);

        Category::create([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'parent_id' => $request->parent_id,

            'status' => $request->status

        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $categories = Category::where('id', '!=', $id)->get();

        return view('admin.categories.edit', compact('category', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        $category->name = $request->name;

        $category->slug = Str::slug($request->name);

        $category->parent_id = $request->parent_id;

        $category->status = $request->status;

        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        try {
            $category->delete();
        } catch (\Exception $e) {
            return back()->with('error', 'Bu kategoriyaya bağlı məhsullar var');
        }

        return back()->with('success', 'Kategoriya silindi!');
    }
}
