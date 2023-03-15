<x-card>
    <div class="card-body">
        <x-table class="table-striped">
            <thead>
                <tr>
                    <th class="header-m ps-2" wire:loading.remove>Nama :</th>
                    <th class="header-m ps-2" wire:loading.remove>{{ $siswa ? $siswa->nama : 'Pilih Siswa' }}</th>
                    <th colspan="2" class="header-m" wire:loading>
                        <label class="placeholder placeholder-wave">Nama Siswa Min</label>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-m-medium">NISN</td>
                    <td wire:loading.remove class="text-m-medium">{{ $siswa ? $siswa->nisn : '' }}</td>
                    <td wire:loading>
                        <label class="placeholder placeholder-wave">Minimal huruf Harus panjang</label>
                    </td>
                </tr>
                <tr>
                    <td class="text-m-medium">NIS</td>
                    <td wire:loading.remove class="text-m-medium">{{ $siswa ? $siswa->nis : '' }}</td>
                    <td wire:loading>
                        <label class="placeholder placeholder-wave">Minimal huruf Harus panjang</label>
                    </td>
                </tr>
                <tr>
                    <td class="text-m-medium">No Telephone</td>
                    <td wire:loading.remove class="text-m-medium">{{ $siswa ? $siswa->no_telp : '' }}</td>
                    <td wire:loading>
                        <label class="placeholder placeholder-wave">Minimal huruf Harus panjang</label>
                    </td>
                </tr>
                <tr>
                    <td class="text-m-medium">Alamat</td>
                    <td wire:loading.remove class="text-m-medium">{{ $siswa ? $siswa->alamat : '' }}</td>
                    <td wire:loading>
                        <label class="placeholder placeholder-wave">Minimal huruf Harus panjang</label>
                    </td>
                </tr>
                <tr>
                    <td class="text-m-medium">Kelas & Kejuruan</td>
                    <td wire:loading.remove class="text-m-medium">{{ $siswa ? $siswa->kelas->kompetensi_keahlian  . ' ' . $siswa->kelas->nama_kelas : '' }}</td>
                    <td wire:loading>
                        <label class="placeholder placeholder-wave">Minimal huruf Harus panjang</label>
                    </td>
                </tr>
                <tr>
                    <td class="text-m-medium">Tahun SPP</td>
                    <td wire:loading.remove class="text-m-medium">{{ $siswa ?  'Tahun '.$siswa->spp->tahun : '' }}</td>
                    <td wire:loading>
                        <label class="placeholder placeholder-wave">Minimal huruf Harus panjang</label>
                    </td>
                </tr>
                <tr>
                    <td class="text-m-medium">Nominal SPP</td>
                    <td wire:loading.remove class="text-m-medium">{{ $siswa ? number_format($siswa->spp->nominal) : '' }}</td>
                    <td wire:loading>
                        <label class="placeholder placeholder-wave">Minimal huruf Harus panjang</label>
                    </td>
                </tr>
            </tbody>
        </x-table>
    </div>
</x-card>