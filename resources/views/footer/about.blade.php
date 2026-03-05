@extends('layouts.app1')

@section('content')
<section class="max-w-6xl mx-auto p-8 flex flex-col md:flex-row items-start gap-12 font-sans">

    <div class="w-full md:w-1/2">
        <div>
            <img src="" alt="photo">
        </div>
    </div>

    <div class="w-full md:w-1/2">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Şirkət haqqında</h2>

        <div class="text-gray-700 leading-relaxed space-y-4 text-sm md:text-base">
            <p>
                <span class="">www.bookmart.az</span> onlayn kitabların satış mərkəzidir. Saytımızda eyni zamanda müxtəlif hazırlıq kurslarına qeydiyyat da edə bilərsiniz.
            </p>
            <p>
                Digər onlayn alış-veriş saytlardan fərqimiz, satdığımız məhsulların Bakıda,
                <span class="">www.bookmart.az</span> saytına məxsus mağazada olmasıdır. Arzu edənlər sifariş etdiyi məhsulu mağazaya yaxınlaşaraq əldə edə bilərlər.
            </p>
        </div>

        <hr class="my-8 border-gray-200">

        <div class="flex items-center gap-3">
            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-blue-600 hover:text-white transition-colors">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-blue-400 hover:text-white transition-colors">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-blue-700 hover:text-white transition-colors">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-green-500 hover:text-white transition-colors">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-blue-500 hover:text-white transition-colors">
                <i class="fab fa-telegram-plane"></i>
            </a>
        </div>
    </div>

</section>
<script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
@endsection