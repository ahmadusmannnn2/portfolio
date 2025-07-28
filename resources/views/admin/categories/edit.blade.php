<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Menghapus class dark: dari container --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Nama Kategori')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $category->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                             <a href="{{ route('admin.categories.index') }}" class="text-sm text-gray-600 hover:text-gray-900 rounded-md">Batal</a>
                            <x-primary-button class="ms-4">Update</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>