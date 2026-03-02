<div class="hidden max-w-[1200px] px-4 mx-auto lg:flex">

    <div class="relative inline-block group">

        <button class="flex items-center justify-between w-64 bg-color-brand text-white px-4 py-3 rounded-t-sm font-bold tracking-wide">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <span class="font-josefin text-[12px]">BÖLMƏLƏR</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <ul class="absolute left-0 w-64 bg-white border border-gray-200 shadow-lg z-10 
               transition-all duration-300 ease-in-out transform opacity-0 invisible translate-y-2
               group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">

            @foreach ($categories as $category )
            <li class="relative group/item border-b border-gray-100">
                <a href="#" class="flex items-center justify-between px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors">
                    {{$category->name}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <ul class="absolute left-full top-0 w-64 bg-white border border-gray-200 shadow-lg
                    transition-all duration-300 ease-in-out transform opacity-0 invisible translate-x-2
                    group-hover/item:opacity-100 group-hover/item:visible group-hover/item:translate-x-0">
                    <li><a href="#" class="block px-6 py-3 text-sm text-gray-700 hover:bg-gray-50">Alt Bölmə 1</a></li>
                    <li><a href="#" class="block px-6 py-3 text-sm text-gray-700 hover:bg-gray-50">Alt Bölmə 2</a></li>
                </ul>
            </li>
            @endforeach
            <!-- <li class="relative group/item border-b border-gray-100">
                <a href="#" class="flex items-center justify-between px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors">
                    Dövlət orqanları üzrə dərsliklər
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <ul class="absolute left-full top-0 w-64 bg-white border border-gray-200 shadow-lg
                   transition-all duration-300 ease-in-out transform opacity-0 invisible translate-x-2
                   group-hover/item:opacity-100 group-hover/item:visible group-hover/item:translate-x-0">
                    <li><a href="#" class="block px-6 py-3 text-sm text-gray-700 hover:bg-gray-50">Alt Bölmə 1</a></li>
                    <li><a href="#" class="block px-6 py-3 text-sm text-gray-700 hover:bg-gray-50">Alt Bölmə 2</a></li>
                </ul>
            </li>

            <li class="relative group/item border-b border-gray-100">
                <a href="#" class="flex items-center justify-between px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                    Təhsil pillələri üzrə dərsliklər
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <ul class="absolute left-full top-0 w-64 bg-white border border-gray-200 shadow-lg hidden group-hover/item:block min-h-full">
                    <li><a href="#" class="block px-6 py-3 text-md text-gray-800 hover:bg-gray-50">Məktəbəqədər</a></li>
                    <li><a href="#" class="block px-6 py-3 text-md text-gray-800 hover:bg-gray-50">Orta məktəb</a></li>
                    <li><a href="#" class="block px-6 py-3 text-md text-gray-800 hover:bg-gray-50">Abituriyent</a></li>
                    <li><a href="#" class="block px-6 py-3 text-md text-gray-800 hover:bg-gray-50">Magistratura</a></li>
                    <li><a href="#" class="block px-6 py-3 text-md text-gray-800 hover:bg-gray-50">Universitet</a></li>
                    <li><a href="#" class="block px-6 py-3 text-md text-gray-800 hover:bg-gray-50">Digər</a></li>
                </ul>
            </li>

            <li class="border-b border-gray-100">
                <a href="#" class="flex items-center justify-between px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                    Bədii ədəbiyyat
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </li>

            <li class="border-b border-gray-100">
                <a href="#" class="flex items-center justify-between px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                    Test topluları
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </li>

            <li>
                <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">Digər məhsullar</a>
            </li> -->

        </ul>
    </div>
    <nav class="flex items-center  bg-white p-6 font-sans">

        <a href="#" class="text-[#2d2e5f] font-bold text-[12px] tracking-wider uppercase px-8 py-3 hover:opacity-80  rounded-full transition-all hover:bg-[#c3c4d5]">
            Tezliklə
        </a>

        <a href="#" class=" text-[#2d2e5f] font-bold text-[12px] tracking-wider uppercase px-8 py-3 rounded-full transition-all hover:bg-[#c3c4d5]">
            Kitab sifariş et
        </a>

        <a href="#" class="text-[#2d2e5f] font-bold text-[12px] tracking-wider uppercase px-8 py-3 hover:opacity-80 rounded-full transition-all hover:bg-[#c3c4d5]">
            Kitabını sat
        </a>

        <a href="#" class="text-[#2d2e5f] font-bold text-[12px] tracking-wider uppercase px-8 py-3 hover:opacity-80 rounded-full transition-all hover:bg-[#c3c4d5]">
            Kitabını çap et
        </a>

        <a href="#" class="text-[#2d2e5f] font-bold text-[12px] tracking-wider uppercase px-8 py-3 hover:opacity-80 rounded-full transition-all hover:bg-[#c3c4d5]">
            Hazırlıq kursuna qoşul
        </a>

    </nav>
</div>
