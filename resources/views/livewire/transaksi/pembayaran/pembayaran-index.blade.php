<x-card>
    <div class="card-body" wire:poll>
        <x-table class="table-striped">
            <thead>
                <tr>
                    <th class="header-s">Nama Bulan</th>
                    <th class="header-s">Status Pembayaran</th>
                    <th class="text-m-regular">
                        <input type="checkbox" wire:model='pilih' value="1" >
                        <label>Pilih</label>
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
                                <input type="checkbox" value="{{ $bulan->id }}" id="{{ $bulan->nama_bulan }}" class="checkBulan">
                                <label for="{{ $bulan->nama_bulan }}">{{ $bulan->nama_bulan }}</label>
                            @else                                    
                            <div class="d-flex justify-content-lg-center" style="gap: 4px">
                                <x-button color="success" class="button-sm modalPembayaran" data-lunas="{{ $id }}" data-siswa="{{ $siswa ? $siswa->nisn : '' }}" data-bulan="{{ $bulan->id }}" data-tahun="{{ $tahun }}">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </x-button>
                                <x-button color="danger" class="button-sm swalCancel" data-id="{{ $id }}">
                                    <i class="fa fa-x" aria-hidden="true"></i>
                                </x-button>
                                <x-button color="info" class="button-sm cetak cetakPembayaran" data-id="{{ $id }}">
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
                                <input type="checkbox" value="{{ $bulan->id }}" id="{{ $bulan->nama_bulan }}" class="checkBulan">
                                <label>{{ $bulan->nama_bulan }}</label>
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
                    <td colspan="3">
                        <div class="d-flex justify-content-end" style="gap: 4px">
                            <x-button color="danger" id="batalkanSemua">Batalkan Semua</x-button>
                            <x-button color="success" id="simpanSemua">Simpan Pembayaran</x-button>
                            <x-button color="info" id="cetakSemua">Cetak Bukti</x-button>
                        </div>
                    </td>
                </tr>
            @endif
        </x-table>
    </div>
    <iframe id="printf" name="printf" style="display: none;"></iframe>
    <div wire:ignore>
        {{-- <livewire:pembayaran-cetak /> --}}
    </div>
</x-card>
@push('scripts')
    <script defer>
        function freshBtn() {
            let tambahPembayaran = document.querySelectorAll('.modalPembayaran');
            // let batalkanPembayaran = document.querySelectorAll('.swalCancel');
            // let cetakpembayaran = document.querySelectorAll('.cetakPembayaran');s
            if ($(document).find($('.cetakPembayaran')).length > 0) {
                $('.cetakPembayaran').each(function (i,element) {
                    $(element).click(function (e) {
                        if ($(this).attr('data-id')) {
                            cetakBonSPP($(this).attr('data-id'));
                        } else {
                            Livewire.emit('toastify', ['danger', 'Pembayaran Tidak Tersedia', 2500]);
                        }
                    });
                });
            } else {
                if ($('#simpanSemua').length == 0 || $('#batalkanSemua').length == 0 || $('#cetakSemua').length == 0) {
                    freshBtn();
                    return;
                }                
            }
            if ($('.swalCancel').length > 0) {
                $('.swalCancel').each(function (i,e) {
                    $(e).click(function (e) {
                        e.preventDefault();
                        var id = $(this).attr('data-id');
                        if (id) {                        
                            Livewire.emit('swalConfirm', ['question', 'Yakin Batalkan Pembayaran ?', true, 'deletePembayaran', id]);
                        } else {
                            Livewire.emit('toastify', ['danger', 'Pembayaran Tidak Tersedia', 3000]);
                        }
                    })
                })
            }
            if ($('.modalPembayaran').length > 0) {
                $('.modalPembayaran').each(function (i,e) {
                    $(e).click(function (e) {
                        e.preventDefault();
                    var siswa = $(this).attr('data-siswa');
                    var bulan = $(this).attr('data-bulan');
                    var tahun = $(this).attr('data-tahun');
                    var lunas = $(this).attr('data-lunas');
                        if (siswa && !lunas) {
                            Livewire.emit('getDataPembayaran', [siswa, bulan, tahun]);
                            $('#modalTambahPembayaran').modal('show');
                        } else {                            
                            Livewire.emit('toastify', ['danger', 'Pembayaran Tidak Tersedia', 3000]);
                        }
                    })
                })
            }
        }
        function freshPilihButton() {
            var daftarBulan = [];
            let batalkanSemua = document.querySelector('#batalkanSemua');
            let simpanSemua = document.querySelector('#simpanSemua');
            let cetakSemua = document.querySelector('#cetakSemua');
            let dataBulan = document.querySelectorAll('.checkBulan');
            dataBulan.forEach(item => {
                item.addEventListener('change', function () {
                    var value = this.value;
                    var cek = daftarBulan.includes(value);
                    if (cek) {
                        var index = daftarBulan.indexOf(value);;
                        if (daftarBulan.length == 1) {
                            daftarBulan.pop();
                        } else {
                            daftarBulan.splice(index,index);
                        }
                    } else {
                        daftarBulan.push(value);
                    }
                });
            })
            batalkanSemua.addEventListener('click', function () {
                Livewire.emit('batalkanSemua', daftarBulan);
            })
            simpanSemua.addEventListener('click', function () {
                Livewire.emit('simpanSemua', daftarBulan);
            })
            cetakSemua.addEventListener('click', function () {
                Livewire.emit('cetakSemua', daftarBulan);
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
        Livewire.on('cetakPilihan', function (params) {
            Livewire.emit('cetakBanyak', params);
            setTimeout(() => {
                var isi = document.querySelector('#cetakView').innerHTML;
                window.frames["printf"].document.title = document.title;
                window.frames["printf"].document.body.innerHTML = isi;
                window.frames["printf"].focus();
                window.frames["printf"].print();
            }, 1500);
        })
    </script>
@endpush