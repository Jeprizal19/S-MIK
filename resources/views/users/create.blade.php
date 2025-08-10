<x-app-layout>
    <div class="max-w-full mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Pengguna</h1>
            <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
                @csrf
                @include('users.form')
            </form>
        </div>
    </div>
</x-app-layout>
