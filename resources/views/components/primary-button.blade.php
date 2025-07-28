<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-theme-main border border-transparent rounded-md font-semibold text-xs text-theme-light uppercase tracking-widest hover:bg-theme-text focus:bg-theme-text active:bg-theme-text focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>