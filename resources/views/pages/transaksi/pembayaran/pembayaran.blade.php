<x-app-layout>
    <div class="row">
        <div class="col-12 py-2">
            <div class="col-12">
                <div class="col-12 px-2 d-flex justify-content-between align-items-center">
                    <x-breadcrumb parent="Transaksi" where="Pembayaran" />
                    <div class="d-flex text-l-regular align-items-center justify-content-end">
                        <i class="fa fa-calendar-alt fs-4" aria-hidden="true"></i>
                        <span class="ms-2">{{ date('Y-m-d') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:pembayaran-cetak />
    <div class="row mb-2">
        <div class="col-12">
            <livewire:transaksi.pembayaran.pembayaran-head />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-12 col-xl-5">
            <livewire:transaksi.pembayaran.data-siswa />
        </div>
        <div class="col-md-12 col-lg-12 col-xl-7 mt-md-3 mt-xl-0">
            <livewire:transaksi.pembayaran.pembayaran-index >
        </div>
    </div>
    <x-modal id="modalCariSiswa" w="700px">
        <livewire:transaksi.pembayaran.modal-cari-siswa>
    </x-modal>
    <x-modal id="modalTambahPembayaran">
        <livewire:transaksi.pembayaran.pembayaran-create />
    </x-modal>
</x-app-layout>