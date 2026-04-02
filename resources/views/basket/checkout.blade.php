@extends('layouts.app1') @section('content')

<div class="container mx-auto px-4 py-12">
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="flex flex-col lg:flex-row gap-8">

            <div class="w-full lg:w-2/3">
                <h2 class="text-2xl font-bold mb-8 text-gray-800 uppercase tracking-tight">SİFARİŞÇİ MƏLUMATLARI</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ad və Soyad <span class="text-red-500">*</span></label>
                        <input type="text" name="fullname" required class="w-full border border-gray-300 p-3 rounded-sm focus:ring-1 focus:ring-[#2D2A5E] outline-none" placeholder="Ad və Soyad">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ünvan <span class="text-red-500">*</span></label>
                        <input type="text" name="address" required class="w-full border border-gray-300 p-3 rounded-sm focus:ring-1 focus:ring-[#2D2A5E] outline-none" placeholder="Bina, küçə, ev və s.">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Əlaqə nömrəsi <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" required class="w-full border border-gray-300 p-3 rounded-sm focus:ring-1 focus:ring-[#2D2A5E] outline-none" placeholder="050 000 00 00">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" required class="w-full border border-gray-300 p-3 rounded-sm focus:ring-1 focus:ring-[#2D2A5E] outline-none" placeholder="nümunə@mail.com">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Qeyd (istəyə görə)</label>
                        <textarea name="note" rows="5" class="w-full border border-gray-300 p-3 rounded-sm focus:ring-1 focus:ring-[#2D2A5E] outline-none" placeholder="Sifarişiniz və ya çatdırılma haqqında əlavə qeyd.."></textarea>
                    </div>
                    <input type="hidden" name="shipping_method" id="selected-shipping-method" value="">
                    <input type="hidden" name="shipping_price" id="selected-shipping-price" value="0">
                </div>
            </div>

            <div class="w-full lg:w-1/3">
                <div class="bg-[#F9F9F9] p-8 border-t-4 border-[#2D2A5E] shadow-sm">
                    <h2 class="text-xl font-bold mb-6 text-gray-800 text-center uppercase tracking-wider">SİFARİŞ MƏLUMATLARI</h2>

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-xs font-bold text-gray-400 uppercase border-b pb-2">
                            <span>MƏHSUL</span>
                            <span>CƏMİ</span>
                        </div>

                        @foreach($card as $id => $details)
                        <div class="flex justify-between items-start gap-4 py-2">
                            <span class="text-sm text-gray-600">{{ $details['title'] }} × {{ $details['quantity'] }}</span>
                            <span class="text-sm font-bold text-gray-800">{{ $details['price'] * $details['quantity'] }} ₼</span>
                        </div>
                        @endforeach

                        <div class="flex justify-between items-center py-2 border-t border-dashed border-gray-200 text-gray-600">
                            <span class="text-sm">Çatdırılma ({{ $shipping['method'] }})</span>
                            <span class="text-sm font-bold">{{ $shipping['price'] }} ₼</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-4 border-t border-gray-300 mb-8">
                        <span class="text-lg font-bold text-gray-800">Ümumi</span>
                        <span class="text-2xl font-bold text-[#2D2A5E]">{{ $total }} ₼</span>
                    </div>



                    <button type="submit" class="w-full bg-[#2D2A5E] text-white py-4 font-bold tracking-widest text-xs uppercase hover:bg-black transition-all rounded-sm shadow-md">
                        SİFARİŞ VER
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>

@endsection