<x-app-layout>
    <div class="max-w-xl mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Kategori</h1>

            <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Nama Kategori -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm 
                               focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50
                               transition duration-200"
                        required 
                        value="{{ old('name') }}"
                    >
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <a href="{{ route('categories.index') }}" 
                        class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg shadow-sm
                               hover:bg-gray-200 transition duration-200">
                        ← Kembali
                    </a>
                    <button type="submit" 
                        class="px-5 py-2 bg-blue-600 text-white font-medium rounded-lg shadow-sm
                               hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:outline-none
                               transition duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
