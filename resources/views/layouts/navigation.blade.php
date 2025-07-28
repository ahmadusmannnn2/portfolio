<nav x-data="{ open: false }" class="bg-theme-secondary border-b border-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <div class="flex items-center">
                <a href="{{ route('admin.portfolios.index') }}" class="font-bold text-lg text-theme-text">
                    Admin Panel
                </a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:justify-center sm:flex-1">
                <div class="flex space-x-8">
                    <x-nav-link :href="route('admin.portfolios.index')" :active="request()->routeIs('admin.portfolios.*')">
                        {{ __('Portfolio') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                        {{ __('Kategori') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.content.index')" :active="request()->routeIs('admin.content.index')">
                        {{ __('Tampilan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.messages.index')" :active="request()->routeIs('admin.messages.index')">
                        {{ __('Pesan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.social_links.index')" :active="request()->routeIs('admin.social_links.*')">
                        {{ __('Sosmed') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.certificates.index')" :active="request()->routeIs('admin.certificates.*')">
                        {{ __('Sertifikat') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.*')">
                        {{ __('Layanan') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-theme-text hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            @if (Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile" class="h-10 w-10 rounded-full object-cover">
                            @else
                                @php $emailHash = md5(strtolower(trim(Auth::user()->email))); @endphp
                                <img src="https://www.gravatar.com/avatar/{{ $emailHash }}?d=mp" alt="Profile" class="h-10 w-10 rounded-full object-cover">
                            @endif
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-theme-text hover:text-gray-500 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /><path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-theme-light">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.portfolios.index')" :active="request()->routeIs('admin.portfolios.*')">
                {{ __('Portfolio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                {{ __('Kategori') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.content.index')" :active="request()->routeIs('admin.content.index')">
                {{ __('Tampilan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.messages.index')" :active="request()->routeIs('admin.messages.index')">
                {{ __('Pesan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.social_links.index')" :active="request()->routeIs('admin.social_links.*')">
                {{ __('Sosmed') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.certificates.index')" :active="request()->routeIs('admin.certificates.*')">
                {{ __('Sertifikat') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.*')">
                {{ __('Layanan') }}
            </x-responsive-nav-link>
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