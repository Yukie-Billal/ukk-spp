<div class="col-12 px-4 pt-4">
    <div class="col-12 d-flex justify-content-between px-2 mb-2">
        <x-button color="info" modal="true" target="#modalTambahPetugas">
            <i class="fa fa-plus me-1" aria-hidden="true"></i>
            Tambah Petugas
        </x-button>
        <div class="col-md-3">
            <x-form.input type="search" wire:model.debounce.500ms='search' placeholder="Search ..." />
        </div>
    </div>
    <div class="card flex-fill border-0">
        <div class="card-body">
            <x-table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama Petugas</th>
                        <th>Alamat</th>
                        <th>No Telephone</th>
                        <th>Role</th>
                        <th style="min-width: 60px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugases as $petugas)
                    <tr>
                        <td>{{ $petugas->petugas_id }}</td>
                        <td>{{ $petugas->username }}</td>
                        <td>{{ $petugas->nama_petugas }}</td>
                        <td>{{ $petugas->alamat }}</td>
                        <td>{{ $petugas->no_telp }}</td>
                        <td>{{ $petugas->role->nama_role }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <x-button color="success" class="button-sm" modal="true" target="#modalEditPetugas" wire:click='getPetugas({{ $petugas->petugas_id }})'>
                                    <i class="fas fa-edit"></i>
                                </x-button>
                                <x-button color="danger" class="button-sm" wire:click="deleteConfirm({{ $petugas->petugas_id }})">
                                    <i class="fas fa-trash"></i>                                
                                </x-button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </x-table>
        </div>
    </div>
</div>