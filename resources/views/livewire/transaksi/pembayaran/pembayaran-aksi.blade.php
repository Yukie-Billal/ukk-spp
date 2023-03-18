<tr>
    <td class="text-l-medium">{{ $bulan->nama_bulan }}</td>
    <td>
        <x-button color="{{ $warna }}" class="button-sm py-1">{{ $text }}</x-button>
    </td>
    <td style="max-width: 100px">
        {{-- @if ($pilih)
        <div class="d-flex" style="gap: 4px">
            <input type="checkbox" value="{{ $bulan->id }}" id="{{ $bulan->nama_bulan }}" class="checkBulan">
            <label for="{{ $bulan->nama_bulan }}">{{ $bulan->nama_bulan }}</label>
        @else                                    
        <div class="d-flex justify-content-lg-center" style="gap: 4px">
            <x-button color="success" class="button-sm modalPembayaran" data-lunas="{{ $id }}" data-siswa="{{ $siswa ? $siswa->nisn : '' }}" data-bulan="{{ $bulan->id }}" data-tahun="{{ $tahun }}">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
            </x-button>
            <x-button color="danger" class="button-sm swalCancel" data-id="{{ $id }}" wire:click>
                <i class="fa fa-x" aria-hidden="true"></i>
            </x-button>
            <x-button color="info" class="button-sm cetak" data-id="{{ $id }}">
                Cetak
            </x-button>
        @endif
        </div> --}}
        @if ($pilih)
        <div class="d-flex" style="gap: 4px">
            <input type="checkbox" value="{{ $bulan->id }}" id="{{ $bulan->nama_bulan }}" class="checkBulan">
            <label for="{{ $bulan->nama_bulan }}">{{ $bulan->nama_bulan }}</label>
        @else                                    
        <div class="d-flex justify-content-lg-center" style="gap: 4px">
            <x-button color="success" class="button-sm" wire:click="bayar">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
            </x-button>
            <x-button color="danger" class="button-sm" wire:click='batalBayar'>
                <i class="fa fa-x" aria-hidden="true"></i>
            </x-button>
            <x-button color="info" class="button-sm">
                Cetak
            </x-button>
        @endif
        </div>
    </td>
</tr>