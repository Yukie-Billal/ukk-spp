<div class="modal-body">    
    <form wire:submit.prevent='store'>
        <div class="form-group">
            <label class="text-m-regular">Nama Kelas</label>
            <x-form.input placeholder="Masukkan Nama Kelas" wire:model.lazy='nama_kelas' />
            @error('nama_kelas')
                <small class="text-m-regular text-danger-main">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="text-m-regular">Kompetensi Keahlian</label>
            <x-form.input placeholder="Kompetensi Keahlian" wire:model.lazy='kompetensi_keahlian' />
            @error('kompetensi_keahlian')
                <small class="text-m-regular text-danger-main">{{ $message }}</small>
            @enderror
        </div>
        <x-button color="success">Tambah Kelas</x-button>
    </form>
</div>
@push('scripts')
    <script>
        Livewire.on('getTahun', function () {
            var value = $('#tahunSpp').val();
            Livewire.emit('setTahun', value);
        })
        Livewire.on('fresh',function () {$('#modalTambahKelas').modal('hide')});
    </script>
@endpush