<x-app-layout>
    <div class="row">
        <div class="col-12 py-2">
            <div class="col-12">
                <div class="col-12 px-2 d-flex justify-content-between">
                    <x-breadcrumb parent="Transaksi" where="Histori Pembayaran" />
                    <div class="d-flex text-l-regular align-items-center justify-content-end mb-1">
                        <i class="fa fa-calendar-alt fs-4" aria-hidden="true"></i>
                        <span class="ms-2">{{ date('Y-m-d') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
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