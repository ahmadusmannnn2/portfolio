<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Layanan Baru
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.services.store') }}" method="POST">
                        @csrf
                        {{-- Mengubah input teks menjadi dropdown --}}
                        <div class="mb-4">
                            <x-input-label for="title" value="Judul Layanan" />
                            <select name="title" id="title" class="block mt-1 w-full border-gray-300 focus:border-theme-main focus:ring-theme-main rounded-md shadow-sm" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="icon_class" value="Kelas Ikon BoxIcons (e.g., bx bx-code-alt)" />
                            <x-text-input id="icon_class" class="block mt-1 w-full" type="text" name="icon_class" :value="old('icon_class')" required />
                             <p class="text-sm text-gray-500 mt-1">Cari nama kelas di <a href="https://boxicons.com/" target="_blank" class="text-indigo-600">BoxIcons</a>.</p>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="short_description" value="Deskripsi Singkat (Tampil di halaman utama)" />
                            <textarea name="short_description" id="short_description" rows="3" class="block mt-1 w-full border-gray-300 focus:border-theme-main focus:ring-theme-main rounded-md shadow-sm">{{ old('short_description') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="long_description" value="Deskripsi Lengkap (Tampil di halaman detail)" />
                            <textarea name="long_description" id="long_description" rows="6" class="block mt-1 w-full border-gray-300 focus:border-theme-main focus:ring-theme-main rounded-md shadow-sm">{{ old('long_description') }}</textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.services.index') }}" class="text-sm text-gray-600 hover:text-gray-900 rounded-md">Batal</a>
                            <x-primary-button class="ms-4">Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>