<div class="modal-body">
    <form wire:submit.prevent='store'>
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="header-l">
                    Biodata Siswa
                </h2>
            </div>
        </div>
        <div class="row py-2 px-2">
            <div class="col-6">
                <div class="form-group">
                  <label for="nisn">NISN</label>
                  <input type="text"
                    class="input-form" wire:model.debounce.700ms="nisn" id="nisn" placeholder="NISN">
                    @error('nisn')
                        <small class="form-text text-m-regular text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                  <label for="nis">NIS</label>
                  <input type="text" class="input-form" wire:model.debounce.700ms="nis" id="nis" placeholder="NIS">
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
                    class="input-form" wire:model.debounce.700ms="nama" id="nama" placeholder="nama">
                    @error('nama')
                        <small class="form-text text-m-regular text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                  <label for="no_telp">No. Telephone</label>
                  <input type="text" class="input-form" wire:model.debounce.700ms="no_telp" id="no_telp" placeholder="+62 236 1234 1234">
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
                    <textarea class="text-area-form" wire:model.debounce.700ms="alamat" id="alamat" rows="3" placeholder="Alamat"></textarea>
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
                    <select class="select-form" wire:change='$emit("getKelas")' id="kelas" name="kelas_id">
                        @foreach ($kelases as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->kompetensi_keahlian .' '. $kelas->nama_kelas }}</option>
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
                    <select class="select-form" wire:change='$emit("getSpp")' id="spp" name="spp_id">
                        @foreach ($spps as $spp)
                            <option value="{{ $spp->id }}" {{ $spp->tahun == date('Y') ? 'selected' : '' }}>{{ 'Tahun ' . $spp->tahun . ' | Rp.' . number_format($spp->nominal) }}</option>
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
                <button class="button button-success d-flex p-0 px-3 justify-content-center align-items-center text-m-medium mt-1">Simpan</button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        livewire.on('getKelas', function () {
            const value = document.querySelector('#kelas').value;
            Livewire.emit('setKelas', value);
        });
        livewire.on('getSpp', function () {
            const value = document.querySelector('#spp').value;
            Livewire.emit('setSpp', value);
        });
        Livewire.on('fresh', function () {$('#modalTambahSiswa').modal('hide')})
    </script>
@endpush