<x-app-layout>
    <form action="{{ route('mhs.store') }}" method="POST">
        @csrf

        <label for="npm">NPM</label>
        <input type="text" name="npm" id="npm">

        <label for="nama_mhs">Nama</label>
        <input type="text" name="nama_mhs" id="nama_mhs">

        <label for="program_studi">Program Studi</label>
        <input type="text" name="program_studi" id="program_studi">

        <button type="submit">simpan</button>
    </form>
</x-app-layout>