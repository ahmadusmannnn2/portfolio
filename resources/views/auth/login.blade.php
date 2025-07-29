<x-guest-layout>
    <div class="flex justify-center">
        <svg id="monster" width="100" height="100" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <circle cx="100" cy="100" r="80" fill="#698342"/>
            <g id="eyes-open">
                <circle cx="70" cy="80" r="15" fill="white"/><circle cx="70" cy="80" r="5" fill="black"/>
                <circle cx="130" cy="80" r="15" fill="white"/><circle cx="130" cy="80" r="5" fill="black"/>
            </g>
            <g id="hands" style="transition: transform 0.3s ease;">
                <path d="M 50,120 C 30,150 70,150 70,120 Z" fill="#345133" />
                <path d="M 150,120 C 170,150 130,150 130,120 Z" fill="#345133" />
            </g>
        </svg>
    </div>
    <h2 class="text-2xl font-bold text-gray-800 mt-4 text-center">Selamat Datang Kembali!</h2>

    <form method="POST" action="{{ route('login') }}" class="mt-4">
        @csrf
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <div id="togglePassword" class="absolute inset-y-0 right-0 top-6 pr-3 flex items-center cursor-pointer">
                <i id="eye-icon" class="bx bx-show text-gray-500 text-xl"></i>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-theme-main shadow-sm focus:ring-theme-main" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">{{ __('Lupa password?') }}</a>
            @endif
        </div>
        
        {{-- Tombol Login Diperbarui --}}
        <div class="mt-6">
            <x-primary-button class="w-full justify-center text-lg">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        
        
    </form>
</x-guest-layout>