@extends('layouts.app1')

@section('content')

<x-page-banner title="HESABIM" >
    <div class="text-[13px] text-white font-medium w-full md:w-auto text-center md:text-left">
        <a href="/" class="text-white transition-colors">ƏSAS SƏHİFƏ &nbsp;</a>/

        <span class="text-white font-semibold">&nbsp;HESABIM</span>
    </div>
</x-page-banner>

<div class="max-w-6xl mx-auto px-4 py-12 flex flex-col md:flex-row gap-8 font-sans">

    <aside class="w-full md:w-1/4">
        <h2 class="text-xl font-bold border-b pb-4 mb-4 uppercase tracking-wider">Hesabım</h2>
        <nav class="flex flex-col space-y-1">
            <a href="{{ route('account') }}" class="bg-gray-100 py-3 px-4 font-medium">Hesabım</a>
            <a href="{{ route('account.orders') }}" class="hover:bg-gray-50 py-2 px-4 transition border-b border-gray-100">Sifarişlər</a>
            <a href="#" class="hover:bg-gray-50 py-2 px-4 transition border-b border-gray-100">Ünvan</a>
            <a href="#" class="hover:bg-gray-50 py-2 px-4 transition border-b border-gray-100">Hesab məlumatları</a>
            <a href="#" class="hover:bg-gray-50 py-2 px-4 transition border-b border-gray-100">İstək siyahısı</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left hover:bg-gray-50 py-3 px-4 transition">Çıxış</button>
            </form>
        </nav>
    </aside>

    <main class="w-full md:w-3/4">

        

        <div class="mb-10 text-gray-700 leading-relaxed">
            <p class="mb-4">Salam <span class="font-bold">{{ $user->name }}</span> ( <span class="text-gray-500 italic">{{ $user->name }} deyilsinizsə?</span>
                <button class="text-black font-semibold underline ml-1">Çıxış</button> )
            </p>
            <p class="text-sm text-gray-600 italic">
                Şəxsi hesabınızdan <span class="font-bold text-gray-800">sifarişlərinizə baxa bilərsiz</span>, şəxsi məlumatları, və <span class="font-bold text-gray-800">istifadəçi adınızı və şifrənizi dəyişə bilərsiz.</span>
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

            <a href="{{ route('account.orders') }}" class="border border-gray-200 p-8 flex flex-col items-center justify-center hover:shadow-md transition group">
                <div class="mb-4 text-gray-400 group-hover:text-black transition">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <span class="text-sm font-medium uppercase tracking-wide">Sifarişlər</span>
            </a>

            <a href="#" class="border border-gray-200 p-8 flex flex-col items-center justify-center hover:shadow-md transition group">
                <div class="mb-4 text-gray-400 group-hover:text-black transition">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <span class="text-sm font-medium uppercase tracking-wide">Ünvan</span>
            </a>

            <a href="#" class="border border-gray-200 p-8 flex flex-col items-center justify-center hover:shadow-md transition group">
                <div class="mb-4 text-gray-400 group-hover:text-black transition">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span class="text-sm font-medium uppercase tracking-wide text-center">Hesab məlumatları</span>
            </a>

            <a href="#" class="border border-gray-200 p-8 flex flex-col items-center justify-center hover:shadow-md transition group">
                <div class="mb-4 text-gray-400 group-hover:text-black transition">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <span class="text-sm font-medium uppercase tracking-wide">İstək siyahısı</span>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="border border-gray-200 p-8 flex flex-col items-center justify-center hover:shadow-md transition group cursor-pointer" onclick="this.submit()">
                @csrf
                <div class="mb-4 text-gray-400 group-hover:text-black transition">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                <span class="text-sm font-medium uppercase tracking-wide">Çıxış</span>
            </form>

        </div>
    </main>
</div>
@endsection
