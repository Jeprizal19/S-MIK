{{-- Tabel Responsif --}}
<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="min-w-full text-sm text-gray-700 divide-y divide-gray-200">
        <thead class="bg-gray-100 text-xs uppercase text-gray-600 tracking-wider">
            <tr>
                <th class="px-4 py-3 text-left">Tanggal</th>
                <th class="px-4 py-3 text-left">User</th>
                <th class="px-4 py-3 text-left">Jenis Aktivitas</th>
                <th class="px-4 py-3 text-left">Lokasi Asal</th>
                <th class="px-4 py-3 text-left">Lokasi Tujuan</th>
                <th class="px-4 py-3 text-left">Deskripsi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($logs as $log)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 whitespace-nowrap">{{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y H:i') }}</td>
                <td class="px-4 py-3 whitespace-nowrap">{{ $log->user->name ?? '-' }}</td>
                <td class="px-4 py-3 capitalize">{{ str_replace('_', ' ', $log->activity_type) }}</td>
                <td class="px-4 py-3">{{ $log->fromLocation->name ?? '-' }}</td>
                <td class="px-4 py-3">{{ $log->toLocation->name ?? '-' }}</td>
                <td class="px-4 py-3">{{ $log->description ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                    Belum ada aktivitas untuk barang ini.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>