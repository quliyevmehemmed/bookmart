@extends('layouts.app1')

@section('content')
<section class="max-w-6xl mx-auto p-8 flex flex-col lg:flex-row items-center lg:items-start gap-12 font-sans">

    <div class="w-full lg:w-1/2 flex justify-center">
        <div class="relative  lg:w-full">
            <img src="img/scooter.jpg" alt="Çatdırılma" class="w-full shadow-sm">
        </div>
    </div>

    <div class="w-full lg:w-1/2">
        <h2 class="text-4xl font-bold text-gray-800 mb-6">Çatdırılma</h2>

        <div class="text-gray-700 leading-relaxed text-sm md:text-base space-y-5">
            <p>
                Məhsul saat **13:00-a dək** sifariş edilərsə həmin gün, 13:00-dan sonra qəbul olunarsa növbəti iş günü sizə **PULSUZ** olaraq çatdırılacaq. İstənilən halda maksimal çatdırılma müddəti 24 iş saatını keçmir.
            </p>

            <p>
                <span class="font-semibold">İstisna (!)</span> Məhsul stokda olmadığı halda çatdırılma müddəti 3-7 iş günü arasında dəyişə bilər. Sifariş zamanı bu nüanslar sizə bildirilir.
            </p>

            <p>
                Sifariş zamanı ünvanı dəqiq göstərməyi və həmin ünvana yaxın ərazini (orientir, nəyin yaxınlığında olması) göstərməyiniz xahiş olunur. Əgər ünvan səhvliyi səbəbindən kuryer sifarişi sizə çatdıra bilməzsə, sifarişiniz mağazaya geri qaytarılacaq və ünvan dəqiqləşdikdən sonra sizə çatdırılacaqdır.
            </p>

            <p>
                Əgər çatdırılma zamanı hər-hansı özəl bir istəyiniz varsa, sifariş zamanı əlavə qeydlərdə bu haqda bildirin və ya müştəri xidmətləri ilə əlaqə saxlayın.
            </p>

            <ul class="list-disc pl-5 space-y-3 mt-4">
                <li>
                    <span class="font-medium">Pulsuz çatdırılma</span>, Bakı şəhəri daxilində **300 manat** və daha çox alış veriş edənlərə şamil olunur.
                </li>
                <li>
                    Bakı ətrafı yerlərə çatdırılma haqqı **5-10 manat** arasında dəyişir.
                </li>
                <li>
                    Rayonlara göndərilmə zamanı yalnız poçtun çatdırılma haqqı hesablanır.
                </li>
            </ul>

            <p class="pt-4 italic text-gray-600">
                Sizdən bayram, qeyri iş günləri, o cümlədən kəskin mövsümü hava şəraitindən asılı olaraq çatdırılma zamanı kiçik ləngimələrə anlayışlı olmağı xahiş edirik.
            </p>
        </div>
    </div>

</section>
@endsection