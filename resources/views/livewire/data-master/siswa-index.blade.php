<div>
    <div class="row">
        <div class="col-3">
            <button class="button button-success d-flex p-0 px-2 justify-content-center align-items-center text-m-medium" data-bs-toggle="modal" data-bs-target="#modalEditDataBarang">Tambah Data Siswa</button>
        </div>
    </div>
    <x-table>
        <thead>
            <tr>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
            <tr>
                <td>{{ $siswa->nisn }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->kelas->nama_kelas }}</td>
                <td>{{ $siswa->kelas->kompetensi_keahlian }}</td>
                <td>
                    <button class="btn btn-danger btn-sm me-2" wire:click='siswaDelete({{ $siswa->nisn }})'>
                        <i class="fas fa-trash-alt me-1"></i>
                        Hapus
                    </button>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditSiswa" wire:click='$emit("getSiswa", {{ $siswa }})'>
                        <i class="fas fa-edit me-1"></i>
                        Edit
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table>

    @push('scripts')
        <script>
            livewire.on('siswaDelete', function (params) {
                console.log(params);
            })
        </script>
    @endpush
</div>
