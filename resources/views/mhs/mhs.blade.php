<x-app-layout>

    <div>
        <table class="table-column" style="border: 1px solid black;">
            <thead style="border: 1px solid black;">
                <tr>
                    <th>npm</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                </tr>
            </thead>
            <tbody style="border: 1px solid black;">
                <tr style="border: 1px solid black;">
                    @foreach($mhs as $item)
                    <td>{{$item->npm}}</td>
                    <td>{{$item->nama_mhs}}</td>
                    <td>{{$item->program_studi}}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>