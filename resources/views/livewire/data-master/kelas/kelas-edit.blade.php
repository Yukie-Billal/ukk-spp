<div class="modal-body">    
    <form wire:submit.prevent='edit'>
        <div class="form-group">
            <label for="tahunSpp">Nama Kelas</label>
            <x-form.input placeholder="Masukkan Nama Kelas" wire:model.lazy='nama_kelas' />
            @error('nama_kelas')
                <small class="text-m-medium text-danger-main">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group my-3">
          <label for="nominal">Kompetensi Keahlian</label>
          <x-form.input placeholder="Kompetensi Keahlian" wire:model.lazy='kompetensi_keahlian' id="nominal" />
          @error('kompetensi_keahlian')
              <small class="text-m-medium text-danger-main">{{ $message }}</small>
          @enderror
        </div>
        <x-button color="success">Simpan</x-button>
    </form>
</div>
@push('scripts')
    <script>
        Livewire.on('fresh', function () {$('#modalEditKelas').modal('hide')})
    </script>
@endpush