<div class="modal-body">
    <form wire:submit.prevent='edit'>
        <h2 class="header-m text-center mb-4">Ubah SPP</h2>
        <div class="form-group">
            <label for="">Tahun Spp</label>
            <x-form.input placeholder="Pilih Tahun" wire:model.lazy='tahun' />
            @error('tahun')
                <small class="text-m-medium text-danger-main">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="">Tahun Spp</label>
            <x-form.input placeholder="Masukkan Nominal" wire:model.lazy='nominal' />
            @error('nominal')
                <small class="text-m-medium text-danger-main">{{ $message }}</small>
            @enderror
        </div>
        <x-button color="success">Ubah Spp</x-button>
    </form>
</div>
@push('scripts')
    <script>
        Livewire.on('fresh', function () {$('#modalEditSpp').modal('hide')})
    </script>
@endpush