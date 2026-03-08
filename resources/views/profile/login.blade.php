@extends('layouts.app1')

@section('content')
<div x-data="{ mode: $persist('login') }" class="max-w-5xl mx-auto p-12 my-20 grid grid-cols-1 sm:grid-cols-2 gap-12 bg-white">

    <!-- LOGIN -->
    <div x-show="mode === 'login'">
        <h2 class="text-2xl font-semibold mb-6">DAXİL OL</h2>

        <form class="space-y-5" action="{{ route('login') }}" method="POST">
            @csrf

            <div>
                <label class="block text-sm mb-2">Email <span class="text-red-500">*</span></label>
                <input type="text" name="email" class="w-full border p-3 outline-none">
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm mb-2">Şifrə <span class="text-red-500">*</span></label>
                <div class="flex border mb-3 focus-within:border-gray-500 transition shadow-sm">
                    <input id="login_password"
                        type="password"
                        name="password"
                        class="w-full p-3 outline-none focus:ring-0 border-none">

                    <div onclick="togglePassword('login_password')" class="px-3 flex items-center cursor-pointer opacity-50 hover:opacity-100">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="border p-3 flex items-center gap-3">
                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-white">✓</div>
                <span class="text-sm">Başarılı!</span>
            </div>

            <button class="w-full bg-indigo-900 text-white py-3 font-semibold">
                DAXİL OL
            </button>

            <div class="flex justify-between text-sm mt-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox">
                    Yadda saxla
                </label>

                <a href="#" class="text-gray-600">Şifrəni unutmusunuz?</a>
            </div>

        </form>
    </div>

    <!-- Register -->

    <div x-show="mode === 'register'" class="max-w-xl">

        <h2 class="text-2xl font-semibold mb-6">QEYDİYYAT</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm mb-1">
                    Ad, Soyad <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border mb-3 border-gray-300 p-3 outline-none focus:border-gray-500 focus:ring-0 transition" />
                @error('name')
                <p class="text-red-500 text-xs mb-2">{{ $message }}</p>
                @enderror

                <label class="block text-sm mb-1">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border mb-3 border-gray-300 p-3 outline-none focus:border-gray-500 focus:ring-0 transition" />
                @error('email')
                <p class="text-red-500 text-xs mb-2">{{ $message }}</p>
                @enderror

                <label class="block text-sm mb-1">"
                    Şifrə <span class="text-red-500">*</span>
                </label>
                <div class="flex border mb-3 focus-within:border-gray-500 transition shadow-sm">
                    <input id="register_password"
                        type="password"
                        name="password"
                        class="w-full p-3 outline-none focus:ring-0 border-none">

                    <div onclick="togglePassword('register_password')" class="px-3 flex items-center cursor-pointer opacity-50 hover:opacity-100">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>
                @error('password')
                <p class="text-red-500 text-xs mb-2">{{ $message }}</p>
                @enderror

                <label class="block text-sm mb-1">
                    Şifrənin təkrarı <span class="text-red-500">*</span>
                </label>
                <input type="password" name="password_confirmation" class="w-full border mb-3 border-gray-300 p-3 outline-none focus:border-gray-500 focus:ring-0 transition" />
                @error('password_confirmation')
                <p class="text-red-500 text-xs mb-2">{{ $message }}</p>
                @enderror
            </div>

            <p class="text-gray-500 text-sm">
                A link to set a new password will be sent to your email address.
            </p>

            <div class="border border-gray-300 p-4 flex items-center justify-between max-w-sm">
                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox">
                    Gerçək kişi olduğunuzu doğrulayın
                </label>

                <span class="text-xs text-gray-400">Cloudflare</span>
            </div>

            <button class="w-full bg-indigo-900 text-white py-3 font-semibold hover:bg-indigo-800">
                QEYDİYYAT
            </button>

        </form>

    </div>


    <!-- REGISTER -->
    <div class=" flex flex-col items-center  border-l pl-12">
        <h2 class="text-2xl font-semibold mb-6">QEYDİYYAT</h2>

        <p class="text-gray-600 mb-8 leading-relaxed text-center">
            Bu saytda qeydiyyatdan keçmək sizə sifariş statusunuza və tarixçənizə daxil olmağa imkan verir.
            Sadəcə aşağıdakı sahələri doldurun və biz qısa zamanda sizin üçün yeni hesab yaradaq.
        </p>

        <button @click="mode = (mode === 'login' ? 'register' : 'login')" class=" border px-6 py-3 font-semibold hover:bg-gray-100 bg-gray-50">
            <span x-text="mode === 'login'? 'Qeydiyyat' : 'Daxil ol'"></span>
        </button>

    </div>

</div>
<script>
    function togglePassword(inputId) {
        const password = document.getElementById(inputId);

        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    }
</script>
@endsection