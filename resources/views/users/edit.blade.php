<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Nama -->
    <div class="mb-4">
        <label for="name" class="block font-medium text-gray-700">Nama</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label for="email" class="block font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
    </div>

    <!-- Role -->
    <div class="mb-4">
        <label for="role" class="block font-medium text-gray-700">Role</label>
        <select name="role" id="role"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="teknisi" {{ old('role', $user->role) == 'teknisi' ? 'selected' : '' }}>Teknisi</option>
            <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>Staff</option>
        </select>
    </div>
    <div class="flex justify-end">
        <a href="{{ route('users.index') }}"
            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 mr-2">Batal</a>
        <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
    </div>
</form>