@extends('layouts.app1')

@section('content')


<section class="bg-white max-w-[1200px] px-4 ">
    <div class="max-w-[1200px] mx-auto flex flex-col md:flex-row items-center gap-12 mb-16 ">
        
        <div class="w-full md:w-1/2 flex justify-center">
            <div class="relative w-full max-w-[500px]">
                <img src="img/kitabi-sat.webp" alt="Kitabını sat illüstrasiya" class="w-full h-auto">
            </div>
        </div>

        <div class="w-full md:w-1/2 p-4">
            <div class="max-w-[550px]">
                <h2 class="text-2xl lg:text-5xl font-bold text-[#353154] mb-4 uppercase tracking-tight">
                    KİTABINI SAT
                </h2>

                <div class="mb-8">
                    <svg width="60" height="8" viewBox="0 0 60 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7L7.5 1L14 7L20.5 1L27 7L33.5 1L40 7L46.5 1L53 7L59.5 1" stroke="#353154" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <div class="space-y-6 text-[#4a4a4a] text-2xl lg:text-2xl pr-12 leading-relaxed font-medium">
                    <p>
                        Dəyərli müəllif! Müəllifi olduğunuz kitabı bizim onlayn mağazamızda satışa təqdim edə bilərsiniz.
                        Müəlliflik hüquqları Azərbaycan Respublikasının Qanunvericiliyinə uyğun olaraq qorunmaqdadır. 
                        Kitabınız sizin müəyyən etdiyiniz qiymətdə (kitabın arxasında müəyyən edilmiş konkret qiymət və ya müqavilə yolu ilə) onlayn mağazamızda satışa çıxarılacaqdır. 
                        Sizə yaradıcılıq fəaliyyətinizdə uğurlar arzu edirik!
                    </p>
                </div>
            </div>
        </div>

    </div>
    <x-form-query type="sell_book" />
</section>

@endsection