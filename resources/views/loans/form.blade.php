<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Barang</label>
        <select name="item_id" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" required>
            @foreach($items as $item)
            <option value="{{ $item->id }}" {{ old('item_id', $loan->item_id ?? '') == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Peminjam</label>
        <input type="text" name="borrower_name" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" value="{{ old('borrower_name', $loan->borrower_name ?? '') }}" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Unit Peminjam</label>
        <input type="text" name="borrower_unit" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" value="{{ old('borrower_unit', $loan->borrower_unit ?? '') }}" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pinjam</label>
        <input type="date" name="borrow_date" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" value="{{ old('borrow_date', $loan->borrow_date ?? date('Y-m-d')) }}" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kembali</label>
        <input type="date" name="return_date" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" value="{{ old('return_date', $loan->return_date ?? '') }}">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
        <select name="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" required>
            @foreach(['dipinjam', 'dikembalikan'] as $status)
            <option value="{{ $status }}" {{ old('status', $loan->status ?? '') == $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
        <textarea name="notes" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">{{ old('notes', $loan->notes ?? '') }}</textarea>
    </div>
</div>