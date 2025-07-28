<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Sertifikat
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('admin.certificates.create') }}" class="inline-flex items-center px-4 py-2 bg-theme-main border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-theme-text focus:outline-none transition">
                            + Tambah Sertifikat
                        </a>
                    </div>
                    @if(session('success'))
                        {{-- Notifikasi --}}
                    @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($certificates as $certificate)
                            <div class="bg-gray-50 border rounded-lg p-4 flex flex-col">
                                <img src="{{ asset('storage/' . $certificate->thumbnail_image) }}" alt="{{ $certificate->title }}" class="rounded-md w-full h-40 object-cover mb-4">
                                <div class="flex-grow">
                                    <h3 class="font-bold text-lg">{{ $certificate->title }}</h3>
                                    <p class="text-sm text-gray-600">{{ $certificate->organization }}</p>
                                    <p class="text-xs text-gray-500 mb-4">Tanggal: {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d M Y') }}</p>
                                </div>
                                <div class="flex justify-end items-center gap-4 mt-auto border-t pt-4">
                                    <a href="{{ route('admin.certificates.edit', $certificate->id) }}" class="text-blue-600 hover:text-blue-900" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-full text-center text-gray-500">Belum ada sertifikat.</p>
                        @endforelse
                    </div>
                     <div class="mt-4">
                        {{ $certificates->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>