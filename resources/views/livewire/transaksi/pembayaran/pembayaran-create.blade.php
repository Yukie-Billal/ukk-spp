<div class="modal-body">
    <div class="form-group">
        <label class="text-m-medium">Tanggal Masuk</label>
        <x-form.input type="date" wire:model='tanggalBayar' />
        {{ $tanggalBayar }}
        @error('tanggalBayar')
            <small class="text-m-medium text-danger">{{ $message }}</small>
        @enderror
    </div>

    <x-button color='success' wire:click='store'>
        Bayar
    </x-button>
</div>
@push('scripts')
    <script>
        Livewire.on('fresh', function () {
            $('#modalTambahPembayaran').modal('hide');
        })
    </script>
@endpush