<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Link Sosial Media
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.social_links.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="name" value="Nama (e.g., WhatsApp)" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="url" value="URL Lengkap" />
                            <x-text-input id="url" class="block mt-1 w-full" type="url" name="url" :value="old('url')" required />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="icon_class" value="Kelas Ikon BoxIcons (e.g., bx bxl-whatsapp)" />
                            <x-text-input id="icon_class" class="block mt-1 w-full" type="text" name="icon_class" :value="old('icon_class')" required />
                            <p class="text-sm text-gray-500 mt-1">Cari nama kelas di <a href="https://boxicons.com/" target="_blank" class="text-indigo-600">BoxIcons</a>.</p>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.social_links.index') }}" class="text-sm text-gray-600 hover:text-gray-900 rounded-md">Batal</a>
                            <x-primary-button class="ms-4">Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>