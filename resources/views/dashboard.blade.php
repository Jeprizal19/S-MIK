<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <p class="mb-1">Halo, <span class="font-semibold">{{ Auth::user()->name }}</span>!</p>
                <p class="mb-1">Role Anda: <strong class="capitalize">{{ Auth::user()->role }}</strong></p>
                <p class="mb-3">Joined: {{ auth()->user()->created_at->format('d M Y') }}</p>
                @auth
                @if (Auth::user()->role === 'admin')
                <p class="text-green-600 font-semibold">Selamat datang, Admin!</p>
                @endif
                @endauth
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Total Barang -->
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-5 hover:shadow-lg transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 7h18M3 12h18M3 17h18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Total Barang</h3>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $totalBarang }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Kategori -->
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-5 hover:shadow-lg transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M4 6h16M4 12h16M4 18h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Total Kategori</h3>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $totalKategori }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Lokasi -->
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-5 hover:shadow-lg transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Total Lokasi</h3>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $totalLokasi }}</p>
                        </div>
                    </div>
                </div>

                <!-- Peminjaman Aktif -->
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-5 hover:shadow-lg transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M9 12h6M12 9v6M4 12a8 8 0 1116 0 8 8 0 01-16 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Peminjaman Aktif</h3>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $peminjamanAktif }}</p>
                        </div>
                    </div>
                </div>

                <!-- Perbaikan Aktif -->
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-5 hover:shadow-lg transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M15 12h.01M12 15h.01M9 12h.01M12 9h.01M12 12v.01" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Perbaikan Aktif</h3>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $perbaikanAktif }}</p>
                        </div>
                    </div>
                </div>

                <!-- User Terdaftar -->
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-5 hover:shadow-lg transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M5.121 17.804A9 9 0 1118.879 6.196" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">User Terdaftar</h3>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $totalUser }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
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
    </div>
</x-app-layout>