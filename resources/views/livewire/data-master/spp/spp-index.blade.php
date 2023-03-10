<div class="card flex-fill border-0 my-shadow-2">
    <div class="card-header border-0 bg-white pt-3 mb-0">
        <x-button color="info" modal="true" target="#modalTambahSpp">Tambah Data</x-button>
    </div>
    <div class="card-body border-0">
        <x-table>
            <thead>
                <tr>
                    <th>Kode SPP</th>
                    {{-- <th>Nomor SPP</th> --}}
                    <th>tahun SPP</th>
                    <th>Nominal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spps as $spp)                                
                <tr>
                    <td>{{ $spp->kode_spp }}</td>
                    <td>{{ $spp->tahun }}</td>
                    <td>{{ $spp->nominal }}</td>
                    {{-- <td></td> --}}
                    <td style="max-width: 60px;">
                        <div class="d-flex" style="gap: 4px">
                            <x-button color="success" modal="true" target="#modalEditSpp" wire:click="getSpp({{ $spp }})">
                                <i class="fas fa-edit"></i>
                                Edit
                            </x-button>
                            <x-button color="danger" class="delete" data-id="{{ $spp->id }}">
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
@push('scripts')
    <script>
        $.each($('.delete'), function (index, element) { 
             element.onclick = function () {                
                Livewire.emit("swalConfirm", ["question","Yakin hapus spp ?",true,"sppDelete", $(this).attr('data-id')]);
             };
        });
    </script>
@endpush