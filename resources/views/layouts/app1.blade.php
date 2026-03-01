<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'bokmart' ) }} ~ bookmart.az</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 24" stroke-width="1.3" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </span>
            </div>
            <div>
                <x-icons.logo width="w-44" />
            </div>
            <div>
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
                            <input type="text" id="search" class="block w-full p-3 border border-gray-300 text-heading text-sm rounded-base  shadow-xs placeholder:text-body" placeholder="Search"  />
                        </div>
                    </form>
                </div>
                <div class="flex ">
                    <a class="mx-2" href=""><x-icons.profile /></a>
                    <a class="mx-2" href=""><x-icons.favorites /></a>
                    <a class="mx-2" href=""><x-icons.basket /></a>
                    <a class="mx-2" href="">9</a>
                </div>
            </div>
        </header>
    </div>
</body>

</html>