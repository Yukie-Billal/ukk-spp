<div class="modal-body">    
    <form wire:submit.prevent='store'>
        <div class="form-group">
            <label for="tahunSpp">Nama Kelas</label>
            <x-form.input placeholder="Masukkan Nama Kelas" wire:model.lazy='nama_kelas' />
        </div>
        <div class="form-group my-3">
          <label for="nominal">Kompetensi Keahlian</label>
          <x-form.input placeholder="Kompetensi Keahlian" wire:model.lazy='kompetensi_keahlian' id="nominal" />
        </div>
        <x-button color="success" data-bs-dismiss="modal">Tambah Kelas</x-button>
    </form>
</div>
@push('scripts')
    <script>
        Livewire.on('getTahun', function () {
            var value = $('#tahunSpp').val();
            Livewire.emit('setTahun', value);
        })
    </script>
@endpush