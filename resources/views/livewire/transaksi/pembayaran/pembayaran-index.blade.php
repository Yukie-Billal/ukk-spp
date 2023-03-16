<x-card>
    <div class="card-body" wire:poll>
        <x-table class="table-striped">
            <thead>
                <tr>
                    <th class="header-s">Nama Bulan</th>
                    <th class="header-s">Status Pembayaran</th>
                    <th class="text-m-regular">
                        <input type="checkbox" wire:model='pilih' value="1" >
                        <label for="">Pilih</label>
                    </th>
                </tr>
            </thead>
            @if ($siswa)
                @foreach ($bulans as $bulan)
                    @php
                        $warna ='danger';
                        $text = 'Belum Dibayar';
                        $id = false;
                    @endphp
                    @foreach ($pembayarans as $pembayaran)
                        @if ($pembayaran->bulan_dibayar == $bulan->id)
                            @php
                                $warna = 'success';
                                $text = 'Lunas';
                                $id = $pembayaran->pembayaran_id;
                            @endphp
                        @endif
                    @endforeach
                    <tr>
                        <td class="text-l-medium">{{ $bulan->nama_bulan }}</td>
                        <td>
                            <x-button color="{{ $warna }}" class="button-sm py-1">{{ $text }}</x-button>
                            {{-- <input type="date" value="<?= date('Y-m-d') ?>" disabled>
                            <input type="time" value="<?= date('H:i') ?>" disabled> --}}
                        </td>
                        <td style="max-width: 100px">
                            @if ($pilih)
                            <div class="d-flex" style="gap: 4px">
                                <input type="checkbox" value="januari" id="{{ $bulan->nama_bulan }}">
                                <label for="{{ $bulan->nama_bulan }}">{{ $bulan->nama_bulan }}</label>
                            @else                                    
                            <div class="d-flex justify-content-lg-center" style="gap: 4px">
                                <x-button color="success" class="button-sm modalPembayaran" data-lunas="{{ $id }}" data-siswa="{{ $siswa ? $siswa->nisn : '' }}" data-bulan="{{ $bulan->id }}" data-tahun="{{ $tahun }}">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </x-button>
                                <x-button color="danger" class="button-sm swalCancel" data-id="{{ $id }}">
                                    <i class="fa fa-x" aria-hidden="true"></i>
                                </x-button>
                                <x-button color="info" class="button-sm cetak" data-id="{{ $id }}">
                                    Cetak
                                </x-button>
                            @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach ($bulans as $bulan)
                    <tr>
                        <td class="text-l-medium">{{ $bulan->nama_bulan }}</td>
                        <td>
                            <x-button color="danger" class="button-sm py-1">Belum Dibayar</x-button>
                        </td>
                        <td style="max-width: 100px">
                            @if ($pilih)
                            <div class="d-flex" style="gap: 4px">
                                <input type="checkbox" value="januari" id="{{ $bulan->nama_bulan }}" class="checkBulan">
                                <label for="{{ $bulan->nama_bulan }}">{{ $bulan->nama_bulan }}</label>
                            @else                                    
                            <div class="d-flex justify-content-center" style="gap: 4px">
                                <x-button color="success" class="button-sm modalPembayaran" data-siswa="{{ $siswa ? $siswa->nisn : '' }}" data-bulan="{{ $bulan->id }}" data-tahun="{{ $tahun }}">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </x-button>
                                <x-button color="danger" class="button-sm swalCancel" data-id="">
                                    <i class="fa fa-x" aria-hidden="true"></i>
                                </x-button>
                                <x-button color="info" class="button-sm cetakPembayaran" data-id="">
                                    Cetak
                                </x-button>
                            @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            @if ($pilih)
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="d-flex justify-content-end" style="gap: 4px">
                            <x-button color="danger" id="batalkanSemua">Batalkan Semua</x-button>
                            <x-button color="success" id="simpanSemua">Simpan Pembayaran</x-button>
                        </div>
                    </td>
                </tr>
            @endif
        </x-table>
    </div>
    <iframe id="printf" name="printf" style="display: none;"></iframe>
    <livewire:pembayaran-cetak>
</x-card>
@push('scripts')
    <script defer>
        function freshBtn() {
            let tambahPembayaran = document.querySelectorAll('.modalPembayaran');
            let batalkanPembayaran = document.querySelectorAll('.swalCancel');
            let cetakpembayaran = document.querySelectorAll('.cetakPembayaran');
            tambahPembayaran.forEach(item => {
                item.addEventListener('click', function () {
                    var siswa = this.getAttribute('data-siswa');
                    var bulan = this.getAttribute('data-bulan');
                    var tahun = this.getAttribute('data-tahun');
                    var lunas = this.getAttribute('data-lunas');
                    if (!lunas && siswa) {
                        $('#modalTambahPembayaran').modal('show');
                        Livewire.emit('getSiswaPembayaran', siswa);
                        Livewire.emit('getBulanPembayaran', bulan);
                        Livewire.emit('getTahunPembayaran', tahun);
                    } else {
                        Livewire.emit('toastify', ['danger', 'Pembayaran Tidak Tersedia', 3000]);
                    }
                })
            });
            batalkanPembayaran.forEach(item => {
                item.addEventListener('click', function () {
                    var id = this.getAttribute('data-id');
                    if (id) {
                        Livewire.emit('swalConfirm', ['question', 'Yakin Batalkan Pembayaran ?', true, 'deletePembayaran', id]);
                    } else {
                        Livewire.emit('toastify', ['danger', 'Pembayaran Tidak Tersedia', 3000]);
                    }
                })
            });
            cetakpembayaran.forEach(item => {
                item.addEventListener('click', function () {
                    var id = this.getAttribute('data-id');
                    if (id) {
                        cetakBonSPP(id);
                    } else {
                        Livewire.emit('toastify', ['danger', 'Pembayaran Tidak Tersedia', 2500]);
                    }
                })
            })
        }
        function freshPilihButton() {
            let batalkanSemua = document.querySelector('#batalkanSemua');
            let simpanSemua = document.querySelector('#simpanSemua');
            let dataBulan = document.querySelectorAll('.checkBulan');
            dataBulan.forEach(item => {
                console.log(item);
            })
            batalkanSemua.addEventListener('click', function () {
                
            })
        }
        function cetakBonSPP(id) {
            Livewire.emit('cetakPembayaran', id);
            setTimeout(() => {
                var isi = document.querySelector('#cetakView').innerHTML;
                window.frames["printf"].document.title = document.title;
                window.frames["printf"].document.body.innerHTML = isi;
                window.frames["printf"].focus();
                window.frames["printf"].print();
            }, 1500);
        }
        Livewire.on('cetakBonSPP', function (id) {
            cetakBonSPP(id)
        });
        freshBtn();
        Livewire.on('refreshButton', freshBtn);
        Livewire.on('freshPilihButton', freshPilihButton);
    </script>
@endpush