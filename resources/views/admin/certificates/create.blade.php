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
                            <x-text-input
                                id="title"
                                class="block mt-1 w-full"
                                type="text"
                                name="title"
                                :value="old('title')"
                                required
                            />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="organization" value="Lembaga/Penerbit" />
                            <x-text-input
                                id="organization"
                                class="block mt-1 w-full"
                                type="text"
                                name="organization"
                                :value="old('organization')"
                                required
                            />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="issue_date" value="Tanggal Diterbitkan" />
                            <x-text-input
                                id="issue_date"
                                class="block mt-1 w-full"
                                type="date"
                                name="issue_date"
                                :value="old('issue_date')"
                                required
                            />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="thumbnail_image" value="Gambar Pratinjau (JPG/PNG)" />
                            <label
                                for="thumbnail_image"
                                class="flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg shadow-sm tracking-wide uppercase border border-gray-300 cursor-pointer hover:bg-gray-300 mt-1"
                            >
                                <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4 4-4-4h3V3h2v8z"/>
                                </svg>
                                <span id="thumbnail_image-label-text" class="text-base leading-normal">Pilih gambar...</span>
                                <input
                                    id="thumbnail_image"
                                    type="file"
                                    name="thumbnail_image"
                                    class="hidden"
                                    required
                                >
                            </label>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="file_pdf" value="File Download (PDF)" />
                            <label
                                for="file_pdf"
                                class="flex items-center px-4 py-2 bg-theme-secondary text-theme-text rounded-lg shadow-sm tracking-wide uppercase border border-transparent cursor-pointer hover:bg-theme-main hover:text-white mt-1"
                            >
                                <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4 4-4-4h3V3h2v8z"/>
                                </svg>
                                <span id="file_pdf-label-text" class="text-base leading-normal">Pilih file PDF...</span>
                                <input
                                    id="file_pdf"
                                    type="file"
                                    name="file_pdf"
                                    class="hidden"
                                    required
                                >
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.certificates.index') }}" class="text-sm text-gray-600 hover:text-gray-900 rounded-md">
                                Batal
                            </a>
                            <x-primary-button class="ms-4">
                                Simpan
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
            // Array ID input yang ingin kita lacak
            const fields = ['thumbnail_image', 'file_pdf'];

            fields.forEach(function(id) {
                const input = document.getElementById(id);
                const labelText = document.getElementById(`${id}-label-text`);

                input.addEventListener('change', function() {
                    if (input.files && input.files.length > 0) {
                        labelText.textContent = input.files[0].name;
                    } else {
                        // Kembalikan teks default
                        labelText.textContent = id === 'file_pdf'
                            ? 'Pilih file PDF...'
                            : 'Pilih gambar...';
                    }
                });
            });
        });
    </script>
    @endpush
</x-app-layout>
