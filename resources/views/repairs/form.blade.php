<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Barang -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Barang</label>

        @if(auth()->user()->role === 'teknisi')
        <select disabled
            class="w-full rounded-lg border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
            @foreach($items as $item)
            <option value="{{ $item->id }}" {{ old('item_id', $repair->item_id ?? '') == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
            @endforeach
        </select>
        <!-- Hidden input untuk tetap mengirim data -->
        <input type="hidden" name="item_id" value="{{ old('item_id', $repair->item_id ?? '') }}">
        @else
        <!-- Normal editable select untuk admin -->
        <select name="item_id" required
            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
            @foreach($items as $item)
            <option value="{{ $item->id }}" {{ old('item_id', $repair->item_id ?? '') == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
            @endforeach
        </select>
        @endif
    </div>


    @if(auth()->user()->role === 'admin')
    <!-- Penanggung Jawab -->
    @if(isset($handlers))
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Penanggung Jawab</label>
        <select name="handled_by"
            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
            <option value="">- Belum Ditentukan -</option>
            @foreach($handlers as $user)
            <option value="{{ $user->id }}" {{ old('handled_by', $repair->handled_by ?? '') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
            @endforeach
        </select>
    </div>
    @endif
    @endif


    <!-- Tanggal Lapor -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lapor</label>

        @if(auth()->user()->role === 'teknisi')
        <!-- Disabled hanya untuk tampilan -->
        <input type="date"
            value="{{ old('report_date', $repair->report_date ?? date('Y-m-d')) }}"
            disabled
            class="w-full rounded-lg border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" />
        <!-- Hidden input agar nilai tetap terkirim -->
        <input type="hidden" name="report_date" value="{{ old('report_date', $repair->report_date ?? date('Y-m-d')) }}">
        @else
        <!-- Editable untuk role lain -->
        <input type="date" name="report_date"
            value="{{ old('report_date', $repair->report_date ?? date('Y-m-d')) }}" required
            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" />
        @endif
    </div>


    <!-- Tanggal Perbaikan -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Perbaikan</label>

        @if(auth()->user()->role === 'teknisi')
        <!-- Disabled untuk tampilan -->
        <input type="date"
            value="{{ old('repair_date', $repair->repair_date ?? '') }}"
            disabled
            class="w-full rounded-lg border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" />
        <!-- Hidden input agar tetap terkirim -->
        <input type="hidden" name="repair_date" value="{{ old('repair_date', $repair->repair_date ?? '') }}">
        @else
        <!-- Editable -->
        <input type="date" name="repair_date"
            value="{{ old('repair_date', $repair->repair_date ?? '') }}"
            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" />
        @endif
    </div>

    <!-- Status -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
        <select name="status" required
            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">

            @foreach(auth()->user()->role === 'staff' ? ['dilaporkan'] : ['dilaporkan', 'diproses', 'selesai'] as $status)
            <option value="{{ $status }}" {{ old('status', $repair->status ?? '') == $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
            @endforeach

        </select>
    </div>

    <!-- Catatan -->
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>

        @if(auth()->user()->role === 'teknisi')
        <!-- Disabled textarea -->
        <textarea rows="4" disabled
            class="w-full rounded-lg border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">{{ old('notes', $repair->notes ?? '') }}</textarea>
        <!-- Hidden agar terkirim -->
        <input type="hidden" name="notes" value="{{ old('notes', $repair->notes ?? '') }}">
        @else
        <!-- Editable -->
        <textarea name="notes" rows="4"
            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">{{ old('notes', $repair->notes ?? '') }}</textarea>
        @endif
    </div>
</div>