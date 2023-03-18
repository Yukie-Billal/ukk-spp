<x-app-layout>
    <div class="row mb-3">
        <div class="col-12">
            <livewire:transaksi.pembayaran.pembayaran-head />
        </div>
    </div>
    <div class="row">
        @can('IsSiswa')
            <div class="col-sm-12 col-lg-12 col-xl-5">
                <livewire:transaksi.pembayaran.data-siswa />
            </div>
            <div class="col-sm-12 col-lg-12 col-xl-7">
                <livewire:transaksi.pembayaran.histori-index />
            </div>
        @endcan
        @can('IsAdmin')
            <div class="col-12">
                <livewire:transaksi.pembayaran.histori-index admin="true" />
            </div>
        @endcan
    </div>
</x-app-layout>