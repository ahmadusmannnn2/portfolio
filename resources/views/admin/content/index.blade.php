<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Tampilan Halaman Utama') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.content.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <h3 class="text-lg font-bold border-b pb-2 mb-4">Bagian Home</h3>
                        
                        <div class="mb-4">
                            <x-input-label for="home_greeting" value="Sapaan (Greeting)" />
                            <x-text-input id="home_greeting" class="block mt-1 w-full" type="text" name="home_greeting" :value="old('home_greeting', $contents['home_greeting']->value)" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="home_name" value="Nama" />
                            <x-text-input id="home_name" class="block mt-1 w-full" type="text" name="home_name" :value="old('home_name', $contents['home_name']->value)" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="home_roles" value="Peran (pisahkan dengan koma)" />
                            <x-text-input id="home_roles" class="block mt-1 w-full" type="text" name="home_roles" :value="old('home_roles', $contents['home_roles']->value)" />
                        </div>
                         <div class="mb-4">
                            <x-input-label for="home_paragraph" value="Paragraf" />
                            <textarea name="home_paragraph" id="home_paragraph" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('home_paragraph', $contents['home_paragraph']->value) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="home_cv" value="File CV (Kosongkan jika tidak ingin ganti)" />
                            <input id="home_cv" class="block mt-1 w-full" type="file" name="home_cv">
                        </div>
                         <div class="mb-4">
                            <x-input-label for="home_image" value="Gambar Home (Kosongkan jika tidak ingin ganti)" />
                            <input id="home_image" class="block mt-1 w-full" type="file" name="home_image">
                        </div>

                        <h3 class="text-lg font-bold border-b pb-2 my-6">Bagian About</h3>

                         <div class="mb-4">
                            <x-input-label for="about_heading" value="Judul (Gunakan <span></span> untuk warna)" />
                            <x-text-input id="about_heading" class="block mt-1 w-full" type="text" name="about_heading" :value="old('about_heading', $contents['about_heading']->value)" />
                        </div>
                         <div class="mb-4">
                            <x-input-label for="about_subheading" value="Sub-Judul" />
                            <x-text-input id="about_subheading" class="block mt-1 w-full" type="text" name="about_subheading" :value="old('about_subheading', $contents['about_subheading']->value)" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="about_paragraph" value="Paragraf About" />
                            <textarea name="about_paragraph" id="about_paragraph" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('about_paragraph', $contents['about_paragraph']->value) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="about_certificate" value="File Sertifikat (Kosongkan jika tidak ingin ganti)" />
                            <input id="about_certificate" class="block mt-1 w-full" type="file" name="about_certificate">
                        </div>
                         <div class="mb-4">
                            <x-input-label for="about_image" value="Gambar About (Kosongkan jika tidak ingin ganti)" />
                            <input id="about_image" class="block mt-1 w-full" type="file" name="about_image">
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Simpan Perubahan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>