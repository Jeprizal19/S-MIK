<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Repair') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6 py-10">
        <div class="bg-white shadow-md rounded-lg p-6">

            {{-- Judul dan tombol --}}
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-semibold text-gray-800">Data Perbaikan Barang</h1>
                <a href="{{ route('repairs.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    + Tambah Perbaikan
                </a>
            </div>

            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded">
                {{ session('success') }}
            </div>
            @endif

            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full text-sm text-left text-gray-700 divide-y divide-gray-200">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider text-nowrap">
                        <tr>
                            <th class="px-4 py-3">Barang</th>
                            <th class="px-4 py-3">Pelapor</th>
                            <th class="px-4 py-3">Penanggung Jawab</th>
                            <th class="px-4 py-3">Tanggal Lapor</th>
                            <th class="px-4 py-3">Tanggal Perbaikan</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Catatan</th>
                            @if(in_array(auth()->user()->role, ['admin', 'teknisi']))
                            <th class="px-4 py-3">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($repairs as $repair)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">{{ $repair->item->name }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $repair->reporter->name }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $repair->handler->name ?? '-' }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $repair->report_date }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $repair->repair_date ?? '-' }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class=" inline-block px-3 py-1 rounded text-xs font-medium capitalize
                                {{ $repair->status === 'dilaporkan' ? 'bg-red-500 text-white hover:bg-red-600' : '' }}
                                 {{ $repair->status === 'diproses' ? 'bg-yellow-400 text-white hover:bg-yellow-500' : '' }}
                                  {{ $repair->status === 'selesai' ? 'bg-sky-500 text-white hover:bg-sky-600' : '' }}
                                   ">
                                    {{ $repair->status }}
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ $repair->notes ?? '-' }}</td>
                            @if(in_array(auth()->user()->role, ['admin', 'teknisi']))
                            <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                                <a href="{{ route('repairs.edit', $repair) }}"
                                    class="inline-block bg-yellow-600 text-white px-3 py-1 rounded text-sm hover:bg-yellow-700 transition">
                                    Edit
                                </a>
                                <form action="{{ route('repairs.destroy', $repair) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-6 text-center text-gray-500">
                                Belum ada data perbaikan barang.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>