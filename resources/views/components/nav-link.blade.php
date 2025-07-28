@props(['active'])

@php
// Mengganti semua warna default (text-gray-*) dengan warna tema Anda (text-theme-*)
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-theme-main text-sm font-medium leading-5 text-theme-text focus:outline-none focus:border-theme-text transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-theme-text hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>