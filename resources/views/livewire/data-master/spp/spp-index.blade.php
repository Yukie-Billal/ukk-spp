<div class="col-12 px-4 pt-4">
    <div class="col-12 d-flex justify-content-between mb-2 px-2">
        <x-button color="info" modal="true" target="#modalTambahSpp">
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
                        {{-- <th>Kode SPP</th> --}}
                        {{-- <th>Nomor SPP</th> --}}
                        <th>tahun SPP</th>
                        <th>Nominal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spps as $spp)
                    <tr>
                        {{-- <td>{{ $spp->kode_spp }}</td> --}}
                        <td>{{ $spp->tahun }}</td>
                        <td>Rp. {{ number_format($spp->nominal) }}</td>
                        {{-- <td></td> --}}
                        <td style="max-width: 60px;">
                            <div class="d-flex" style="gap: 4px">
                                <x-button color="success" class="button-sm" modal="true" target="#modalEditSpp" wire:click="getSpp({{ $spp }})">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </x-button>
                                <x-button color="danger" class="button-sm" wire:click='confirmDelete({{ $spp->id }})'>
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
</div>