<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Tampilan Halaman Utama
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200" data-dismiss-target="#alert-3" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('admin.content.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <h3 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4">Bagian Home</h3>
                        
                        <div class="mb-4">
                            <x-input-label for="home_greeting" value="Sapaan (Greeting)" />
                            <x-text-input id="home_greeting" class="block mt-1 w-full" type="text" name="home_greeting" :value="old('home_greeting', $contents['home_greeting']->value ?? '')" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="home_name" value="Nama" />
                            <x-text-input id="home_name" class="block mt-1 w-full" type="text" name="home_name" :value="old('home_name', $contents['home_name']->value ?? '')" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="home_roles" value="Peran (pisahkan dengan koma)" />
                            <x-text-input id="home_roles" class="block mt-1 w-full" type="text" name="home_roles" :value="old('home_roles', $contents['home_roles']->value ?? '')" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="home_paragraph" value="Paragraf" />
                            <textarea name="home_paragraph" id="home_paragraph" class="block mt-1 w-full border-gray-300 focus:border-theme-main focus:ring-theme-main rounded-md shadow-sm">{{ old('home_paragraph', $contents['home_paragraph']->value ?? '') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="home_cv" value="File CV (Kosongkan jika tidak ingin ganti)" />
                            <label for="home_cv" class="flex items-center px-4 py-2 bg-theme-secondary text-theme-text rounded-lg shadow-sm tracking-wide uppercase border border-blue cursor-pointer hover:bg-theme-main hover:text-white mt-1">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4 4-4-4h3V3h2v8z" />
                                </svg>
                                <span id="home_cv-label-text" class="text-base leading-normal">Pilih file PDF...</span>
                                <input id="home_cv" type="file" name="home_cv" class="hidden">
                            </label>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="home_image" value="Gambar Home (Kosongkan jika tidak ingin ganti)" />
                            <label for="home_image" class="flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg shadow-sm tracking-wide uppercase border border-gray-300 cursor-pointer hover:bg-gray-300 mt-1">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4 4-4-4h3V3h2v8z" />
                                </svg>
                                <span id="home_image-label-text" class="text-base leading-normal">Pilih gambar...</span>
                                <input id="home_image" type="file" name="home_image" class="hidden">
                            </label>
                        </div>

                        <h3 class="text-lg font-bold text-gray-800 border-b pb-2 my-6">Bagian About</h3>

                        <div class="mb-4">
                            <x-input-label for="about_heading" value="Judul (Gunakan <span></span> untuk warna)" />
                            <x-text-input id="about_heading" class="block mt-1 w-full" type="text" name="about_heading" :value="old('about_heading', $contents['about_heading']->value ?? '')" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="about_subheading" value="Sub-Judul" />
                            <x-text-input id="about_subheading" class="block mt-1 w-full" type="text" name="about_subheading" :value="old('about_subheading', $contents['about_subheading']->value ?? '')" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="about_paragraph" value="Paragraf About" />
                            <textarea name="about_paragraph" id="about_paragraph" class="block mt-1 w-full border-gray-300 focus:border-theme-main focus:ring-theme-main rounded-md shadow-sm">{{ old('about_paragraph', $contents['about_paragraph']->value ?? '') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="about_certificate" value="File Sertifikat (Kosongkan jika tidak ingin ganti)" />
                            <label for="about_certificate" class="flex items-center px-4 py-2 bg-theme-secondary text-theme-text rounded-lg shadow-sm tracking-wide uppercase border border-blue cursor-pointer hover:bg-theme-main hover:text-white mt-1">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4 4-4-4h3V3h2v8z" />
                                </svg>
                                <span id="about_certificate-label-text" class="text-base leading-normal">Pilih file PDF...</span>
                                <input id="about_certificate" type="file" name="about_certificate" class="hidden">
                            </label>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="about_image" value="Gambar About (Kosongkan jika tidak ingin ganti)" />
                            <label for="about_image" class="flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg shadow-sm tracking-wide uppercase border border-gray-300 cursor-pointer hover:bg-gray-300 mt-1">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4 4-4-4h3V3h2v8z" />
                                </svg>
                                <span id="about_image-label-text" class="text-base leading-normal">Pilih gambar...</span>
                                <input id="about_image" type="file" name="about_image" class="hidden">
                            </label>
                        </div>

                        {{-- FORM BARU UNTUK FOOTER --}}
                        <h3 class="text-lg font-bold text-gray-800 border-b pb-2 my-6">Bagian Footer</h3>

                        <div class="mb-4">
                            <x-input-label for="footer_text" value="Teks Copyright Footer" />
                            <x-text-input id="footer_text" class="block mt-1 w-full" type="text" name="footer_text" :value="old('footer_text', $contents['footer_text']->value ?? '')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                Simpan Perubahan
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Skrip untuk memperbarui label file input --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fields = ['home_cv', 'home_image', 'about_certificate', 'about_image'];
            fields.forEach(function(id) {
                const input = document.getElementById(id);
                const labelText = document.getElementById(`${id}-label-text`);
                input.addEventListener('change', function() {
                    if (input.files.length > 0) {
                        labelText.textContent = input.files[0].name;
                    } else {
                        // teks default berdasarkan jenis field
                        const defaults = {
                            home_cv: 'Pilih file PDF...',
                            about_certificate: 'Pilih file PDF...',
                            home_image: 'Pilih gambar...',
                            about_image: 'Pilih gambar...'
                        };
                        labelText.textContent = defaults[id] || 'Pilih file...';
                    }
                });
            });
        });
    </script>
    @endpush

</x-app-layout>
