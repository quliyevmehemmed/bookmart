@extends('layouts.admin') @section('main_content')

<div class="max-w-[1200px] mx-auto px-4 py-10 bg-white" x-data="{ count: 1 }">
    <nav class="flex justify-between items-center mb-8 text-[13px] text-gray-500">
        <div class="flex items-center space-x-2">
            <a href="#" class="hover:text-black">Əsas səhifə</a>
            <span>/</span>
            <a href="#" class="hover:text-black">
                @if($product->category->parent)
                {{ $product->category->parent->name }},
                @else
                Kateqoriya təyin edilməyib
                @endif
            </a>
            <span>/</span>
            <a href="#" class="hover:text-black">
                @if ($product->category)
                {{ $product->category->name }}
                @else
                Kateqoriya təyin edilməyib
                @endif
            </a>
            <span>/</span>
            <span class="text-gray-400 font-medium italic">{{ $product->title }}, {{ $product->author }}</span>
        </div>
        <div class="flex items-center space-x-4 text-gray-400">
            <button class="hover:text-black transition-colors">&lt;</button>
            <button class="hover:text-black transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z" />
                </svg>
            </button>
            <button class="hover:text-black transition-colors">&gt;</button>
        </div>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
        <div class=" p-2 flex justify-center">
            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->title }}" class="max-h-[500px] object-contain">
        </div>

        <div class="flex flex-col justify-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 tracking-tight">
                {{ $product->title }}, {{ $product->author }}
            </h1>

            <div class="flex items-center space-x-3 mb-2">
                @if($product->old_price && $product->old_price > $product->price)
                <span class="text-lg text-gray-400 line-through font-light flex items-center">
                    {{ number_format($product->old_price, 0) }}
                    <span class="ml-1 leading-none text-xl">₼</span>
                </span>
                @endif

                {{-- Cari qiymət --}}
                <span class="text-2xl font-bold text-[#2D2A5E] flex items-center">
                    {{ number_format($product->price, 0) }}
                    <span class="ml-1 leading-none text-2xl font-medium text-[#2D2A5E]">₼</span>
                </span>
            </div>

            <ul class="space-y-4 mb-10">
                <li class="flex items-center text-gray-600 text-[15px]">
                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span>
                    <span class="font-medium mr-1">Müəllif:</span> {{ $product->author }}
                </li>
                <li class="flex items-center text-gray-600 text-[15px]">
                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span>
                    <span class="font-medium mr-1">Ad:</span> {{ $product->title }}
                </li>
                <li class="flex items-center text-gray-600 text-[15px]">
                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span>
                    <span class="font-medium mr-1">Kateqoriya:</span>

                    @if($product->category)
                    {{-- Əgər bu kateqoriyanın ana kateqoriyası varsa, onu göstər --}}
                    @if($product->category->parent)
                    {{ $product->category->parent->name }},
                    @endif

                    {{-- Öz adını göstər --}}
                    {{ $product->category->name }}
                    @else
                    Kateqoriya təyin edilməyib
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <div class="!max-w-full mx-auto px-4 py-12">
        <div class="flex flex-col items-center mb-10">
            <div class="w-full h-[1px] bg-gray-200"></div>
            <div class="w-48 h-[3px]  bg-color-brand mb-8"></div>
            <h2 class="text-lg font-semibold font-poppins text-color-brand uppercase tracking-widest">
                MƏHSUL HAQQINDA
            </h2>
        </div>

        <div class="text-gray-600 space-y-8 leading-relaxed text-[15px]">

            {{ $product->description}}

        </div>
    </div>
</div>

@endsection