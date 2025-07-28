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
                        <a href="{{ route('admin.certificates.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            + Tambah Sertifikat
                        </a>
                    </div>
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($certificates as $certificate)
                            <div class="bg-gray-50 border rounded-lg p-4">
                                <img src="{{ asset('storage/' . $certificate->thumbnail_image) }}" alt="{{ $certificate->title }}" class="rounded-md w-full h-40 object-cover mb-4">
                                <h3 class="font-bold text-lg">{{ $certificate->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $certificate->organization }}</p>
                                <p class="text-xs text-gray-500 mb-4">Tanggal: {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d M Y') }}</p>
                                <div class="flex justify-end gap-4">
                                    <a href="{{ route('admin.certificates.edit', $certificate->id) }}" class="font-medium text-indigo-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-3 text-center">Belum ada sertifikat.</p>
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