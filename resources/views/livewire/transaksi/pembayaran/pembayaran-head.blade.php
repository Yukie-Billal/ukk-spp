<x-card>
    <div class="card-body">
        @if (Auth::guard('siswa')->check())
        <div class="row justify-content-end">
        @else
        <div class="row justify-content-between">
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                @if (Request::is('histori-pembayaran*'))
                @can('IsAdmin')
                    {{-- <input type="text" id="autoComplete" value="ok" class="input-form"> --}}
                    <select wire:change='$emit("getPetugas")' id="petugasHistory" class="select-form">
                        <option value="all">Tampilan Keseluruhan</option>
                        @foreach ($petugases as $petugas)
                            <option value="{{ $petugas->petugas_id }}">{{ $petugas->nama_petugas }}</option>
                        @endforeach
                    </select>
                @endcan
                @can('IsPetugas')
                    <div class="header-s">
                        {{ Auth::guard('petugas')->user()->nama_petugas }}
                    </div>
                @endcan
                @else 
                    <x-button color="info" modal="true" target="#modalCariSiswa">Cari Siswa</x-button>
                @endif
            </div>
        @endif
            @if (!Request::is('histori-pembayaran*') || Auth::guard('siswa')->check())
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 d-flex align-items-center">
                    <label class="text-m-regular me-2">Tahun</label>
                    <input type="number" id="tahunPembayaran" value="{{ $tahun }}" class="input-form" onchange='getTahun()' min="2000" max="2100">
                </div>
            @endif
        </div>
    </div>    
</x-card>
@push('scripts')
    <script>
        var tahun = {{ $tahun }};
        var tahunMasuk = {{ $tahunMasuk }};
        var pesan = 'Siswa Tidak Terdaftar Di Tahun';
        var siswa = {{ $punyaSiswa }};
        Livewire.on('setTahunMasuk', function (value) {
            tahunMasuk = value;
        })
        function getTahun() {
            var value = $('#tahunPembayaran').val();
            if (value < tahunMasuk) {
                $('#tahunPembayaran').val(tahunMasuk);
                siswa ? pesan = "Anda Tidak Terdaftar Di Tahun" : ''
                Livewire.emit('toastify', ['danger', pesan+' '+value, 2500]);
            }
            if (tahunMasuk != 0 && value >= tahunMasuk) {
                Livewire.emit('setTahun', $('#tahunPembayaran').val());
            }
        }
        Livewire.on('getPetugas', function () {
            Livewire.emit('setPetugas', $('#petugasHistory').val());
        })
    </script>
@endpush