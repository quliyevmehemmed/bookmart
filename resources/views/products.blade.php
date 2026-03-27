@extends('layouts.app1')

@section('content')

@if(isset($category))
@php
    $parentCategory = $category->parent_id ? $category->parent : $category;
    $siblingCategories = $parentCategory->subcategories;
@endphp

<div class="bg-color-brand w-full py-12 lg:py-24 -mt-[1px] px-4">
    <div class="max-w-[1200px] mx-auto flex flex-col items-center">

        <div class="flex items-center text-white mb-6 lg:mb-10">
            {{-- Əgər əvvəlki səhifə varsa (və ya həmişə görünsün istəyirsənsə) --}}
            <a href="{{ url()->previous() }}" class="text-3xl mr-4 hidden lg:block hover:text-gray-300 transition-colors">
                &larr;
            </a>

            <h1 class="text-4xl lg:text-6xl font-poppins text-center font-bold tracking-wide">{{ $category->name }}</h1>
        </div>
        
        <button id="mobileMenuBtn" class="lg:hidden flex items-center justify-center gap-2 text-white/90 text-[16px] mb-4 hover:text-white transition-colors focus:outline-none">
            Bölmələr
            <svg id="mobileMenuArrow" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <div id="categoriesContainer" class="w-full lg:w-auto overflow-hidden transition-[max-height,opacity] duration-500 ease-in-out max-h-0 opacity-0 lg:max-h-[1000px] lg:opacity-100 lg:overflow-visible">
            
            <div class="flex flex-col lg:flex-row flex-wrap justify-start lg:justify-center items-start lg:items-center gap-x-10 gap-y-6 pt-2 pb-6 lg:py-0 w-full max-w-md lg:max-w-none  px-4 lg:px-0">
                @foreach($siblingCategories as $sibling)
                <a href="{{ route('products.index', $sibling->slug) }}" class="flex flex-col items-start lg:items-center group">
                    <span class="text-white text-[13px] font-bold tracking-wider uppercase transition-opacity duration-300 {{ $category->id == $sibling->id ? 'opacity-100' : 'opacity-60 group-hover:opacity-100' }}">
                        {{ $sibling->name }}
                    </span>
                    <span class="text-[#a4a0c5] text-[12px] mt-1 font-medium">
                        {{ $sibling->products_count ?? $sibling->products->count() }} Məhsul
                    </span>
                </a>
                @endforeach
            </div>

        </div>

    </div>
</div>

<div class="max-w-[1200px] mx-auto px-4 py-6 flex flex-col md:flex-row justify-between items-center border-b border-gray-100">

    <div class="text-[13px] text-gray-500 font-medium w-full md:w-auto text-center md:text-left">
        <a href="/" class="hover:text-black transition-colors">Əsas səhifə</a> /

        <a href="{{ route('products.index', $parentCategory->slug) }}" class="hover:text-black transition-colors">
            {{ $parentCategory->name }}
        </a> /

        <span class="text-black font-semibold">{{ $category->name }}</span>
    </div>

    <div class="flex items-center justify-center md:justify-end gap-6 mt-4 md:mt-0 text-[13px] text-gray-600 font-medium w-full md:w-auto">
        <div class="flex items-center gap-2">
            <span>Göstərilir :</span>
            <span class="text-black font-bold">9</span> /
            <span class="text-black font-bold">12</span> /
            <span>18</span> /
            <span>24</span>
        </div>

        <div class="relative">
            <select class="appearance-none bg-transparent border-b border-gray-300 pb-1 pr-6 focus:outline-none focus:border-black cursor-pointer">
                <option>Çeşidləmə</option>
                <option>Ucuzdan bahaya</option>
                <option>Bahadan ucuza</option>
                <option>Yenilər</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-400">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </div>
    </div>

</div>
@endif

<div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-6 m-6 max-w-[1200px] mx-auto">
    @foreach($products as $product)
    <x-book-card :book="$product" />
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('mobileMenuBtn');
        const container = document.getElementById('categorie sContainer');
        const arrow = document.getElementById('mobileMenuArrow');

        if(btn && container) {
            btn.addEventListener('click', function() {
                if (container.classList.contains('max-h-0')) {
                    // Açılır
                    container.classList.remove('max-h-0', 'opacity-0');
                    container.classList.add('max-h-[1000px]', 'opacity-100'); 
                    arrow.classList.add('rotate-180');
                } else {
                    // Bağlanır
                    container.classList.add('max-h-0', 'opacity-0');
                    container.classList.remove('max-h-[1000px]', 'opacity-100');
                    arrow.classList.remove('rotate-180');
                }
            });
        }
    });
</script>

@endsection