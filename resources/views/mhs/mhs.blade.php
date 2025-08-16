<style>
    table, th, td{
        border: 1px solid black;
    }
</style>
<a href="{{ route('mhs.create') }}">Tambah Data</a>
<div>
    <table>
        <thead>
            <tr>
                <th>npm</th>
                <th>Nama Mahasiswa</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mhs as $item)
            <tr>

                <td>{{$item->npm}}</td>
                <td>{{$item->nama_mhs}}</td>
                <td>{{$item->program_studi}}</td>
                <td>
                    <a href="#">Edit</a>
                    <a href="#">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>