<x-layout-app>
    <form action="#" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="npm">NPM</label>
            <input type="text" name="npm" id="npm">

            <label for="nama_mhs">Nama Mahasiswa</label>
            <input type="text" name="nama_mhs" id="nama_mhs">

            <label for="program_studi">Program Studi</label>
            <input type="text" name="program_studi" id="program_studi">
        </div>
    </form>
</x-layout-app>