<x-card>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <small>Tanggal Awal</small>
                <x-form.input type="date" wire:model='tglAwal' />
            </div>
            <div class="col-3">
                <small>Tanggal Akhir</small>
                <x-form.input type="date" wire:model='tglAkhir' />
            </div>
            <div class="col-3 d-flex align-items-end">
                <select wire:change='$emit("getPetugas")' class="select-form" id="id_petugas">
                    <option value="all">Tampilkan Semua</option>
                    @foreach ($petugases as $petugas)
                        <option value="{{ $petugas->petugas_id }}">{{ $petugas->nama_petugas }}</option>
                    @endforeach
                </select>
                <form enctype="multipart/form-data"></form>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end" style="gap: 4px">
                        <button class="button button-info" wire:click='print'>PRINT</button>
                        <button class="button button-success" wire:click='excel'>EXCEL</button>
                        <button class="button button-danger" wire:click='pdf'>PDF</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <x-table class="table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            @can('IsAdmin')
                                <th>Petugas</th>
                            @endcan
                            <th>Tanggal Pembayaran</th>
                            <th>Bulan Tahun Spp</th>
                            <th>Nominal Pembayaran</th>
                            <th>Nama Siswa</th>
                            <th>Nisn</th>
                            <th>Kelas & Kejuruan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayarans as $pembayaran)                            
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @can('IsAdmin')
                                    <td>{{ $pembayaran->petugas->nama_petugas }}</td>
                                @endcan
                                <td>{{ $pembayaran->tgl_bayar->format('Y-m-d') }}</td>
                                <td>{{ $pembayaran->bulan_dibayar . ' ' . $pembayaran->tahun_dibayar }}</td>
                                <td>Rp.{{ number_format($pembayaran->jumlah_bayar) }}</td>
                                <td>{{ $pembayaran->siswa->nama }}</td>
                                <td>{{ $pembayaran->siswa->nisn }}</td>
                                <td>{{ $pembayaran->siswa->kelas->kompetensi_keahlian . ' ' . $pembayaran->siswa->kelas->nama_kelas }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </div>
        </div>
    </div>
</x-card>
@push('scripts')
    <script>
        Livewire.on('getPetugas', function () {
            var value = $('#id_petugas').val();
            Livewire.emit('setPetugas', value);
        })
    </script>
@endpush