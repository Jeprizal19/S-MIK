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
            value="{{ old('name') }}">
        @error('name')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-between items-center">
        <a href="{{ route('locations.index') }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg shadow-sm
                               hover:bg-gray-200 transition duration-200">
            Kembali
        </a>
        <button type="submit" class="px-5 py-2 bg-blue-600 text-white font-medium rounded-lg shadow-sm
                               hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:outline-none
                               transition duration-200">
            Simpan
        </button>
    </div>
</form>