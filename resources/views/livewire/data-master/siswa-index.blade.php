<div>
    <div class="row">
        <div class="col-3">
            
        </div>
    </div>
    <div class="card flex-fill border-0">
        <div class="card-header border-0 bg-transparent pb-0 mb-0 pt-3">
            <x-button color="info" class="button-sm" modal="true" target="#modalTambahSiswa">Tambah Siswa</x-button>
        </div>
        <div class="card-body">
            <x-table>
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Kelas</th>
                        <th>Spp / Tahun Masuk</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                    <tr>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->kelas->kompetensi_keahlian }}</td>
                        <td>{{ $siswa->kelas->nama_kelas }}</td>
                        <td>{{ $siswa->spp->tahun }}</td>
                        <td>
                            <div class="d-flex" style="gap: 4px;">
                                <x-button color="success" class="button-sm" modal="true" target="#modalEditSiswa" wire:click='getSiswa({{ $siswa }})'>
                                    <i class="fas fa-edit me-1"></i>
                                    Edit
                                </x-button>
                                <x-button color="danger" class="button-sm">
                                    <i class="fas fa-trash me-1"></i>
                                    Edit
                                </x-button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </x-table>
        </div>
    </div>

    @push('scripts')
        <script>
            livewire.on('siswaDelete', function (params) {
                console.log(params);
            })
        </script>
    @endpush
</div>
