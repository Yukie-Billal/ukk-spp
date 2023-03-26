<div class="modal-body">
    <div class="form-group text-center">
        <h2>
            Konfirmasi Pembayaran
        </h2>
    </div>
    <hr>
    @if ($siswa)
        <div class="form-group px-2 py-1 my-4">
            <telah class="header-s">Konfirmasi Siswa dengan nama <span class="text-primary">{{ $siswa->nama }}</span> telah melakukan pembayaran Spp untuk Bulan <span class="text-primary">{{ $bulan->nama_bulan }}</span> Tahun <span class="text-primary">{{ $tahun }}</span> ??</label>
        </div>
        <div class="form-group">
            <label class="text-m-medium">Tanggal</label>
            <x-form.input type="hidden" wire:model='tanggalBayar' readonly />
            @error('tanggalBayar')
                <small class="text-m-medium text-danger">{{ $message }}</small>
            @enderror
        </div>
        <hr>
        <div class="col d-flex justify-content-end">
            <x-button color='success' wire:click='store'>
                Simpan Pembayaran
            </x-button>
        </div>
    @endif
</div>
@push('scripts')
    <script>
        Livewire.on('cetakBonSPP', function () {
            modalClose('#modalTambahPembayaran')
        })
        Livewire.on('modalClose',function (target) {
            modalClose(target);
        });
        function modalClose(target) {
            if (target == '' || target == false || target == null) {
                Livewire.emit('toastify', ['danger','Modal Tidak Ditemukan',3000]);
            } else {
                $(target).modal('hide');
            }
        }
    </script>
@endpush