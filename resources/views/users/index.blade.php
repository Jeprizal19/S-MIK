<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Informasi Pengguna') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">

            <!-- Header & Tambah Pengguna -->
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-semibold text-gray-700">Kontrol Akses</h1>

                <div x-data="{ open: false }">
                    <button
                        @click="open = true"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                        + Tambah Pengguna
                    </button>

                    <!-- Modal Tambah Pengguna -->
                    <div
                        x-show="open"
                        x-cloak
                        @keydown.escape.window="open = false"
                        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                        style="display: none">

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

                                <!-- Modal Header -->
                                <div class="flex items-start justify-between">
                                    <h3 class="text-lg font-medium text-gray-900">Tambah Pengguna</h3>
                                    <span class="cursor-pointer" @click="open = false">✕</span>
                                </div>

                                <!-- Modal Body -->
                                <div class="text-left my-2">
                                    @include('users.form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel User -->
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full bg-white border border-gray-200 rounded">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Name</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Email</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Role</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="border-t border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-2 text-gray-800">{{ $user->name }}</td>
                                <td class="px-4 py-2 text-gray-800">{{ $user->email }}</td>
                                <td class="px-4 py-2 text-gray-800">{{ ucfirst($user->role) }}</td>

                                <td class="px-4 py-2 space-x-2 flex">
                                    <!-- Tombol Edit -->
                                    @if(auth()->id() !== $user->id)
                                        <div x-data="{ open: false }">
                                            <button
                                                @click="open = true"
                                                class="bg-yellow-600 text-white px-3 py-1 rounded text-sm hover:bg-yellow-700 transition">
                                                Edit
                                            </button>

                                            <!-- Modal Edit -->
                                            <div
                                                x-show="open"
                                                x-cloak
                                                @keydown.escape.window="open = false"
                                                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                style="display: none">

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

                                                        <!-- Modal Header -->
                                                        <div class="flex items-start justify-between">
                                                            <h3 class="text-lg font-medium text-gray-900">Edit</h3>
                                                            <span class="cursor-pointer" @click="open = false">✕</span>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <div class="text-left my-2">
                                                            @include('users.edit')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <button class="px-3 py-1 bg-gray-300 text-gray-600 rounded cursor-not-allowed" disabled>
                                            Dirimu
                                        </button>
                                    @endif

                                    <!-- Tombol Hapus -->
                                    @if(auth()->id() !== $user->id)
                                        <form
                                            action="{{ route('users.destroy', $user) }}"
                                            method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 transition">
                                                Hapus
                                            </button>
                                        </form>
                                    @else
                                        <button class="px-3 py-1 bg-gray-300 text-gray-600 rounded cursor-not-allowed" disabled>
                                            Dirimu
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-4 text-gray-500 text-center">
                                    Belum ada Data.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
