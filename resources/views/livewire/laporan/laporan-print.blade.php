<x-card class="d-none">
    <div class="card-body" id="printLaporan">
        <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <x-table class="table-striped">
            <thead>
                <tr>
                    <th>Tanggal Pembayaran</th>
                    <th>Bulan Tahun Spp</th>
                    <th>Nominal</th>
                    <th>Nama Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayarans as $pembayaran)
                    <tr>
                        <td>{{ $pembayaran->tgl_bayar }}</td>
                        <td>{{ $pembayaran->bulan->nama_bulan . ' ' . $pembayaran->tahun_dibayar }}</td>
                        <td>Rp.{{ number_format($pembayaran->jumlah_bayar) }}</td>
                        <td>{{ $pembayaran->siswa->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
    </div>
    <iframe name="printPembayaran" id="printPembayaran" class="d-none"></iframe>
</x-card>

@push('scripts')
    <script>
        Livewire.on('printThis', function () {        
            setTimeout(() => {
                var isi = document.querySelector('#printLaporan').innerHTML;
                console.log(isi);
                window.frames["printPembayaran"].document.title = document.title;
                window.frames["printPembayaran"].document.body.innerHTML = isi;
                window.frames["printPembayaran"].focus();
                window.frames["printPembayaran"].print();
            }, 500);
        })
    </script>
@endpush