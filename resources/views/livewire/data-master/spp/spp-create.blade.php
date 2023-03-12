<div class="modal-body">    
    <form wire:submit.prevent='store'>
        <div class="form-group">
            @php
                $tahunTerpakai = [];
                foreach ($spps as $key => $spp) {
                    $tahunTerpakai[] = $spp->tahun;
                }
            @endphp
            <label for="tahunSpp">Tahun Spp</label>
            <select class="select-form" wire:change='$emit("getTahun")' id="tahunSpp" name="tahun">
                @for ($i = -2; $i < 5; $i++)
                @php $tahun = date('Y') - $i @endphp
                    <option value="{{ $tahun }}" {{ $tahun  == date('Y') ? 'selected' : '0' }}>{{ $tahun == $tahunTerpakai ? $tahun . ' Tidak Tersedia' : date('Y') - $i }}</option>
                @endfor
            </select>
            @error('tahun')
                <small class="text-m-medium text-danger-main">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="nominal">Nominal Spp</label>
            <x-form.input placeholder="Masukkan Nominal" wire:model.lazy='nominal' id="nominal" />
            @error('nominal')
                <small class="text-m-medium text-danger-main">{{ $message }}</small>
            @enderror
        </div>
        <x-button color="success">Tambah Spp</x-button>
    </form>
</div>
@push('scripts')
    <script>
        Livewire.on('getTahun', function () {
            var value = $('#tahunSpp').val();
            Livewire.emit('setTahun', value);
        })
        Livewire.on('fresh', function () {$('#modalTambahSpp').modal('hide');})
    </script>
@endpush