<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loan') }}
        </h2>
    </x-slot>
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            {{-- Header dan Tombol --}}
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-semibold text-gray-700">Data Peminjaman Barang</h1>
                <a href="{{ route('loans.create') }}"
                    class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    + Tambah Peminjaman
                </a>
            </div>

            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
            @endif

            {{-- Tabel Responsif --}}
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full text-sm text-left text-gray-700 divide-y divide-gray-200">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Barang</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Peminjam</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Unit</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600 text-nowrap">Tanggal Pinjam</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600 text-nowrap">Tanggal Kembali</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Status</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Catatan</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($loans as $loan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-nowrap">{{ $loan->item->name }}</td>
                            <td class="px-4 py-3">{{ $loan->borrower_name }}</td>
                            <td class="px-4 py-3 text-nowrap">{{ $loan->borrower_unit }}</td>
                            <td class="px-4 py-3">{{ $loan->borrow_date }}</td>
                            <td class="px-4 py-3">{{ $loan->return_date ?? '-' }}</td>
                            <td class="px-4 py-3 capitalize">
                                <span class=" inline-block px-3 py-1 rounded text-xs font-medium capitalize
                                 {{ $loan->status === 'dipinjam' ? 'bg-yellow-400 text-white hover:bg-yellow-500' : '' }}
                                  {{ $loan->status === 'dikembalikan' ? 'bg-sky-500 text-white hover:bg-sky-600' : '' }}
                                   ">
                                    {{ $loan->status }}
                                </span>
                            </td>
                            <td class="px-4 py-5">{{ $loan->notes ?? '-' }}</td>
                            <td class="px-4 py-5 space-x-2 flex">
                                <a href="{{ route('loans.edit', $loan) }}"
                                    class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition text-xs">
                                    Edit
                                </a>
                                <form action="{{ route('loans.destroy', $loan) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition text-xs">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-6 text-center text-gray-500">
                                Belum ada data peminjaman barang.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>