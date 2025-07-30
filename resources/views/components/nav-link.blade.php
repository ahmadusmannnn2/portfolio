@props(['active'])

@php
// Menambahkan style untuk hover dan transisi
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 rounded-md text-sm font-medium bg-theme-main text-white transition duration-150 ease-in-out' // Style saat aktif
            : 'inline-flex items-center px-3 py-2 rounded-md text-sm font-medium text-theme-text hover:bg-theme-light hover:text-theme-text focus:outline-none transition duration-150 ease-in-out'; // Style default dan saat hover
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>