<x-modal id="cetakView">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .modal-bodyI {
            position: relative;
            width: 500px
        }
        .headCetak {
            display: flex;
            justify-content: center;
            border-bottom: 1px dashed #000;
            padding-bottom: 20px;
        }
        .headCetak img {
            top: 0;
            left: 0;
        }
        .contentCetak {
            padding: 15px 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* justify-content: center; */
        }
        table {
            width: 100%;
            /* background: #000; */
            margin: 10px 0;
        }
        .dash {
            content: '';
            height: 1px;
            width: 100%;
            background: #000;
        }
        .footer {
            text-align: center;
            margin: 35px 0 15px 0
        }
        .transaksi {
            width: 90%;
            /* background: #000; */
            margin: 15px;
            padding: 0 10px;
            display: flex;
            justify-content: end;
        }
        .transaksi table {
            width: 40%
        }
    </style>
    <div class="modal-bodyI">
        <div class="headCetak">
            <img src="{{ asset('img/tip.png') }}" alt="SMK T.I.P." width="70px" height="70px" style="position: absolute">
            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; font-size: 20px;">
                <span>SMK Teknologi Industri Pembangunan</span>
                <span>Alamat</span>
                <span>-</span>
            </div>
        </div>
        <div class="dash"></div>
        <div class="contentCetak">
            <div style="text-align: center; font-size: 20px; margin-bottom: 20px">Bukti Pembayaran</div>
            @if ($pembayaran)                
                @foreach ($pembayarans as $p)
                <div class="dash"></div>
                <table>
                    <tr>
                        <td style="min-width: 25%;">No Transaksi</td>
                        <td style="min-width: 25%;">: {{ $p->pembayaran_id }}</td>
                        <td style="min-width: 18%;">Tanggal</td>
                        <td style="min-width: 32%;">: {{ $p->tgl_bayar . date(' H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td style="min-width: 25%;">No Induk  </td>
                        <td style="min-width: 25%;">: {{ $p->siswa->nis }}</td>
                        <td style="min-width: 18%;">Kelas</td>
                        <td style="min-width: 32%;">: {{ $p->siswa->kelas->tingkat }}</td>
                    </tr>
                    <tr>
                        <td style="min-width: 25%;">Nama </td>
                        <td style="min-width: 25%;">: {{ $p->siswa->nama }}</td>
                    </tr>
                </table>
                <div class="transaksi">
                    <table>
                        <tr>
                            <td style="min-width: 50px">2023</td>
                            <td style="min-width: 70px">{{ $p->bulan->nama_bulan }}</td>
                            <td style="min-width: 70px">{{ 'Rp.' . $p->siswa->spp->nominal }}</td>
                        </tr>
                    </table>
                </div>
                <div class="dash"></div>
                @endforeach
            @endif
        </div>
        <div class="footer">
            Terima Kasih
        </div>
    </div>
</x-modal>