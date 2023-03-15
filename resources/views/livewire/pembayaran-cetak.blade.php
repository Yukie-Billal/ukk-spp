<x-modal id="cetakView">
    <style>
        .modal-bodyI {
            position: relative;
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
            display: flex;
            flex-direction: column;
            justify-content: center;
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
        <div class="contentCetak">
            <div style="text-align: center; font-size: 20px">Bukti Pembayaran</div>
            <table>
                <tr>
                    <td>No Transaksi</td>
                    <td>: 992013</td>
                    <td>Tanggal</td>
                    <td>: {{ date('Y-m-d H:i:s') }}</td>
                </tr>
                <tr>
                    <td>No Induk  </td>
                    <td>: NIS</td>
                    <td>Kelas</td>
                    <td>: 10</td>
                </tr>
                <tr>
                    <td>Nama </td>
                    <td>: Yukie M Billal </td>
                </tr>
            </table>
        </div>
        <div class="footer">
        </div>
    </div>
</x-modal>