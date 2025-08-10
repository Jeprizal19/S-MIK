<x-app-layout>
    <div class="max-w-xl mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Lokasi</h1>

            <form action="{{ route('locations.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lokasi</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        required 
                        value="{{ old('name') }}"
                    >
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('locations.index') }}" class="inline-block px-4 py-2 text-gray-800">
                        Kembali
                    </a>
                    <button type="submit" class="inline-block px-4 py-2 text-gray-800">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
