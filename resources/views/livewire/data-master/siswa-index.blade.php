<div class="col-12 px-4 pt-4">
    <div class="col-12 d-flex justify-content-between px-2 mb-2">
        <x-button color="info" class="button-sm" modal="true" target="#modalTambahSiswa">
            <i class="fa fa-plus me-1" aria-hidden="true"></i>
            Tambah Siswa
        </x-button>
        <div class="col-md-3">
            <x-form.input type="search" wire:model.debounce.500ms='search' placeholder="Search ..." />
        </div>
    </div>
    <x-card>
        <div class="card-body">
            <x-table>
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kompetensi Keahlian</th>
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
                        <td>{{ $siswa->kelas->tingkat . ' ' . $siswa->kelas->kompetensi_keahlian . ' ' . $siswa->kelas->nama_kelas }}</td>
                        {{-- <td>{{ $siswa->kelas->nama_kelas }}</td> --}}
                        <td>{{ 'Tahun ' . $siswa->spp->tahun . ' | Rp.' . number_format($siswa->spp->nominal) }}</td>
                        <td>
                            <div class="d-flex" style="gap: 4px;">
                                <x-button color="success" class="button-sm" modal="true" target="#modalEditSiswa" wire:click='getSiswa({{ $siswa }})'>
                                    <i class="fas fa-edit"></i>
                                </x-button>
                                <x-button color="danger" class="button-sm" wire:click='deleteConfirm({{ $siswa->nisn }})'>
                                    <i class="fas fa-trash"></i>
                                </x-button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </x-table>
        </div>
    </x-card>
</div>
