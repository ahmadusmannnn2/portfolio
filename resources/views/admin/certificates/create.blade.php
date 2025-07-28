<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Sertifikat Baru
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="title" value="Judul Sertifikat" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="organization" value="Lembaga/Penerbit" />
                            <x-text-input id="organization" class="block mt-1 w-full" type="text" name="organization" :value="old('organization')" required />
                        </div>
                         <div class="mb-4">
                            <x-input-label for="issue_date" value="Tanggal Diterbitkan" />
                            <x-text-input id="issue_date" class="block mt-1 w-full" type="date" name="issue_date" :value="old('issue_date')" required />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="thumbnail_image" value="Gambar Pratinjau (JPG/PNG)" />
                            <input id="thumbnail_image" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="file" name="thumbnail_image" required>
                        </div>
                         <div class="mb-4">
                            <x-input-label for="file_pdf" value="File Download (PDF)" />
                            <input id="file_pdf" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="file" name="file_pdf" required>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.certificates.index') }}" class="text-sm text-gray-600 hover:text-gray-900 rounded-md">Batal</a>
                            <x-primary-button class="ms-4">Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>