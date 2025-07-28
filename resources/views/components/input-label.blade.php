@props(['value'])

{{-- Mengubah warna teks label agar lebih gelap dan jelas --}}
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>