@extends('layouts.app1')

@section('content')

<x-page-banner title="ISTEK SIYAHISI">
    <div class="text-[13px] text-white w-full md:w-auto text-center md:text-left">
        <a href="/" class="text-white transition-colors">ESAS SEHIFE&nbsp;</a>/
        <span class="text-white font-semibold">&nbsp;ISTEK SIYAHISI</span>
    </div>
</x-page-banner>

<section class="bg-white max-w-[1200px] mx-auto px-4">
    <div class="py-12">
        <h2 class="text-2xl lg:text-4xl font-bold text-[#353154] mb-6 uppercase tracking-tight">ISTEK SIYAHISI</h2>

        @if($products->isEmpty())
        <p class="text-[#4a4a4a] text-lg leading-relaxed">
            Hazirda siyahiniz bosdur.
        </p>
        @else
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($products as $product)
            <x-book-card :book="$product" />
            @endforeach
        </div>
        @endif
    </div>
</section>

@endsection
