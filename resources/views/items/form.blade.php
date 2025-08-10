<form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <!-- Grid 2 kolom di layar besar -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Kode -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kode</label>
            <input type="text" name="code"
                value="{{ old('code', $item->code ?? '') }}" required
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" />
        </div>

        <!-- Nama -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="name"
                value="{{ old('name', $item->name ?? '') }}" required
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" />
        </div>

        <!-- Kategori -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <select name="category_id" required
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $item->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Lokasi -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
            <select name="location_id" required
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                @foreach($locations as $loc)
                <option value="{{ $loc->id }}" {{ old('location_id', $item->location_id ?? '') == $loc->id ? 'selected' : '' }}>
                    {{ $loc->name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Kondisi -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kondisi</label>
            <select name="condition" required
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                @foreach(['baik', 'rusak', 'perbaikan', 'hilang'] as $cond)
                <option value="{{ $cond }}" {{ old('condition', $item->condition ?? '') == $cond ? 'selected' : '' }}>
                    {{ ucfirst($cond) }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Jumlah -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
            <input type="number" name="quantity" min="1"
                value="{{ old('quantity', $item->quantity ?? 1) }}" required
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" />
        </div>
    </div>

    <!-- Deskripsi -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
        <textarea name="description" rows="4"
            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">{{ old('description', $item->description ?? '') }}</textarea>
    </div>

    <!-- Gambar -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
        <input type="file" name="image"
            class="w-full text-sm text-gray-700 border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
        @if(!empty($item->image_path))
        <img src="{{ asset('storage/'.$item->image_path) }}" alt="Preview" class="mt-3 w-24 h-24 object-cover rounded-lg shadow">
        @endif
    </div>

    <!-- Tombol -->
    <div class="flex justify-between items-center pt-4 border-t border-gray-100">
        <a href="{{ route('items.index') }}"
            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
            ← Kembali
        </a>
        <button type="submit"
            class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring focus:ring-blue-300 transition">
            Simpan
        </button>
    </div>
</form>