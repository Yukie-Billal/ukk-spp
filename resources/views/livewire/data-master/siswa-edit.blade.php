<div class="modal-body">
    <form wire:submit.prevent='updateSiswa'>
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>
                    Biodata Siswa
                </h2>
            </div>
        </div>
        <div class="row py-2 px-2">
            <div class="col-6">
                <div class="form-group">
                  <label for="nisn">NISN</label>
                  <input type="text"
                    class="input-form" wire:model.lazy="nisn" id="nisn" placeholder="NISN">
                    @error('nisn')
                        <small class="form-text text-m-regular text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                  <label for="nis">NIS</label>
                  <input type="text" class="input-form" wire:model.lazy="nis" id="nis" placeholder="NIS">
                    @error('nis')
                        <small class="form-text text-m-regular text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row py-2 px-2">
            <div class="col-6">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text"
                    class="input-form" wire:model.lazy="nama" id="nama" placeholder="nama">
                    @error('nama')
                        <small class="form-text text-m-regular text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                  <label for="no_telp">No. Telephone</label>
                  <input type="text" class="input-form" wire:model.lazy="no_telp" id="no_telp" placeholder="no_telp">
                    @error('no_telp')
                        <small class="form-text text-m-regular text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row py-2 px-2">
            <div class="col-12">
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="text-area-form" wire:model.lazy="alamat" id="alamat" rows="3" placeholder="Alamat"></textarea>
                    @error('alamat')
                        <small class="form-text text-m-regular text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row py-2 px-2">
            <div class="col-12">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="select-form" wire:change='$emit("getKelas")' id="kelasEdit" name="kelas_id">
                        @foreach ($kelases as $kelas)
                        <option value="{{ $kelas->id }}" {{ $kelas_id == $kelas->id ? 'selected' : '' }}>{{ $kelas->kompetensi_keahlian . ' ' . $kelas->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <small class="form-text text-m-regular text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row py-2 px-2">
            <div class="col-12">
                <div class="form-group">
                    <label for="spp">spp</label>
                    <select class="select-form" wire:change='$emit("getSpp")' id="sppEdit" name="spp_id">
                        @foreach ($spps as $spp)
                        <option value="{{ $spp->id }}" {{ $spp->id == $spp_id ? 'selected' : '' }}>{{ 'Tahun ' . $spp->tahun . ' | Rp.' . number_format($spp->nominal) }}</option>
                        @endforeach
                    </select>
                    @error('spp_id')
                        <small class="form-text text-m-regular text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row py-2 px-2 justify-content-end">
            <div class="col-3 d-flex justify-content-end align-items-center">
                <x-button color="success">Simpan</x-button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        livewire.on('getKelas', function () {
            const value = document.querySelector('#kelasEdit').value;
            Livewire.emit('setKelas', value);
        });
        livewire.on('getSpp', function () {
            const value = document.querySelector('#sppEdit').value;
            Livewire.emit('setSpp', value);
        });
        Livewire.on('fresh', function () {$('#modalEditSiswa').modal('hide')});
    </script>
@endpush