<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Location') }}
        </h2>
    </x-slot>
    <div class="max-w-full mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-semibold text-gray-800">Daftar Lokasi</h1>
                <div x-data="{ open: false }">
                    <button
                        @click="open = true"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                        + Tambah Lokasi
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
                                class="bg-white p-6 rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full"
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
                                            Tambah Lokasi
                                        </h3>
                                    </div>
                                    <span class="cursor-pointer" @click="open = false">✕</span>
                                </div>

                                <!-- Modal body -->
                                <div class="text-left my-2">
                                    @include('locations.form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <a href="{{ route('locations.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    + Tambah Lokasi
                </a> -->
            </div>

            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded">
                {{ session('success') }}
            </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nama Lokasi</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($locations as $location)
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2 text-gray-800">{{ $location->name }}</td>
                            <td class="px-4 py-2 space-x-2 flex">
                                <div x-data="{ open: false }">
                                    <button
                                        @click="open = true"
                                        class="inline-block bg-yellow-600 text-white px-3 py-1 rounded text-sm hover:bg-yellow-700 transition">
                                        Edit
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
                                                class="bg-white p-6 rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full"
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
                                                            Edit Lokasi
                                                        </h3>
                                                    </div>
                                                    <span class="cursor-pointer" @click="open = false">✕</span>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="text-left my-2">
                                                    @include('locations.edit')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <a href="{{ route('locations.edit', $location) }}" class="inline-block bg-yellow-600 text-white px-3 py-1 rounded text-sm hover:bg-yellow-700 transition">
                                    Edit
                                </a> -->
                                <form action="{{ route('locations.destroy', $location) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-4 py-4 text-gray-500 text-center">Belum ada lokasi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>