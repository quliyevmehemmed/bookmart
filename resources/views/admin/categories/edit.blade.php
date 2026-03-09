@extends('layouts.admin')

@section('main_content')

<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Edit Category</h1>

    <form action="{{ route('categories.update',$category->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label class="block mb-1">Name</label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ $category->name }}"
                class="w-full border p-2"
                required>

        </div>


        <div class="mb-4">

            <label class="block mb-1">Parent Category</label>

            <select name="parent_id" class="w-full border p-2">

                <option value="">Main Category</option>

                @foreach($categories as $cat)

                <option
                    value="{{ $cat->id }}"
                    @if($category->parent_id == $cat->id) selected @endif>

                    {{ $cat->name }}

                </option>

                @endforeach

            </select>

        </div>


        <div class="mb-4">

            <label class="block mb-1">Status</label>

            <select name="status" class="w-full border p-2">

                <option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>

                <option value="0" {{ !$category->status ? 'selected' : '' }}>Deactive </option>

            </select>

        </div>

        <button class="bg-green-500 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>

@endsection