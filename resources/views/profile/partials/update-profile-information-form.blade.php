<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post"
          action="{{ route('profile.update') }}"
          class="mt-6 space-y-6"
          enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Bagian Foto Profil --}}
        <div>
            <x-input-label for="photo" :value="__('Photo')" />

            <div class="mt-2">
                @if (Auth::user()->profile_photo_path)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                         alt="Profile"
                         class="h-20 w-20 rounded-full object-cover">
                @else
                    @php $emailHash = md5(strtolower(trim(Auth::user()->email))); @endphp
                    <img src="https://www.gravatar.com/avatar/{{ $emailHash }}?d=mp"
                         alt="Profile"
                         class="h-20 w-20 rounded-full object-cover">
                @endif
            </div>

            <div class="mt-2">
                <label for="photo"
                       class="inline-flex items-center px-4 py-2 bg-theme-secondary text-theme-text rounded-lg shadow-sm tracking-wide uppercase border border-transparent cursor-pointer hover:bg-theme-main hover:text-white">
                    <svg class="w-5 h-5 mr-2" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20">
                        <path d="M16.88 9.1A4 4 0 0 1 16 
                                 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 
                                 1 4.52-2.59A4.98 4.98 0 0 1 17 
                                 8c0 .38-.04.74-.12 1.1zM11 11h3l-4 4-4-4h3V3h2v8z" />
                    </svg>
                    <span id="photo-label-text" class="text-base leading-normal">
                        Pilih Foto Baru
                    </span>
                    <input id="photo"
                           type="file"
                           name="photo"
                           class="hidden"
                           accept="image/*">
                </label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        {{-- Nama --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name"
                          name="name"
                          type="text"
                          class="mt-1 block w-full"
                          :value="old('name', $user->name)"
                          required
                          autofocus
                          autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                          name="email"
                          type="email"
                          class="mt-1 block w-full"
                          :value="old('email', $user->email)"
                          required
                          autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Tombol Simpan --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>

{{-- Skrip untuk memperbarui teks label file input --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('photo');
        const labelText = document.getElementById('photo-label-text');

        input.addEventListener('change', function() {
            if (input.files && input.files.length > 0) {
                labelText.textContent = input.files[0].name;
            } else {
                labelText.textContent = 'Pilih Foto Baru';
            }
        });
    });
</script>
@endpush
