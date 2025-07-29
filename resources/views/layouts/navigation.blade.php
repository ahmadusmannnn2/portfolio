<nav x-data="{ open: false }" class="bg-theme-secondary border-b border-gray-300 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <a href="{{ route('admin.portfolios.index') }}" class="font-bold text-lg text-theme-text hover:text-theme-main transition-colors duration-300">
                    Admin Panel
                </a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:justify-center sm:flex-1">
                <div class="flex space-x-6">
                    @foreach([
                        ['route' => 'admin.portfolios.index', 'label' => 'Portfolio'],
                        ['route' => 'admin.categories.index', 'label' => 'Kategori'],
                        ['route' => 'admin.content.index', 'label' => 'Tampilan'],
                        ['route' => 'admin.messages.index', 'label' => 'Pesan'],
                        ['route' => 'admin.social_links.index', 'label' => 'Sosmed'],
                        ['route' => 'admin.certificates.index', 'label' => 'Sertifikat'],
                        ['route' => 'admin.services.index', 'label' => 'Layanan'],
                        ['route' => 'profile.edit', 'label' => 'Profil'],
                        ['route' => 'admin.users.index', 'label' => 'User'],

                    ] as $item)
                        <x-nav-link :href="route($item['route'])"
                                    :active="request()->routeIs(str_replace('index', '*', $item['route']) )"
                                    class="group relative overflow-hidden">
                            {{ __($item['label']) }}
                            <span class="absolute bottom-0 left-0 h-0.5 w-full bg-theme-main scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                        </x-nav-link>
                    @endforeach
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-theme-text hover:text-theme-main transition-colors duration-300 focus:outline-none">
                            @if (Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile" class="h-10 w-10 rounded-full object-cover shadow-inner">
                            @else
                                @php $emailHash = md5(strtolower(trim(Auth::user()->email))); @endphp
                                <img src="https://www.gravatar.com/avatar/{{ $emailHash }}?d=mp" alt="Profile" class="h-10 w-10 rounded-full object-cover shadow-inner">
                            @endif
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-theme-light">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="hover:bg-theme-light">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-theme-text hover:text-theme-main transition-colors duration-200 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" 
         x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="sm:hidden bg-theme-light">
        <div class="pt-2 pb-3 space-y-1">
            @foreach([
                ['route' => 'admin.portfolios.index', 'label' => 'Portfolio'],
                ['route' => 'admin.categories.index', 'label' => 'Kategori'],
                ['route' => 'admin.content.index', 'label' => 'Tampilan'],
                ['route' => 'admin.messages.index', 'label' => 'Pesan'],
                ['route' => 'admin.social_links.index', 'label' => 'Sosmed'],
                ['route' => 'admin.certificates.index', 'label' => 'Sertifikat'],
                ['route' => 'admin.services.index', 'label' => 'Layanan'],
                ['route' => 'profile.edit', 'label' => 'Profil'],
                ['route' => 'admin.users.index', 'label' => 'User'],
            ] as $item)
                <x-responsive-nav-link :href="route($item['route'])" :active="request()->routeIs(str_replace('index', '*', $item['route']))">
                    {{ __($item['label']) }}
                </x-responsive-nav-link>
            @endforeach
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
