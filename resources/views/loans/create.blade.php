<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loan / Create') }}
        </h2>
    </x-slot>
    <div class="max-w-full mx-auto px-4 py-6">
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Peminjaman</h1>
            <form action="{{ route('loans.store') }}" method="POST" class="space-y-6">
                @csrf
                @include('loans.form')
                <div class="flex justify-between items-center pt-4 border-t border-gray-100">

                    <a href="{{ route('loans.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">Kembali</a>
                    <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring focus:ring-blue-300 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>