<nav x-data="{ open: false }" class="bg-theme-secondary border-b border-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('profile.edit') }}">
                        @php $emailHash = md5(strtolower(trim(Auth::user()->email))); @endphp
                        <img src="https://www.gravatar.com/avatar/{{ $emailHash }}?d=mp" alt="Profile" class="h-10 w-10 rounded-full object-cover">
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
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
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-theme-text bg-theme-secondary hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
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

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white">
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