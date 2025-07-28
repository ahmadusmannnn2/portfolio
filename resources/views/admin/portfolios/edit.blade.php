<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Portfolio
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Judul')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $portfolio->title)" required autofocus />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="category_id" :value="__('Kategori')" />
                            <select name="category_id" id="category_id" class="block mt-1 w-full border-gray-300 focus:border-theme-main focus:ring-theme-main rounded-md shadow-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $portfolio->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="project_link" :value="__('Link Project (Opsional)')" />
                            <x-text-input id="project_link" class="block mt-1 w-full" type="url" name="project_link" :value="old('project_link', $portfolio->project_link)" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="image" :value="__('Ganti Gambar (Opsional)')" />
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="rounded-md h-32">
                            </div>
                            <label for="image" class="inline-flex items-center px-4 py-2 bg-theme-secondary text-theme-text rounded-lg shadow-sm tracking-wide uppercase border border-transparent cursor-pointer hover:bg-theme-main hover:text-white mt-2">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4 4-4-4h3V3h2v8z" />
                                </svg>
                                <span class="text-base leading-normal">Pilih Gambar Baru</span>
                                <input id="image" type="file" name="image" class="hidden">
                            </label>
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.portfolios.index') }}" class="text-sm text-gray-600 hover:text-gray-900 rounded-md">
                                Batal
                            </a>
                            <x-primary-button class="ms-4">
                                Update
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>