<x-card>
    <div class="card-body" wire:poll>
        <x-table class="table-striped">
            <thead>
                <tr>
                    <th class="header-s">Nama Bulan</th>
                    <th class="header-s">Status Pembayaran</th>
                </tr>
            </thead>
            @if ($siswa)
                @foreach ($bulans as $bulan)
                    @php
                        $warna ='danger';
                        $text = 'Belum Dibayar';
                        $id = false;
                    @endphp
                    @foreach ($pembayarans as $pembayaran)
                        @if ($pembayaran->bulan_dibayar == $bulan->id)
                            @php
                                $warna = 'success';
                                $text = 'Lunas';
                                $id = $pembayaran->pembayaran_id;
                            @endphp
                        @endif
                    @endforeach
                    <tr>
                        <td class="text-l-medium">{{ $bulan->nama_bulan }}</td>
                        <td>
                            <x-button color="{{ $warna }}" class="button-sm py-1">{{ $text }}</x-button>
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach ($bulans as $bulan)
                    <tr>
                        <td class="text-l-medium">{{ $bulan->nama_bulan }}</td>
                        <td>
                            <x-button color="danger" class="button-sm py-1">Belum Dibayar</x-button>
                        </td>
                        <td style="max-width: 100px">
                            @if ($pilih)
                            <div class="d-flex" style="gap: 4px">
                                <input type="checkbox" value="januari" id="{{ $bulan->nama_bulan }}" class="checkBulan">
                                <label for="{{ $bulan->nama_bulan }}">{{ $bulan->nama_bulan }}</label>
                            @else                                    
                            <div class="d-flex justify-content-center" style="gap: 4px">
                                <x-button color="success" class="button-sm modalPembayaran" data-siswa="{{ $siswa ? $siswa->nisn : '' }}" data-bulan="{{ $bulan->id }}" data-tahun="{{ $tahun }}">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </x-button>
                                <x-button color="danger" class="button-sm swalCancel" data-id="">
                                    <i class="fa fa-x" aria-hidden="true"></i>
                                </x-button>
                                <x-button color="info" class="button-sm cetakPembayaran" data-id="">
                                    Cetak
                                </x-button>
                            @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </x-table>
        <iframe id="printf" name="printf" style="display: none;"></iframe>
        <livewire:pembayaran-cetak>
    </div>
</x-card>