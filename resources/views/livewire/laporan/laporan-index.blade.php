<x-card>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <x-form.input type="date" wire:model='tglAwal' />
            </div>
            <div class="col-3">
                <x-form.input type="date" wire:model='tglAkhir' />
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end" style="gap: 4px">
                        <button class="button button-info" wire:click='print'>PRINT</button>
                        <button class="button button-success">EXCEL</button>
                        <button class="button button-danger">PDF</button>
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
                                <td>{{ $pembayaran->tgl_bayar }}</td>
                                <td>{{ $pembayaran->bulan_dibayar . ' ' . $pembayaran->tahun_dibayar }}</td>
                                <td>{{ $pembayaran->jumlah_bayar }}</td>
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