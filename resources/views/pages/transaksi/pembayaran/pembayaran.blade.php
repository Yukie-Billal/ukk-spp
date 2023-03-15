<x-app-layout>
    <div class="row mb-3">
        <div class="col-12">
            <livewire:transaksi.pembayaran.pembayaran-head />
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <livewire:transaksi.pembayaran.data-siswa />
        </div>
        <div class="col-7">
            <livewire:transaksi.pembayaran.pembayaran-index >
        </div>
    </div>
    <x-modal id="modalCariSiswa">
        <livewire:transaksi.pembayaran.modal-cari-siswa>
    </x-modal>
    <x-modal id="modalTambahPembayaran">
        <livewire:transaksi.pembayaran.pembayaran-create />
    </x-modal>
</x-app-layout>