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
                    class="input-form" wire:model="nisn" id="nisn" placeholder="NISN">
                    @error('nisn')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                  <label for="nis">NIS</label>
                  <input type="text" class="input-form" wire:model="nis" id="nis" placeholder="NIS">
                    @error('nis')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row py-2 px-2">
            <div class="col-6">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text"
                    class="input-form" wire:model="nama" id="nama" placeholder="nama">
                    @error('nama')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                  <label for="no_telp">No. Telephone</label>
                  <input type="text" class="input-form" wire:model="no_telp" id="no_telp" placeholder="no_telp">
                    @error('no_telp')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row py-2 px-2">
            <div class="col-12">
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="text-area-form" wire:model="alamat" id="alamat" rows="3" placeholder="Alamat"></textarea>
                </div>
            </div>
        </div>
        <div class="row py-2 px-2">
            <div class="col-12">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="select-form" wire:change='$emit("getKelas")' id="kelas">
                        @foreach ($kelases as $kelas)
                            <option value="{{ $kelas->id }}">{{ $kelas->kompetensi_keahlian . ' ' . $kelas->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row py-2 px-2">
            <div class="col-12">
                <div class="form-group">
                    <label for="spp">spp</label>
                    <select class="select-form" wire:change='$emit("getSpp")' id="spp">
                        @foreach ($spps as $spp)
                            <option value="{{ $spp->id }}">{{ $spp->tahun }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row py-2 px-2 justify-content-end">
            <div class="col-3 d-flex justify-content-end align-items-center">
                <button class="button button-success d-flex p-0 px-3 justify-content-center align-items-center text-m-medium mt-1" data-bs-dismiss="modal">Simpan</button>
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
    </script>
@endpush