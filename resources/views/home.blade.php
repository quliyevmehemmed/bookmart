@extends('layouts.app1')

@section('content')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
<style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-pagination-bullet {
        background: gray !important;
        opacity: 1 !important;
    }

    .swiper-pagination-bullet-active {
        background: black !important;
    }
</style>
@endpush


<section class="max-w-[1200px] mx-auto  px-4 ">
    <div class="h-[50vh] md:h-[80vh] py-2">
        <div class="swiper mySwiper w-full h-full  overflow-hidden ">
            <div class="swiper-wrapper">

                <div class="swiper-slide  flex items-center justify-center bg-[#FFF9FE]">
                    <picture>
                        <!-- mobil üçün -->
                        <source srcset="img/slayd1-mobil.webp" media="(max-width: 768px)">

                        <!-- desktop üçün -->
                        <img class="h-full object-contain m-auto" src="img/slayd1.webp" alt="Slide">
                    </picture>
                </div>

                <div class="swiper-slide flex items-center justify-center bg-[#FFF9FE]">
                    <picture>
                        <!-- mobil üçün -->
                        <source srcset="img/slayd2-mobil.webp" media="(max-width: 768px)">

                        <!-- desktop üçün -->
                        <img class="h-full object-contain m-auto" src="img/slayd2.webp" alt="Slide">
                    </picture>
                </div>

                <div class="swiper-slide  flex items-center justify-center p-6 md:p-14 bg-white">
                    <img src="img/slayd3.jpeg" class="h-full object-contain m-auto" alt="Slide 3">
                </div>

                <div class="swiper-slide flex items-center justify-center p-6 md:p-14 bg-white">
                    <img src="img/slayd4.jpeg" class=" w-full h-full object-contain bg-cover m-auto" alt="Slide 4">
                </div>

            </div>

            <div class="swiper-pagination !text-color-brand"></div>

            <div class="swiper-button-next !w-2 md:!w-4 !text-color-brand !mx-4"></div>
            <div class="swiper-button-prev !w-2 md:!w-4 !text-color-brand !mx-4"></div>
        </div>
    </div>

    <div>
        <div class="flex-col flex gap-3 my-2 items-center">
            <h2 class="md:text-4xl text-2xl font-poppins text-center font-semibold">Dövlət orqanları üzrə dərsliklər</h2>
            <div class="border w-10 text-center  "></div>
            <p class="text-3xl font-poppins font-medium">Bookmart</p>
            <a class="font-poppins underline mt-10" href="">HAMISINA BAX</a>
        </div>
    </div>
        
</section>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
@endpush

@endsection