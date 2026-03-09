@extends('layouts.admin')

@section('main_content')

<div class="container mx-auto p-6 text-black">

    <h1 class="text-2xl font-bold mb-6">Categories</h1>

    <table class="w-full border border-gray-300">

        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 border">ID</th>
                <th class="p-3 border">Name</th>
                <th class="p-3 border">Slug</th>
                <th class="p-3 border">Parent</th>
                <th class="p-3 border">Status</th>
                <th class="p-3 border">Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach($categories as $category)

            <tr class="text-center">

                <td class="p-2 border">
                    {{ $category->id }}
                </td>

                <td class="p-2 border">
                    {{ $category->name }}
                </td>

                <td class="p-2 border">
                    {{ $category->slug }}
                </td>

                <td class="p-2 border">
                    {{ $category->parent_id ?? '-' }}
                </td>

                <td class="p-2 border">

                    @if($category->status)
                    <span class="text-green-600 font-semibold">Active</span>
                    @else
                    <span class="text-red-600 font-semibold">Deactive   </span>
                    @endif

                </td>

                <td class="p-2 border space-x-2">

                    <a href="{{ route('categories.edit',$category->id) }}"
                        class="bg-blue-500  !no-underline text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('categories.destroy',$category->id) }}"
                        method="POST"
                        class="inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Delete category?')"
                            class="bg-red-500 text-white px-3 py-1 rounded">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>
    <a href="{{ route('categories.create') }}"
        class="bg-green-500 !no-underline text-white px-4 py-2 rounded mt-4 inline-block">

        Add Category

    </a>
    <div class="mt-4">
    {{ $categories->links() }}
</div>
</div>
@endsection