@extends('layouts.admin')

@section('main_content')
<div class="max-w-5xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden border border-gray-100">
    <div class="bg-[#2D2A5E] px-6 py-4 flex justify-between items-center">
        <h3 class="text-white font-bold uppercase tracking-wider">Yeni Kitab Əlavə Et</h3>
        <a href="{{ route('products.index') }}" class="text-xs bg-white/10 hover:bg-white/20 text-white px-3 py-1 rounded transition">Siyahıya qayıt</a>
    </div>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kitabın Tam Adı</label>
                    <input type="text" name="title" class="w-full px-4 py-3 rounded-md border border-gray-200 focus:border-[#2D2A5E] focus:ring-1 focus:ring-[#2D2A5E] outline-none transition" placeholder="Məs: Art və Xaos" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Müəllif</label>
                    <input type="text" name="author" class="w-full px-4 py-3 rounded-md border border-gray-200 focus:border-[#2D2A5E] focus:ring-1 focus:ring-[#2D2A5E] outline-none transition" placeholder="Məs: Qaraqan" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Məhsulun Təsviri (Açıqlama)</label>
                    <textarea name="description" id="editor" rows="10" class="w-full px-4 py-3 rounded-md border border-gray-200 focus:border-[#2D2A5E] focus:ring-1 focus:ring-[#2D2A5E] outline-none transition" placeholder="Kitab haqqında ətraflı məlumat..."></textarea>
                </div>
            </div>

            <div class="space-y-6 bg-gray-50 p-6 rounded-xl border border-gray-200">

                <div>
                    <label class="block text-sm font-bold  mb-2 text-[#2D2A5E]">Kateqoriya</label>
                    <select name="category_id" class="w-full px-4 py-3 rounded-md border border-gray-200 bg-white focus:border-[#2D2A5E] outline-none transition" required>
                        <option value="">Seçin...</option>
                        @foreach($categories as $category)
                        @if($category->parent_id == null)
                        <optgroup label="{{ $category->name }}">
                            @foreach($categories->where('parent_id', $category->id) as $child)
                            <option value="{{ $child->id }}">{{ $child->name }}</option>
                            @endforeach
                        </optgroup>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold mb-2 text-green-600">Satış</label>
                        <input type="number" step="0.01" name="price" class="w-full px-3 py-3 rounded-md border border-gray-200 focus:border-green-500 outline-none transition" placeholder="0.00" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold  mb-2 text-red-400">Köhnə</label>
                        <input type="number" step="0.01" name="old_price" class="w-full px-3 py-3 rounded-md border border-gray-200 focus:border-red-400 outline-none transition" placeholder="0.00">
                    </div>
                </div>

                <div x-data="{ photoPreview: null }">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kitab Şəkli</label>

                    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md bg-white overflow-hidden">
                        <template x-if="photoPreview">
                            <img :src="photoPreview" class="max-h-48 object-contain rounded">
                        </template>
                        <template x-if="!photoPreview">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="text-xs text-gray-500 italic">PNG, JPG 2MB-a qədər</p>
                            </div>
                        </template>
                    </div>

                    <input type="file" name="image" class="mt-4 w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#2D2A5E] file:text-white hover:file:bg-black transition cursor-pointer"
                        @change="const file = $event.target.files[0]; if (file) { const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result; }; reader.readAsDataURL(file); }">
                </div>
            </div>
        </div>

        <div class="mt-10 pt-6 border-t border-gray-100 flex justify-end">
            <button type="submit" class="bg-[#2D2A5E] hover:bg-black text-white px-10 py-4 rounded-md font-bold transition-all shadow-lg active:scale-95">
                MƏHSULU YADDA SAXLA
            </button>
        </div>
    </form>
</div>

@endsection