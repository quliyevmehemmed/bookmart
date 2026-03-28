@props(['title', 'showBack' => false])


<div class="bg-color-brand w-full py-12 lg:py-24 -mt-[2px] px-4">
    <div class="max-w-[1200px] mx-auto flex flex-col items-center">

        <div class="flex items-center text-white mb-6 lg:mb-10">

            @if ($showBack)
            <a href="{{ url()->previous() }}" class="text-3xl mr-4 hidden lg:block hover:text-gray-300 transition-colors">
                &larr;
            </a>
            @endif

            <h1 class="text-4xl lg:text-6xl font-poppins text-center font-bold tracking-wide">{{ $title }}</h1>
        </div>

        @if(!$slot->isEmpty())
        @if ($showBack)
        <button id="mobileMenuBtn" class="lg:hidden flex items-center justify-center gap-2 text-white/90 text-[16px] mb-4 hover:text-white transition-colors focus:outline-none">
            Bölmələr
            <svg id="mobileMenuArrow" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        @endif
        <div id="categoriesContainer" class="w-full lg:w-auto overflow-hidden transition-[max-height,opacity] duration-500 ease-in-out max-h-0 opacity-0 lg:max-h-[1000px] lg:opacity-100 lg:overflow-visible">

            <div class="flex flex-col lg:flex-row flex-wrap justify-start lg:justify-center items-start lg:items-center gap-x-10 gap-y-6 pt-2 pb-6 lg:py-0 w-full max-w-md lg:max-w-none  px-4 lg:px-0">
                {{ $slot }}
            </div>

        </div>
        @endif
    </div>
</div>