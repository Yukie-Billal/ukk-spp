<x-card>
    <div class="card-body">
        <div class="row justify-content-between">
            <div class="col-3">
                <x-button color="info" modal="true" target="#modalCariSiswa">Cari Siswa</x-button>
            </div>
            <div class="col-2 d-flex align-items-center">
                <label class="text-m-regular me-2">Tahun</label>
                <input type="number" id="tahunPembayaran" value="{{ $tahun }}" class="input-form" onchange='getTahun()' min="2000" max="2100">
            </div>
        </div>
    </div>
</x-card>
@push('scripts')
    <script>
        var tahun = {{ $tahun }};
        var tahunMasuk = {{ $tahunMasuk }};
        Livewire.on('setTahunMasuk', function (value) {
            tahunMasuk = value;
        })
        function getTahun() {
            var value = $('#tahunPembayaran').val();
            if (value < tahunMasuk) {
                $('#tahunPembayaran').val(tahunMasuk);
                Livewire.emit('toastify', ['danger', 'Siswa Tidak Terdaftar Di Tahun '+value, 2500]);
            }
            if (tahunMasuk != 0 && value >= tahunMasuk) {
                Livewire.emit('setTahun', $('#tahunPembayaran').val());
            }
        }
    </script>
@endpush