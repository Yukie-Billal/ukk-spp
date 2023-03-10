<div class="modal-body">
    <form wire:submit.prevent='edit'>
        <span class="header-m">Tambah SPP</span>
        <x-form.input placeholder="Pilih Tahun" wire:model.lazy='tahun' />
        <x-form.input placeholder="Masukkan Nominal" wire:model.lazy='nominal' />
        <x-button color="success" data-bs-dismiss="modal">Tambah Spp</x-button>
    </form>
</div>