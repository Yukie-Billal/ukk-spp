<div class="modal-body">
    <div class="form-group text-center">
        <h2>
            Tambah Data Spp
        </h2>
    </div>
    <hr>
    <form wire:submit.prevent='store'>
        <div class="form-group">
            <label for="tahunSpp">Tahun Spp</label>
            @if ($tahunType)
                <input type="number" wire:model.lazy='tahun' class="input-form">
            @else
                <select class="select-form" wire:change='$emit("getTahun")' id="tahunSpp" name="tahun">
                    <option value="type" class="text-l-medium text-info-main bg-primary-focus">Ketik Manual</option>
                    @for ($i = -4; $i < 8; $i++)
                    @php 
                        $tahun = date('Y') - $i;
                        $terpakai = false;
                    @endphp
                        @foreach ($spps as $key => $spp)
                            @if ($tahun == $spp->tahun)
                                @php
                                    $terpakai = true;
                                @endphp
                            @endif
                        @endforeach
                        <option value="{{ $tahun }}" {{ $tahun  == date('Y') ? 'selected' : '' }} {{ $terpakai ? 'disabled' : '' }}>{{ $tahun . ' ' . ($terpakai ? ' Terpakai' : '') }}</option>
                    @endfor
                </select>
            @endif
            @error('tahun')
                <small class="text-m-medium text-danger-main">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="nominal">Nominal Spp</label>
            <x-form.input placeholder="Masukkan Nominal" wire:model.debounce.500ms='nominal' id="nominal" />
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