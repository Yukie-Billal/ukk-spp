<x-card>
    <div class="card-body" wire:poll>
        <x-table class="table-striped">
            @if (Auth::guard('siswa')->check())                
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
                        @endphp
                        @foreach ($pembayarans as $pembayaran)
                            @if ($pembayaran->bulan_dibayar == $bulan->id)
                                @php
                                    $warna = 'success';
                                    $text = 'Lunas';
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
                        </tr>
                    @endforeach
                @endif
            @endif

            @if ($petugas_id)
                @foreach ($pembayarans as $pembayaran)                
                    <tr>
                        <td>{{ $pembayaran->siswa->nisn }}</td>
                        <td>{{ $pembayaran->siswa->nama }}</td>
                        <td>{{ $pembayaran->bulan->nama_bulan }}</td>
                        <td>{{ $pembayaran->tahun_dibayar }}</td>
                        <td>{{ $pembayaran->jumlah_bayar }}</td>
                        <td>{{ $pembayaran->tgl_bayar }}</td>
                    </tr>
                @endforeach
            @endif
        </x-table>
        <iframe id="printf" name="printf" style="display: none;"></iframe>
        <livewire:pembayaran-cetak>
    </div>
</x-card>