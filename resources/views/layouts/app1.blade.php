<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'bokmart' ) }} ~ bookmart.az</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    @stack('styles')
</head>

<body>
    <div>
        <div class="w-fulll h-12 flex items-center lg:justify-center px-4  bg-color-brand">
            <svg width="35px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="1.92" stroke="#ffffff" fill="none">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M21.68,42.22H37.17a1.68,1.68,0,0,0,1.68-1.68L44.7,19.12A1.68,1.68,0,0,0,43,17.44H17.61a1.69,1.69,0,0,0-1.69,1.68l-5,21.42a1.68,1.68,0,0,0,1.68,1.68h2.18"></path>
                    <path d="M41.66,42.22H38.19l5-17.29h8.22a.85.85,0,0,1,.65.3l3.58,6.3a.81.81,0,0,1,.2.53L52.51,42.22h-3.6"></path>
                    <ellipse cx="18.31" cy="43.31" rx="3.71" ry="3.76"></ellipse>
                    <ellipse cx="45.35" cy="43.31" rx="3.71" ry="3.76"></ellipse>
                    <line x1="23.25" y1="22.36" x2="6.87" y2="22.36" stroke-linecap="round"></line>
                    <line x1="20.02" y1="27.6" x2="8.45" y2="27.6" stroke-linecap="round"></line>
                    <line x1="21.19" y1="33.5" x2="3.21" y2="33.5" stroke-linecap="round"></line>
                </g>
            </svg>
            <h5 class="font-poppins mx-1 text-[16px] text-white font-semibold tracking-tight antialiased leading-tight">
                Metrolara çatdırılma <span class="font-semibold">PULSUZDUR</span>
            </h5>
        </div>
        <!-- header mobil-->

        <header class="h-16  border-b px-4 w-full lg:hidden  flex items-center justify-between">
            <div>
                <button id="mobileMenuOpenBtn" class="lg:hidden p-2 text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <div>
                <x-icons.logo width="w-44" />
            </div>
            <div class="relative">
                <a href=""><x-icons.basket /></a>
            </div>
        </header>
        <!-- header desktop -->
        <header class="border-b ">
            <div class="h-24 hidden max-w-[1200px] px-4 mx-auto lg:flex justify-between items-center ">
                <div>
                    <a href=""><x-icons.logo /></a>
                </div>
                <div>
                    <form class="w-[500px] mx-auto">
                        <label for="text" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                                <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="search" class="block w-full p-3 border border-gray-300 text-heading text-sm rounded-base  shadow-xs placeholder:text-body" placeholder="Search" />
                        </div>
                    </form>
                </div>
                <div class="flex items-center ">
                    @auth
                    <a class="mx-2" href="{{ route('account') }}"><x-icons.profile /></a>
                    @else
                    <a class="mx-2" href="{{ route('login') }}"><x-icons.profile /></a>
                    @endauth

                    <a class="mx-2" href="{{ route('wishlist') }}"><x-icons.favorites /></a>
                    <a class="relative mx-2" href=""><x-icons.basket /></a>
                    <a class="mx-2" href="">9</a>
                </div>
            </div>
        </header>
        <x-nav />
        <x-nav-mobil />

    </div>
    <main class="min-h-96 mb-24">
        @yield('content')
    </main>
    <footer class="bg-cover bg-[position:50%_100%] text-white" style="background-image: url('/img/footer.webp')">
        <div class="max-w-6xl mx-auto px-6 py-8 text-center">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <svg width="150px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" x="0px" y="0px" viewBox="0 0 391.1 88.7" style="enable-background:new 0 0 391.1 88.7;" xml:space="preserve">
                    <style type="text/css">
                        .st2 {
                            fill: #FFFFFF;
                        }
                    </style>
                    <path class="st2" d="M4.6,84.3V2.6H11v24.3c2.4-3.7,5.9-5.6,10.6-5.6c4.2,0,7.4,1.4,9.8,4.3S35,31.9,35,35.8V71 c0,4-1.2,7.5-3.7,10.3c-2.4,2.8-5.6,4.2-9.7,4.2c-4.7,0-8.3-1.9-10.6-5.7l-0.5,4.6L4.6,84.3L4.6,84.3z M11.1,36.2v34.3 c0,5.5,3.5,9.2,8.7,9.2c5.5,0,8.9-3.8,8.9-9.2V36.2c0-5.5-3.5-9.2-8.8-9.2C14.4,27,11.1,30.8,11.1,36.2z" />
                    <path class="st2" d="M67.9,25.6c2.8,2.9,4.3,6.6,4.3,10.9v33.6c0,4.4-1.4,8.1-4.3,11s-6.5,4.3-10.9,4.3s-8-1.4-10.9-4.3 s-4.4-6.5-4.4-10.9V36.5c0-4.4,1.5-8,4.4-10.9s6.6-4.4,10.9-4.4C61.5,21.3,65.1,22.7,67.9,25.6z M48.1,36.2v34.1 c0,5.5,3.4,9.1,8.9,9.1c5.3,0,8.7-3.6,8.7-9.1V36.2c0-5.5-3.4-9.2-8.7-9.2C51.5,27,48.1,30.8,48.1,36.2z" />
                    <path class="st2" d="M105,25.6c2.9,2.9,4.3,6.6,4.3,10.9v33.6c0,4.4-1.4,8.1-4.3,11s-6.5,4.3-10.9,4.3s-8-1.4-10.9-4.3 s-4.4-6.5-4.4-10.9V36.5c0-4.4,1.5-8,4.4-10.9s6.6-4.4,10.9-4.4C98.6,21.3,102.2,22.7,105,25.6z M85.2,36.2v34.1 c0,5.5,3.4,9.1,8.9,9.1c5.3,0,8.7-3.6,8.7-9.1V36.2c0-5.5-3.4-9.2-8.7-9.2C88.6,27,85.2,30.8,85.2,36.2z" />
                    <path class="st2" d="M117.4,84.3V2.6h6.4v46.2h0.7l14-26.3h7.2L130,51.6l17.1,32.6h-7.2l-15.4-29.9h-0.7v29.9L117.4,84.3L117.4,84.3 z" />
                    <path class="st2" d="M150.6,84.3V22.5h5.7L157,27c2.3-3.8,5.9-5.7,10.6-5.7c5.8,0,10.2,3.2,12.2,8c2.1-5.4,6-8,11.8-8 c4.2,0,7.4,1.4,9.8,4.3s3.6,6.3,3.6,10.2v48.5h-6.4V36.2c0-5.5-3.4-9.2-8.9-9.2c-5.3,0-8.8,3.8-8.8,9.2v48.1h-6.4V36.2 c0-5.5-3.5-9.2-8.8-9.2c-5.5,0-8.8,3.8-8.8,9.2v48.1H150.6L150.6,84.3z" />
                    <path class="st2" d="M238,25.7c2.9,2.9,4.4,6.6,4.4,10.9v47.6h-5.7l-0.7-4.8c-2.6,4-6.2,6-10.9,6c-4.3,0-7.7-1.4-10.3-4.3 c-2.5-2.9-3.8-6.4-3.8-10.6V62c0-4.4,1.4-8.1,4.2-10.9c2.9-2.9,6.6-4.3,11-4.3h9.7V36.2c0-5.5-3.5-9.2-8.7-9.2 c-5.5,0-8.9,3.8-8.9,9.2v6.7h-6.4v-6.3c0-4.4,1.4-8.1,4.3-10.9c2.9-2.9,6.5-4.3,10.9-4.3C231.5,21.3,235.1,22.8,238,25.7z M235.9,52.4h-9.7c-5.5,0-8.8,3.8-8.8,9.2V70c0,5.8,3.6,9.7,9.2,9.7c5.6,0,9.3-3.9,9.3-9.7V52.4L235.9,52.4z" />
                    <path class="st2" d="M251.1,84.3V22.5h5.9l0.5,4.5c2.2-3.8,5.6-5.7,10.3-5.7c1.1,0,2.2,0.2,3.2,0.5l-0.1,5.2h-4.6 c-5.5,0-8.8,3.8-8.8,9.2v48.1H251.1L251.1,84.3z" />
                    <path class="st2" d="M274.5,28.2v-5.7h6.9V7.3l6.4-0.6v15.8h7v5.7h-7v42.7c0,5.2,3.2,8.9,8.1,8.9l0.3,5.6l-0.6,0.1h-1 c-3.6,0-6.8-1.3-9.4-4s-3.9-6.1-3.9-10.4V28.2H274.5z" />
                    <path class="st2" d="M302,84.3v-8.1h6.4v8.1H302z" />
                    <path class="st2" d="M342.4,25.7c2.9,2.9,4.4,6.6,4.4,10.9v47.6h-5.7l-0.7-4.8c-2.6,4-6.2,6-10.9,6c-4.3,0-7.7-1.4-10.3-4.3 c-2.5-2.9-3.8-6.4-3.8-10.6V62c0-4.4,1.4-8.1,4.2-10.9c2.9-2.9,6.5-4.3,11-4.3h9.7V36.2c0-5.5-3.5-9.2-8.7-9.2 c-5.5,0-8.9,3.8-8.9,9.2v6.7h-6.4v-6.3c0-4.4,1.4-8.1,4.3-10.9c2.9-2.9,6.5-4.3,10.9-4.3C335.9,21.3,339.5,22.8,342.4,25.7z M340.4,52.4h-9.7c-5.5,0-8.8,3.8-8.8,9.2V70c0,5.8,3.6,9.7,9.2,9.7s9.3-3.9,9.3-9.7V52.4L340.4,52.4z" />
                    <path class="st2" d="M352.6,84.3v-6l24.2-50.1h-23.6v-5.7h30.1v5.4l-24.4,50.4H383v6H352.6z" />
                </svg>
            </div>

            <!-- Navigation -->
            <div class="flex justify-center gap-10 mb-6 text-lg">
                <a href="about-us" class="hover:text-gray-300 transition">Haqqımızda</a>
                <a href="delivery" class="hover:text-gray-300 transition">Çatdırılma</a>
                <a href="contact-us" class="hover:text-gray-300 transition">Əlaqə</a>
            </div>

            <!-- Contact Info -->
            <div class="flex flex-wrap justify-center items-center gap-6 mb-6 text-sm">

                <div class="flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-phone"></i>
                    <span>+994 55 604 00 27</span>
                </div>

                <div class="flex items-center gap-2 cursor-pointer">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>+994 50 604 00 27</span>
                </div>

                <div class="flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-envelope"></i>
                    <span>info@bookmart.az</span>
                </div>

                <div class="flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Bakı, Bəsti Bağırova 12</span>
                </div>

            </div>

            <!-- Social Icons -->
            <div class="flex justify-center gap-4 mb-6">

                <a href="#" class="w-10 h-10 flex items-center justify-center border border-white rounded-full hover:bg-white hover:text-[#3E3A6D] transition">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#" class="w-10 h-10 flex items-center justify-center border border-white rounded-full hover:bg-white hover:text-[#3E3A6D] transition">
                    <i class="fa-brands fa-twitter"></i>
                </a>

                <a href="#" class="w-10 h-10 flex items-center justify-center border border-white rounded-full hover:bg-white hover:text-[#3E3A6D] transition">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="#" class="w-10 h-10 flex items-center justify-center border border-white rounded-full hover:bg-white hover:text-[#3E3A6D] transition">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

                <a href="#" class="w-10 h-10 flex items-center justify-center border border-white rounded-full hover:bg-white hover:text-[#3E3A6D] transition">
                    <i class="fa-brands fa-tiktok"></i>
                </a>

                <a href="#" class="w-10 h-10 flex items-center justify-center border border-white rounded-full hover:bg-white hover:text-[#3E3A6D] transition">
                    <i class="fa-brands fa-telegram"></i>
                </a>

            </div>

            <!-- Bottom Text -->
            <p class="text-sm text-gray-300">
                © Bookmart.az Created by Webline
            </p>

        </div>
    </footer>
    <!-- <footer class="bg-cover bg-center min-h-[300px]" style="background-image: url('/img/footer.webp')">
        
        <div class="flex justify-center">
            <div></div>
            <div>
                <a class="text-white text-lg p-2" href="">haqqımızda</a>
                <a class="text-white text-lg p-2" href="">Çatdırılma</a>
                <a class="text-white text-lg p-2" href="">Əlaqə</a>
            </div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </footer> -->
    <script>
        (function () {
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

            document.addEventListener('click', async (event) => {
                const button = event.target.closest('[data-wishlist]');
                if (!button) return;

                event.preventDefault();

                const inWishlist = button.dataset.inWishlist === '1';
                const url = inWishlist ? button.dataset.urlRemove : button.dataset.urlAdd;
                const method = inWishlist ? 'DELETE' : 'POST';

                try {
                    const response = await fetch(url, {
                        method,
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                        },
                    });

                    if (!response.ok) throw new Error('Request failed');

                    const data = await response.json();
                    const nowInWishlist = Boolean(data.in_wishlist);

                    button.dataset.inWishlist = nowInWishlist ? '1' : '0';
                    const onClass = button.dataset.wishlistOn || 'text-red-500';
                    const offClass = button.dataset.wishlistOff || 'text-gray-600';
                    button.classList.toggle(onClass, nowInWishlist);
                    button.classList.toggle(offClass, !nowInWishlist);

                    const svg = button.querySelector('svg');
                    if (svg) {
                        svg.setAttribute('fill', nowInWishlist ? 'currentColor' : 'none');
                        svg.classList.toggle('fill-current', nowInWishlist);
                    }

                    const label = button.querySelector('[data-wishlist-label]');
                    if (label) {
                        label.textContent = nowInWishlist ? 'Sevimlilerden cixar' : 'Istek siyahisina elave et';
                    }
                } catch (e) {
                    // Silent fail to avoid blocking UI; refresh still works if user reloads.
                }
            });
        })();

        function toggleMenu(isOpen) {
            const menu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('overlay');

            if (isOpen) {
                menu.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Ekranın arxada sürüşməsini bağlayır
            } else {
                menu.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }

        function switchTab(tabName) {
            const melumatTab = document.getElementById('tab-melumat');
            const bolmelerTab = document.getElementById('tab-bolmeler');
            const btnMelumat = document.getElementById('btn-melumat');
            const btnBolmeler = document.getElementById('btn-bolmeler');

            if (tabName === 'melumat') {
                melumatTab.classList.replace('hidden', 'block');
                bolmelerTab.classList.replace('block', 'hidden');
                btnMelumat.classList.add('border-indigo-900', 'bg-gray-100');
                btnBolmeler.classList.remove('border-indigo-900', 'bg-gray-100');
            } else {
                bolmelerTab.classList.replace('hidden', 'block');
                melumatTab.classList.replace('block', 'hidden');
                btnBolmeler.classList.add('border-indigo-900', 'bg-gray-100');
                btnMelumat.classList.remove('border-indigo-900', 'bg-gray-100');
            }
        }
    </script>
    @stack('scripts')

</body>

</html>
