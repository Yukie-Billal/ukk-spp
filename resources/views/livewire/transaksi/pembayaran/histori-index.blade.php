<x-card>
    <div class="card-body" wire:poll.5000ms>
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

            @can('IsOperator')
            <thead>
                <tr>
                    @can('IsAdmin')
                        <th>Nama Petugas</th>
                    @endcan
                    <th>Nisn</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Spp</th>
                    <th>Bulan & Tahun Dibayar</th>
                    <th>Jumlah Bayar</th>
                </tr>
            </thead>
                @foreach ($pembayarans as $pembayaran)
                    <tr>
                        @can('IsAdmin')
                            <td>{{ $pembayaran->petugas->nama_petugas }}</td>
                        @endcan
                        <td>{{ $pembayaran->siswa->nisn }}</td>
                        <td>{{ $pembayaran->siswa->nama }}</td>
                        <td>{{ $pembayaran->tgl_bayar->format('Y-m-d') }}</td>
                        {{-- <td>{{ 'Tahun ' .$pembayaran->siswa->spp->tahun . ' ' . ('Rp.'.number_format($pembayaran->siswa->spp->nominal)) }}</td> --}}
                        <td>{{ 'Tahun ' .$pembayaran->siswa->spp->tahun }}</td>
                        <td>{{ $pembayaran->bulan->nama_bulan . ' ' .$pembayaran->tahun_dibayar }}</td>
                        {{-- <td>{{ $pembayaran->tahun_dibayar }}</td> --}}
                        <td>{{ 'Rp.'.number_format($pembayaran->jumlah_bayar) }}</td>
                    </tr>
                @endforeach
            @endcan
        </x-table>
        <iframe id="printf" name="printf" style="display: none;"></iframe>
        <livewire:pembayaran-cetak>
    </div>
</x-card>