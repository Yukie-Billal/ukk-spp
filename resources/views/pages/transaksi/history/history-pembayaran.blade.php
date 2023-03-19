<x-app-layout>
    <x-breadcrumb parent="Transaksi" where="Histori Pembayaran" />
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
        @can('IsOperator')
            <div class="col-12">
                <livewire:transaksi.pembayaran.histori-index />
            </div>
        @endcan
    </div>
</x-app-layout>