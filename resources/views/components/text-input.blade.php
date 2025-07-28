@props(['disabled' => false])

{{-- Menghapus semua style dark mode agar input selalu terang --}}
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-theme-main focus:ring-theme-main rounded-md shadow-sm']) !!}>