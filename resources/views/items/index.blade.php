<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Item') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-semibold text-gray-800">Daftar Barang Inventaris</h1>
                <a href="{{ route('items.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    + Tambah Barang
                </a>
            </div>

            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded">
                {{ session('success') }}
            </div>
            @endif
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full text-sm text-left text-gray-700 divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Kode</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nama</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Kategori</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Lokasi</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Kondisi</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Jumlah</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Gambar</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2 text-gray-800">{{ $item->code }}</td>
                            <td class="px-4 py-2 text-gray-800">{{ $item->name }}</td>
                            <td class="px-4 py-2 text-gray-800">{{ $item->category->name }}</td>
                            <td class="px-4 py-2 text-gray-800">{{ $item->location->name }}</td>
                            <td class="px-4 py-2 text-gray-800">{{ ucfirst($item->condition) }}</td>
                            <td class="px-4 py-2 text-gray-800">{{ $item->quantity }}</td>
                            <td class="px-4 py-2">
                                @if($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}"
                                    alt="gambar"
                                    class="w-12 h-12 object-cover rounded">
                                @else
                                <span class="text-gray-400 text-sm italic">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 space-x-2 whitespace-nowrap flex">
                                <a href="{{ route('items.edit', $item) }}"
                                    class="inline-block bg-yellow-600 text-white px-3 py-1 rounded text-sm hover:bg-yellow-700 transition">
                                    Edit
                                </a>
                                <div x-data="{ open: false }">
                                    <button
                                        @click="open = true"
                                        class="inline-block bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700 transition">
                                        Riwayat
                                    </button>
                                    <div
                                        @keydown.escape.window="open = false"
                                        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                        x-show="open"
                                        x-cloak
                                        style="display: none">
                                        <!-- Modal -->
                                        <div class="flex items-center justify-center min-h-screen">
                                            <div
                                                class="bg-white p-6 rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-6xl sm:w-full"
                                                @click.away="open = false"
                                                x-transition:enter="ease-out duration-100"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100 scale-100"
                                                x-transition:leave="ease-in duration-200"
                                                x-transition:leave-start="opacity-100 scale-100"
                                                x-transition:leave-end="opacity-0">
                                                <!-- Modal header -->
                                                <div class="flex items-start justify-between">
                                                    <div class="text-left">
                                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                             Riwayat Aktivitas - {{ $item->name }}
                                                        </h3>
                                                    </div>
                                                    <span class="cursor-pointer" @click="open = false">✕</span>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="text-left my-2">
                                                    @include('items.logs', ['logs' => $item->logs])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <a href="{{ route('items.logs', $item) }}"
                                    class="inline-block bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700 transition">
                                    Riwayat
                                </a> -->
                                <form action="{{ route('items.destroy', $item) }}"
                                    method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-4 text-center text-gray-500 italic">
                                Belum ada data barang.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>