<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Item / Edit') }}
        </h2>
    </x-slot>
    <div class="max-w-full mx-auto px-4 py-6">
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Barang</h1>

            <form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('items.form', ['item' => $item])
                <!-- <button type="submit" class="btn btn-success">Perbarui</button>
                <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a> -->
            </form>
        </div>
    </div>
</x-app-layout>