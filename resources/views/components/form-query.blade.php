@props(['type' => 'contact'])

<div class="border-l-0 md:border-l border-gray-200 md:pl-16">
    <h2 class="text-2xl font-bold text-gray-800 mb-8 tracking-wide">SORĞU GÖNDƏR</h2>

    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <input type="hidden" name="type" value="{{ $type }}">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Adınız</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-400 p-2 focus:outline-none focus:border-blue-500">
                @error('name')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Telefon</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border border-gray-400 p-2 focus:outline-none focus:border-blue-500">
                @error('phone')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-400 p-2 focus:outline-none focus:border-blue-500">
            @error('email')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Mətn</label>
            <textarea rows="4" name="message" value="{{ old('message') }}" class="w-full border border-gray-400 p-2 focus:outline-none focus:border-blue-500 resize-none"></textarea>
            @error('message')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="w-full bg-[#302e52] text-white py-3 font-bold uppercase tracking-widest hover:bg-[#3d3b66] transition-colors">
            GÖNDƏR
        </button>
    </form>
</div>