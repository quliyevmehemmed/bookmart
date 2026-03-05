@extends('layouts.app1')

@section('content')
<section class="max-w-6xl mx-auto p-8 flex flex-col lg:flex-row items-center lg:items-start gap-12 font-sans">

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.428490195655!2d49.82558331533261!3d40.37719097937001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d079efb5163%3A0xc7994c27bc060f3!2sBaku%2C%20Azerbaijan!5e0!3m2!1sen!2saz!4v1625500000000!5m2!1sen!2saz"
        class="w-full h-[400px] border-0"
        allowfullscreen=""
        loading="lazy">
    </iframe>



</section>
<section class="max-w-6xl mx-auto p-8 grid grid-cols-1 md:grid-cols-2 gap-16 font-sans">

    <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-8 tracking-wide">ƏLAQƏ MƏLUMATLARI</h2>

        <div class="space-y-6">

            <a href="tel:+994556040027" class="flex items-center gap-4 text-gray-800 hover:text-blue-600 transition-colors group">
                <div class="text-2xl w-8 text-gray-500 group-hover:text-blue-600">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <span class="text-lg font-medium">+994 55 604 00 27</span>
            </a>

            <a href="https://wa.me/994506040027?text=Salam,%20sifarişlə%20bağlı%20məlumat%20almaq%20istəyirəm."
                target="_blank"
                class="flex items-center gap-4 text-gray-800 hover:text-green-600 transition-colors group">
                <div class="text-2xl w-8 text-gray-500 group-hover:text-green-600">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <span class="text-lg font-medium">+994 50 604 00 27</span>
            </a>

            <a href="mailto:info@bookmart.az" class="flex items-center gap-4 text-gray-800 hover:text-blue-500 transition-colors group">
                <div class="text-2xl w-8 text-gray-500 group-hover:text-blue-500">
                    <i class="far fa-envelope"></i>
                </div>
                <span class="text-lg font-medium text-blue-600">info@bookmart.az</span>
            </a>

            <a href="https://www.google.com/maps/search/?api=1&query=Bəsti+Bağırova+12+Bakı"
                target="_blank"
                class="flex items-start gap-4 text-gray-800 hover:text-red-600 transition-colors group">
                <div class="text-2xl w-8 mt-1 text-gray-500 group-hover:text-red-600">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <span class="text-lg font-medium leading-tight">
                    Bakı, Bəsti Bağırova 12 (Məryəm Plaza)
                </span>
            </a>

        </div>
    </div>

    <x-form-query />

</section>
@endsection