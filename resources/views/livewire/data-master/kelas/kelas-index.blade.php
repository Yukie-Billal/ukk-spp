<div class="col-12 px-4 pt-4">
    <div class="col-12 d-flex justify-content-between px-2 mb-2">
        <x-button color="info" modal="true" target="#modalTambahKelas">
            <i class="fa fa-plus me-1" aria-hidden="true"></i>            
            Tambah Data
        </x-button>
        <div class="col-md-3">
            <x-form.input type="search" wire:model.debounce.500ms='search' placeholder="Search ..." />
        </div>
    </div>
    <div class="card flex-fill border-0 my-shadow-2">
        <div class="card-body border-0">
            <x-table>
                <thead>
                    <tr>
                        <th>Nama Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelases as $kelas)
                    <tr>
                        <td>{{ $kelas->nama_kelas }}</td>
                        <td>{{ $kelas->kompetensi_keahlian }}</td>
                        <td style="max-width: 76px;">
                            <div class="d-flex" style="gap: 4px" x-data="{open:false}">
                                <x-button color="success" class="button-sm" modal="true" target="#modalEditKelas" wire:click="getKelas({{ $kelas }})">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </x-button>
                                <x-button color="danger" class="button-sm" wire:click='confirmDelete({{ $kelas->id }})'>
                                    <i class="fa fa-trash"></i>
                                    Hapus
                                </x-button>
                                <div class="position-relative">
                                    <x-button color="info" class="button-sm" modal="true" @click="open = true">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </x-button>
                                    <div x-show="open" x-transition @click.outside="open=false" class="bg-white my-shadow-2" style="position: absolute; bottom: -55px; width: 120px; padding: 6px; border-radius: 6px; z-index: 999">
                                        <a href="/siswa?kelas={{ $kelas->id }}" class="button button-info">
                                            Lihat Siswa
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </x-table>
        </div>
    </div>
</div>