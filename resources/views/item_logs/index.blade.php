<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Item Activity Logs') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6 py-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h4 class="mb-4">Log Aktivitas Barang</h4>

            {{-- Filter --}}
            <form method="GET" action="{{ route('item_logs.index') }}"
                class="mb-6 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md grid grid-cols-1 md:grid-cols-4 gap-4">

                <!-- Dari Tanggal -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Dari Tanggal</label>
                    <input type="date"
                        id="start_date"
                        name="start_date"
                        value="{{ request('start_date') }}"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring focus:ring-blue-300 text-sm">
                </div>

                <!-- Sampai Tanggal -->
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sampai Tanggal</label>
                    <input type="date"
                        id="end_date"
                        name="end_date"
                        value="{{ request('end_date') }}"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring focus:ring-blue-300 text-sm">
                </div>

                <!-- Jenis Aktivitas -->
                <div>
                    <label for="activity_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jenis Aktivitas</label>
                    <select id="activity_type"
                        name="activity_type"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring focus:ring-blue-300 text-sm">
                        <option value="">-- Semua Aktivitas --</option>
                        <option value="penambahan" {{ request('activity_type')=='penambahan' ? 'selected' : '' }}>Penambahan</option>
                        <option value="perubahan" {{ request('activity_type')=='perubahan' ? 'selected' : '' }}>Perubahan</option>
                        <option value="pindah_lokasi" {{ request('activity_type')=='pindah_lokasi' ? 'selected' : '' }}>Pindah Lokasi</option>
                        <option value="perbaikan" {{ request('activity_type')=='perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                        <option value="penghapusan" {{ request('activity_type')=='penghapusan' ? 'selected' : '' }}>Penghapusan</option>
                    </select>
                </div>

                <!-- Tombol Filter -->
                <div class="flex items-end">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow transition duration-200">
                        Filter
                    </button>
                </div>
            </form>


            {{-- Tabel --}}
            <div class="overflow-x-auto bg-white rounded-lg shadow">

                <table class="min-w-full text-sm text-left text-gray-700 divide-y divide-gray-200">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider text-nowrap">
                        <tr>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Barang</th>
                            <th class="px-4 py-3">Jenis Aktivitas</th>
                            <th class="px-4 py-3">User</th>
                            <th class="px-4 py-3">Deskripsi</th>
                            <th class="px-4 py-3">Dari Lokasi</th>
                            <th class="px-4 py-3">Ke Lokasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($logs as $log)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">{{ $log->created_at }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $log->item->name ?? '-' }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ ucfirst($log->activity_type) }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $log->user->name ?? '-' }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $log->description }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $log->fromLocation->name ?? '-' }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $log->toLocation->name ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-6 text-center text-gray-500">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $logs->links() }}
        </div>
    </div>
</x-app-layout>