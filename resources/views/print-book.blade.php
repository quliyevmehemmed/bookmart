@extends('layouts.app1')

@section('content')

<x-page-banner title="KİTABINI ÇAP ET" >
    <div class="text-[13px] text-white font-medium w-full md:w-auto text-center md:text-left">
        <a href="/" class="text-white transition-colors">ƏSAS SƏHİFƏ &nbsp;</a>/

        <span class="text-white font-semibold">&nbsp;KITABINI ÇAP ET</span>
    </div>
</x-page-banner>


<section class="bg-white max-w-[1200px] mx-auto px-4 ">
    <div class="max-w-[1200px] mx-auto flex flex-col md:flex-row items-center gap-12 mb-16 ">

        <div class="w-full md:w-1/2 flex justify-center">
            <div class="relative w-full max-w-[500px]">
                <img src="img/cap-et.webp" alt="Kitabını sat illüstrasiya" class="w-full h-auto">
            </div>
        </div>

        <div class="w-full md:w-1/2 p-4">
            <div class="max-w-[550px]">
                <h2 class="text-2xl lg:text-5xl font-bold text-[#353154] mb-4 uppercase tracking-tight">
                    KITABINI ÇAP ET
                </h2>

                <div class="mb-8">
                    <svg width="60" height="8" viewBox="0 0 60 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7L7.5 1L14 7L20.5 1L27 7L33.5 1L40 7L46.5 1L53 7L59.5 1" stroke="#353154" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>

                <div class="space-y-6 text-[#4a4a4a] text-2xl lg:text-2xl  leading-relaxed font-medium">
                    <p>
                        Əl yazmalarınız var? Kitabınızın üz qabığı və daxili dizaynını formalaşdırmaq 
                        sizə çətinlik yaradır? Kitabınızı dərc etmək və satışını həyata keçirmək 
                        istəyirsiniz? Elə isə dərhal bizə müraciət edin. Ən uyğun formada və qısa 
                        müddətdə kitabınızın işıq üzü görməsinə dəstək olmaqdan məmnunluq duyarıq!
                    </p>
                </div>
            </div>
        </div>

    </div>
    <x-form-query type="print_book" />
</section>

@endsection