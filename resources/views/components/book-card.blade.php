@php
$wishlist = session('wishlist', []);
$inWishlist = in_array($book->id, $wishlist);
@endphp

<div x-data="{ isHovered: false }"
    @mouseenter="isHovered = true"
    @mouseleave="isHovered = false"
    @click.away="isHovered = false"
    class="relative min-h-[300px] sm:h-[450px]">

    <div class="w-full h-full bg-transparent"></div>

    <div class="bg-white transition-all duration-[350ms] ease-in-out flex flex-col overflow-hidden"
        :class="{
            'absolute inset-x-0 top-0 z-50 drop-shadow-xl scale-[1] -mt-2 p-4': isHovered,
            'absolute inset-0 z-10 p-4': !isHovered
         }">

        <a href="{{ route('show.detail', $book->slug)}}" class="block h-full cursor-pointer"
            @click="if (!isHovered && window.innerWidth < 1024) { $event.preventDefault(); isHovered = true; }">

            <div class="flex justify-center mb-4 rounded">
                <img src="{{ asset('uploads/products/' . $book->image) }}" alt="Book" class="w-full object-contain">
            </div>

            <div class="text-center">
                <h3 class="font-bold text-gray-800 text-sm mb-1 uppercase line-clamp-2 min-h-[40px]">
                    {{ $book->author }} – {{ $book->title }}
                </h3>

                <span class="block font-bold text-gray-800 text-lg mb-2">
                    {{ number_format($book->price, 0) }}
                    <span class="ml-1 leading-none text-2xl font-medium text-[#2D2A5E]">₼</span>
                </span>
            </div>
        </a>

        <div x-show="isHovered"
            x-transition:enter="transition opacity ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition opacity ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="text-center pt-3 flex flex-col justify-between" style="flex-grow: 1;">

            <div class="p-3">
                <p class="text-sm text-gray-500 italic mb-4 line-clamp-3">
                    {{ $book->description }}
                </p>
            </div>

            <div class="flex items-center justify-between mt-auto z-20">

                <button
                    type="button"
                    data-wishlist
                    data-in-wishlist="{{ $inWishlist ? '1' : '0' }}"
                    data-url-add="{{ route('wishlist.add', $book) }}"
                    data-url-remove="{{ route('wishlist.remove', $book) }}"
                    data-wishlist-on="text-red-500"
                    data-wishlist-off="text-gray-400"
                    class="{{ $inWishlist ? 'text-red-500' : 'text-gray-400 hover:text-red-500' }} transition-colors relative z-30"
                    title="{{ $inWishlist ? 'Sevimlilərdən çıxart' : 'Sevimlilərə əlavə et' }}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $inWishlist ? 'fill-current' : '' }}" fill="{{ $inWishlist ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>

                <button
                    type="button"
                    data-cart-add="{{ route('card.add', $book->id) }}"
                    class="add-to-cart-btn bg-color-brand text-white px-4 py-2 text-[10px] font-bold tracking-tighter hover:bg-black transition-colors relative z-30">
                    SƏBƏTƏ AT
                </button>

                <button class="text-gray-400 hover:text-blue-500 transition-colors relative z-30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>