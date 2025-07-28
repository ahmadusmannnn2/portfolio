<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Portfolios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    {{-- Tombol Tambah --}}
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('admin.portfolios.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            + Tambah Portfolio
                        </a>
                    </div>

                    {{-- Pesan Sukses --}}
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Sukses!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    {{-- Tabel --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Gambar</th>
                                    <th scope="col" class="px-6 py-3">Judul</th>
                                    <th scope="col" class="px-6 py-3">Link</th>
                                    <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($portfolios as $p)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        @if($p->image)
                                            <img src="{{ asset('storage/'.$p->image) }}" width="100" alt="{{ $p->title }}" class="rounded">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $p->title }}</td>
                                    <td class="px-6 py-4">
                                        @if($p->project_link)
                                            <a href="{{ $p->project_link }}" target="_blank" class="text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('admin.portfolios.edit', $p->id) }}" class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">Edit</a>
                                        <form action="{{ route('admin.portfolios.destroy', $p->id) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('Yakin ingin dihapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                                        </form>
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