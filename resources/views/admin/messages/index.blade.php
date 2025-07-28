<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pesan Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Pengirim</th>
                                    <th scope="col" class="px-6 py-3">Pesan</th>
                                    <th scope="col" class="px-6 py-3">Tanggal</th>
                                    <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $message)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $message->name }}
                                        <div class="text-xs text-gray-500">{{ $message->email }}</div>
                                        <div class="text-xs text-gray-500">{{ $message->phone }}</div>
                                    </td>
                                    <td class="px-6 py-4">{{ $message->message }}</td>
                                    <td class="px-6 py-4">{{ $message->created_at->format('d M Y, H:i') }}</td>
                                    <td class="px-6 py-4 text-right">
                                        {{-- Tombol Balas WhatsApp --}}
                                        <a href="https://wa.me/{{ $message->phone }}" target="_blank" class="font-medium text-green-600 hover:underline">WhatsApp</a>
                                        
                                        {{-- Tombol Balas Email --}}
                                        <a href="mailto:{{ $message->email }}" class="font-medium text-blue-600 hover:underline ml-4">Email</a>
                                        
                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('Yakin ingin hapus pesan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center">Tidak ada pesan masuk.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>