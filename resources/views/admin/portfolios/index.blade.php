<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Portfolios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('admin.portfolios.create') }}" class="inline-flex items-center px-4 py-2 bg-theme-main border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-theme-text focus:outline-none transition">
                            + Tambah Portfolio
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Sukses!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Gambar</th>
                                    <th scope="col" class="px-6 py-3">Judul</th>
                                    <th scope="col" class="px-6 py-3">Link</th>
                                    <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($portfolios as $p)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        @if($p->image)
                                            <img src="{{ asset('storage/'.$p->image) }}" width="100" alt="{{ $p->title }}" class="rounded">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $p->title }}</td>
                                    <td class="px-6 py-4">
                                        @if($p->project_link)
                                            <a href="{{ $p->project_link }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
    <div class="flex items-center justify-end gap-4">
        {{-- Tombol Edit Ikon --}}
        <a href="{{ route('admin.portfolios.edit', $p->id) }}" class="text-blue-600 hover:text-blue-900" title="Edit">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        </a>
        {{-- Tombol Hapus Ikon --}}
        <form action="{{ route('admin.portfolios.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </button>
        </form>
    </div>
</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        Belum ada portfolio.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $portfolios->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>