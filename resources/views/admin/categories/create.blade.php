@extends('layouts.admin')

@section('main_content')

<div class="flex justify-center items-center">
    <div class="container mx-auto p-6 ">
    
        <h1 class="text-2xl font-bold mb-6">Add Category</h1>
    
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
    
            <div class="mb-4">
                <label class="block mb-1">Category Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="w-full border p-2"
                    required>
            </div>
    
    
            <div class="mb-4">
    
                <label class="block mb-1">Parent Category</label>
    
                <select name="parent_id" class="w-full border p-2">
    
                    <option value="">Main Category</option>
    
                    @foreach($categories as $cat)
    
                    <option value="{{ $cat->id }}">
                        {{ $cat->name }}
                    </option>
    
                    @endforeach
    
                </select>
    
            </div>
    
    
            <div class="mb-4">
    
                <label class="block mb-1">Status</label>
    
                <select name="status" class="w-full border p-2">
    
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
    
                </select>
    
            </div>
    
    
            <button class="bg-blue-500 text-white px-4 py-2  rounded">
                Add Category
            </button>
    
        </form>
    
    </div>

</div>

@endsection