<nav x-data="{ open: false }" class="bg-theme-secondary border-b border-gray-300 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <div class="flex items-center">
                <a href="{{ route('admin.portfolios.index') }}" class="font-bold text-lg text-theme-text hover:text-theme-main transition-colors duration-300">
                    Admin Panel
                </a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:justify-center sm:flex-1">
                <div class="flex space-x-4 md:space-x-6">
                    {{-- Menggunakan array untuk membuat link lebih rapi --}}
                    @php
                        $navLinks = [
                            ['route' => 'admin.portfolios.index', 'label' => 'Portfolio', 'icon' => 'bxs-collection'],
                            ['route' => 'admin.categories.index', 'label' => 'Kategori', 'icon' => 'bxs-purchase-tag'],
                            ['route' => 'admin.content.index', 'label' => 'Tampilan', 'icon' => 'bxs-layout'],
                            ['route' => 'admin.messages.index', 'label' => 'Pesan', 'icon' => 'bxs-message-dots'],
                            ['route' => 'admin.social_links.index', 'label' => 'Sosmed', 'icon' => 'bxs-share-alt'],
                            ['route' => 'admin.certificates.index', 'label' => 'Sertifikat', 'icon' => 'bxs-certification'],
                            ['route' => 'admin.services.index', 'label' => 'Layanan', 'icon' => 'bxs-briefcase'],
                            ['route' => 'admin.users.index', 'label' => 'Users', 'icon' => 'bxs-group'],
                        ];
                    @endphp

                    @foreach($navLinks as $item)
                        <x-nav-link :href="route($item['route'])" :active="request()->routeIs(str_replace('.index', '.*', $item['route']))" :title="$item['label']">
                            {{-- Ikon BoxIcons --}}
                            <i class='bx {{ $item['icon'] }} text-xl'></i>
                            {{-- Teks yang akan disembunyikan di layar medium --}}
                            <span class="hidden lg:inline ml-2">{{ __($item['label']) }}</span>
                        </x-nav-link>
                    @endforeach
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        {{-- ==== PERUBAHAN DI SINI ==== --}}
                        <button class="relative flex items-center p-1 rounded-full text-sm font-medium text-theme-text hover:text-theme-main transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-theme-secondary focus:ring-theme-main">
                            @if (Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile" class="h-10 w-10 rounded-full object-cover">
                            @else
                                @php $emailHash = md5(strtolower(trim(Auth::user()->email))); @endphp
                                <img src="https://www.gravatar.com/avatar/{{ $emailHash }}?d=mp" alt="Profile" class="h-10 w-10 rounded-full object-cover">
                            @endif
                        </button>
                        {{-- ============================ --}}
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-theme-light">{{ __('Profile') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="hover:bg-theme-light">{{ __('Log Out') }}</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-theme-text hover:text-theme-main focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /><path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-theme-light">
        <div class="pt-2 pb-3 space-y-1">
            @foreach($navLinks as $item)
                <x-responsive-nav-link :href="route($item['route'])" :active="request()->routeIs(str_replace('.index', '.*', $item['route']))">
                    <i class='bx {{ $item['icon'] }} w-5 mr-2'></i>{{ __($item['label']) }}
                </x-responsive-nav-link>
            @endforeach
        </div>
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')"><i class='bx bxs-user-circle w-5 mr-2'></i>{{ __('Profile') }}</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"><i class='bx bxs-log-out w-5 mr-2'></i>{{ __('Log Out') }}</x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>