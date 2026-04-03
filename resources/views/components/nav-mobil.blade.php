<div class="hidden max-w-[1200px] gap-4 px-4 mx-auto lg:flex">
</div>
<div class="hidden lg:block border-b"></div>





<div id="mobileMenuSidebar" class="fixed top-0 left-0 h-full w-[300px] bg-white z-50 transform -translate-x-full transition-transform duration-300 overflow-y-auto flex flex-col">

    <div class="p-4 border-b border-gray-100 flex items-center justify-between">
        <div class="relative w-full mr-2">
            <form action="{{ route('products.index') }}" method="GET" class="relative">
                <input
                    type="text"
                    name="q"
                    id="mobileLiveSearchInput"
                    value="{{ request()->get('q') }}"
                    autocomplete="off"
                    placeholder="Axtar ..."
                    class="w-full bg-transparent text-sm text-gray-700 py-2 pr-8 focus:outline-none placeholder-gray-500">
                <button type="submit" class="absolute right-0 top-1/2 -translate-y-1/2 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>

            <div id="mobileSearchDropdown" class="absolute z-50 w-full bg-white border mt-2 shadow-lg max-h-96 overflow-y-auto hidden">
                <div id="mobileSearchResults" class="grid grid-cols-1 gap-2 p-3"></div>
                <div id="mobileViewAllContainer" class="border-t p-3 text-center hidden">
                    <a href="#" id="mobileViewAllBtn" class="font-semibold hover:underline">Butun neticelere bax</a>
                </div>
            </div>
        </div>
        <button id="mobileMenuCloseBtn" class="text-gray-500 hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div class="flex text-[12px] font-bold tracking-wider text-[#333333]">
        <button id="tabInfoBtn" class="w-1/2 py-4 text-center border-b-2 border-transparent bg-gray-100 uppercase transition-colors">
            Məlumat
        </button>
        <button id="tabCategoriesBtn" class="w-1/2 py-4 text-center border-b-2 border-[#302e52] bg-gray-100 uppercase transition-colors">
            Bölmələr
        </button>
    </div>

    <div class="flex-grow bg-white">

        <div id="tabInfoContent" class="hidden flex-col">
            <ul class="text-[13px] text-[#333333] font-medium tracking-wide">
                <li class="border-b border-gray-100"><a href="#" class="block py-4 px-4 uppercase hover:text-[#302e52]">Tezliklə</a></li>
                <li class="border-b border-gray-100"><a href="#" class="block py-4 px-4 uppercase hover:text-[#302e52]">Kitab sifariş et</a></li>
                <li class="border-b border-gray-100"><a href="{{ route('sell.book') }}" class="block py-4 px-4 uppercase hover:text-[#302e52]">Kitabını sat</a></li>
                <li class="border-b border-gray-100"><a href="{{ route('print.book') }}" class="block py-4 px-4 uppercase hover:text-[#302e52]">Kitabını çap et</a></li>
                <li class="border-b border-gray-100"><a href="#" class="block py-4 px-4 uppercase hover:text-[#302e52]">Hazırlıq kursuna qoşul</a></li>
            </ul>
        </div>

        <div id="tabCategoriesContent" class="flex flex-col">
            <ul class="text-[13px] text-[#333333] font-medium tracking-wide">

                @foreach ($categories as $category)
                @php $hasSub = $category->subcategories->isNotEmpty(); @endphp

                <li class="border-b border-gray-100 relative">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('products.index', $category->slug) }}" class="flex-grow py-4 px-4 uppercase hover:text-[#302e52]">
                            {{ $category->name }}
                        </a>

                        @if ($hasSub)
                        <button class="accordion-btn p-4 border-l border-gray-100 hover:bg-gray-50 focus:outline-none" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 transition-transform duration-300 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                        @endif
                    </div>

                    @if ($hasSub)
                    <div class="accordion-content hidden bg-[#302e52] text-white">
                        <ul class="py-2">
                            @foreach ($category->subcategories as $sub)
                            <li>
                                <a href="{{ route('products.index', $sub->slug) }}" class="block py-3 px-6 text-[13px] hover:bg-[#3d3b66] transition-colors">
                                    {{ $sub->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </li>
                @endforeach

                <li class="border-b border-gray-100">
                    <a href="#" class="flex items-center gap-3 py-4 px-4 uppercase hover:text-[#302e52]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        İstək Siyahısı
                    </a>
                </li>
                <li class="border-b border-gray-100">
                    <a href="#" class="flex items-center gap-3 py-4 px-4 uppercase hover:text-[#302e52]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Daxil ol / Qeydiyyat
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // --- 1. SİDEBAR AÇILIB BAĞLANMASI ---
        const openBtn = document.getElementById('mobileMenuOpenBtn');
        const closeBtn = document.getElementById('mobileMenuCloseBtn');
        const sidebar = document.getElementById('mobileMenuSidebar');
        const overlay = document.getElementById('mobileMenuOverlay');

        function toggleMenu() {
            if (sidebar.classList.contains('-translate-x-full')) {
                // Menyunu Aç
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.add('opacity-100'), 10);
                document.body.style.overflow = 'hidden'; // Arxada scroll-u bağla
            } else {
                // Menyunu Bağla
                sidebar.classList.add('-translate-x-full');
                overlay.classList.remove('opacity-100');
                setTimeout(() => overlay.classList.add('hidden'), 300);
                document.body.style.overflow = ''; // Scroll-u bərpa et
            }
        }

        if (openBtn) openBtn.addEventListener('click', toggleMenu);
        if (closeBtn) closeBtn.addEventListener('click', toggleMenu);
        if (overlay) overlay.addEventListener('click', toggleMenu);


        // --- 2. TABS (MƏLUMAT və BÖLMƏLƏR) ---
        const tabInfoBtn = document.getElementById('tabInfoBtn');
        const tabCategoriesBtn = document.getElementById('tabCategoriesBtn');
        const tabInfoContent = document.getElementById('tabInfoContent');
        const tabCategoriesContent = document.getElementById('tabCategoriesContent');

        function switchTab(tab) {
            if (tab === 'info') {
                tabInfoContent.classList.remove('hidden');
                tabInfoContent.classList.add('flex');
                tabCategoriesContent.classList.add('hidden');
                tabCategoriesContent.classList.remove('flex');

                tabInfoBtn.classList.replace('border-transparent', 'border-[#302e52]');
                tabCategoriesBtn.classList.replace('border-[#302e52]', 'border-transparent');
            } else {
                tabCategoriesContent.classList.remove('hidden');
                tabCategoriesContent.classList.add('flex');
                tabInfoContent.classList.add('hidden');
                tabInfoContent.classList.remove('flex');

                tabCategoriesBtn.classList.replace('border-transparent', 'border-[#302e52]');
                tabInfoBtn.classList.replace('border-[#302e52]', 'border-transparent');
            }
        }

        tabInfoBtn.addEventListener('click', () => switchTab('info'));
        tabCategoriesBtn.addEventListener('click', () => switchTab('categories'));


        // --- 3. AKKORDEON (Alt kateqoriyaları açmaq üçün) ---
        const accordionBtns = document.querySelectorAll('.accordion-btn');

        accordionBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault(); // Default link davranışını qoru amma aşağı aç

                const content = this.parentElement.nextElementSibling;
                const icon = this.querySelector('svg');

                // Əgər açıqdırsa, bağla
                if (!content.classList.contains('hidden')) {
                    content.classList.add('hidden');
                    icon.classList.remove('rotate-90');
                    this.setAttribute('aria-expanded', 'false');
                } else {
                    // Digər açıq olanları bağlaya bilərik (optional)
                    document.querySelectorAll('.accordion-content').forEach(el => el.classList.add('hidden'));
                    document.querySelectorAll('.accordion-btn svg').forEach(el => el.classList.remove('rotate-90'));

                    // Seçiləni aç
                    content.classList.remove('hidden');
                    icon.classList.add('rotate-90');
                    this.setAttribute('aria-expanded', 'true');
                }
            });
        });

    });
</script>
