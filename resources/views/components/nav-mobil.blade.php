<div id="overlay" onclick="toggleMenu(false)" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden transition-opacity duration-300"></div>

<div id="mobile-menu" class="fixed inset-y-0 left-0 w-80 bg-white z-50 transform -translate-x-full transition-transform duration-300 ease-in-out shadow-xl flex flex-col">

    <div class="p-4 border-b">
        <div class="relative">
            <input type="text" placeholder="Axtar..." class="w-full pl-3 pr-10 py-2 border rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
            <span class="absolute right-3 top-2.5 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
        </div>
    </div>

    <div class="flex border-b text-sm font-bold uppercase tracking-wider">
        <button onclick="switchTab('melumat')" id="btn-melumat" class="flex-1 py-4 text-center border-b-2 border-indigo-900 bg-gray-100">Məlumat</button>
        <button onclick="switchTab('bolmeler')" id="btn-bolmeler" class="flex-1 py-4 text-center border-b-2 border-transparent text-gray-500 hover:bg-gray-50">Bölmələr</button>
    </div>

    <div class="flex-1 overflow-y-auto">

        <div id="tab-melumat" class="block">
            <ul class="divide-y divide-gray-100">
                <li><a href="#" class="block px-6 py-4 text-sm font-medium hover:bg-gray-50">TEZLİKLƏ</a></li>
                <li><a href="#" class="block px-6 py-4 text-sm font-medium hover:bg-gray-50 uppercase">Kitab Sifariş Et</a></li>
                <li><a href="#" class="block px-6 py-4 text-sm font-medium hover:bg-gray-50 uppercase">Kitabını Sat</a></li>
                <li><a href="#" class="block px-6 py-4 text-sm font-medium hover:bg-gray-50 uppercase">Hazırlıq kursuna qoşul</a></li>
            </ul>
        </div>

        <div id="tab-bolmeler" class="hidden">
            <ul class="divide-y divide-gray-100">
                <li class="flex items-center justify-between px-6 py-4 hover:bg-gray-50 cursor-pointer">
                    <span class="text-sm font-medium uppercase">Dövlət Orqanları</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                </li>
                <li class="bg-gray-50">
                    <div class="flex items-center justify-between px-6 py-4 border-b border-indigo-900 bg-white">
                        <span class="text-sm font-medium uppercase text-indigo-900">Təhsil pillələri</span>
                        <svg class="w-4 h-4 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <ul class="pl-4">
                        <li><a href="#" class="block px-6 py-3 text-sm text-gray-700 hover:text-indigo-900">Məktəbəqədər</a></li>
                        <li><a href="#" class="block px-6 py-3 text-sm text-gray-700 hover:text-indigo-900">Orta məktəb</a></li>
                        <li><a href="#" class="block px-6 py-3 text-sm text-gray-700 hover:text-indigo-900 font-semibold">Abituriyent</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</div><div id="overlay" onclick="toggleMenu(false)" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden transition-opacity duration-300"></div>

<div id="mobile-menu" class="fixed inset-y-0 left-0 w-80 bg-white z-50 transform -translate-x-full transition-transform duration-300 ease-in-out shadow-xl flex flex-col">

    <div class="p-4 border-b">
        <div class="relative">
            <input type="text" placeholder="Axtar..." class="w-full pl-3 pr-10 py-2 border rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
            <span class="absolute right-3 top-2.5 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
        </div>
    </div>

    <div class="flex border-b text-sm font-bold uppercase tracking-wider">
        <button onclick="switchTab('melumat')" id="btn-melumat" class="flex-1 py-4 text-center border-b-2 border-indigo-900 bg-gray-100">Məlumat</button>
        <button onclick="switchTab('bolmeler')" id="btn-bolmeler" class="flex-1 py-4 text-center border-b-2 border-transparent text-gray-500 hover:bg-gray-50">Bölmələr</button>
    </div>

    <div class="flex-1 overflow-y-auto">

        <div id="tab-melumat" class="block">
            <ul class="divide-y divide-gray-100">
                <li><a href="#" class="block px-6 py-4 text-sm font-medium hover:bg-gray-50">TEZLİKLƏ</a></li>
                <li><a href="#" class="block px-6 py-4 text-sm font-medium hover:bg-gray-50 uppercase">Kitab Sifariş Et</a></li>
                <li><a href="#" class="block px-6 py-4 text-sm font-medium hover:bg-gray-50 uppercase">Kitabını Sat</a></li>
                <li><a href="#" class="block px-6 py-4 text-sm font-medium hover:bg-gray-50 uppercase">Hazırlıq kursuna qoşul</a></li>
            </ul>
        </div>

        <div id="tab-bolmeler" class="hidden">
            <ul class="divide-y divide-gray-100">
                <li class="flex items-center justify-between px-6 py-4 hover:bg-gray-50 cursor-pointer">
                    <span class="text-sm font-medium uppercase">Dövlət Orqanları</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                </li>
                <li class="bg-gray-50">
                    <div class="flex items-center justify-between px-6 py-4 border-b border-indigo-900 bg-white">
                        <span class="text-sm font-medium uppercase text-indigo-900">Təhsil pillələri</span>
                        <svg class="w-4 h-4 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <ul class="pl-4">
                        <li><a href="#" class="block px-6 py-3 text-sm text-gray-700 hover:text-indigo-900">Məktəbəqədər</a></li>
                        <li><a href="#" class="block px-6 py-3 text-sm text-gray-700 hover:text-indigo-900">Orta məktəb</a></li>
                        <li><a href="#" class="block px-6 py-3 text-sm text-gray-700 hover:text-indigo-900 font-semibold">Abituriyent</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</div>