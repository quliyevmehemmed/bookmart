@extends('layouts.admin')

@section('main_content')
<div class="p-6 overflow-visible">
    <div class="relative inline-block group z-50">

        <button class="flex items-center justify-between w-64 bg-color-brand text-white px-4 py-3 rounded-t-sm font-bold tracking-wide">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <span class="font-josefin text-[12px]">BÖLMƏLƏR</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <ul class="absolute left-0 w-64 bg-white border border-gray-200 shadow-lg z-[110] 
               hidden group-hover:block  
               transition-all duration-300 ease-in-out transform opacity-0  translate-y-2
               group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">

            @foreach ($categories as $category )
            @php $hasSub = $category->subcategories->isNotEmpty(); @endphp

            <li class="relative group/item border-b border-gray-100">
                <a href="{{ route('admin.products.category', $category->id )}}" class="!no-underline flex items-center justify-between px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors">
                    {{$category->name}}
                    @if ($hasSub)
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    @endif
                </a>
                @if ($hasSub)
                <ul class="absolute left-full top-0 w-64 bg-white border border-gray-200 shadow-lg
                    transition-all duration-300 ease-in-out transform opacity-0  translate-x-2
                    group-hover/item:opacity-100 group-hover/item:visible group-hover/item:translate-x-0">

                    @foreach ($category->subcategories as $sub )
                    <li><a href="{{ route('admin.products.category', $sub->id )}}" class="!no-underline block px-6 py-3 text-sm text-gray-700 hover:bg-gray-50">{{$sub->name}}</a></li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
    <div class="flex justify-between items-center my-6">
        <h1 class="text-2xl font-bold">Books</h1>

        <a href="{{ route('admin.products.create') }}"
            class="bg-color-brand text-white px-4 py-2 rounded-lg hover:bg-green-950">
            + Add Book
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach($products as $product)

        <div class="bg-white shadow-md rounded-xl overflow-hidden">

            <img src="{{ asset('uploads/products/'.$product->image) }}"
                class="w-full h-64 object-cover">

            <div class="p-4">

                <h2 class="font-semibold text-lg">
                    {{ $product->title }}
                </h2>

                <p class="text-gray-500 text-sm">
                    {{ $product->author }}
                </p>

                <p class="text-green-600 font-bold mt-2">
                    {{ $product->price }} ₼
                </p>

                <div class="flex justify-between mt-4">

                    <a href="{{ route('admin.products.show',$product->slug) }}"
                        class="text-blue-600 hover:underline text-sm">
                        View
                    </a>

                    <a href="{{ route('admin.products.edit',$product->id) }}"
                        class="text-yellow-600 hover:underline text-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-600 hover:underline text-sm">
                            Delete
                        </button>
                    </form>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>
@endsection
