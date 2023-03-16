<x-app-layout>
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
    <x-modal id="modalCariSiswa" w="90">
        <livewire:transaksi.pembayaran.modal-cari-siswa>
    </x-modal>
    <x-modal id="modalTambahPembayaran">
        <livewire:transaksi.pembayaran.pembayaran-create />
    </x-modal>
</x-app-layout>