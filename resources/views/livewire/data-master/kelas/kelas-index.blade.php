<div class="card flex-fill border-0 my-shadow-2">
    <div class="card-header border-0 bg-white pt-3 mb-0">
        <x-button color="info" modal="true" target="#modalTambahKelas">Tambah Data</x-button>
    </div>
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
                    <td style="max-width: 60px;">
                        <div class="d-flex" style="gap: 4px">
                            <x-button color="success" modal="true" target="#modalEditKelas" wire:click="getKelas({{ $kelas }})">
                                <i class="fas fa-edit"></i>
                                Edit
                            </x-button>
                            <x-button color="danger" class="delete" wire:click='confirmDelete({{ $kelas->id }})'>
                                <i class="fa fa-trash"></i>
                                Hapus
                            </x-button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </x-table>
    </div>
</div>