<div class="modal-body">
    <div class="col-8 mb-3 d-flex justify-content-center">
        <x-form.input type="search" placeholder="Search ..." wire:model.debounce.500ms='search' />
        <x-button color="info" class="ms-2">Cari</x-button>
    </div>
    <x-table class="table-striped table-responsive">
        <thead class="bg-white">
            <tr>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)                        
                <tr>
                    <td>{{ $siswa->nisn }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->kelas->kompetensi_keahlian.' '.$siswa->kelas->nama_kelas }}</td>
                    <td>
                        <x-button color="success" wire:click='pilihSiswa({{ $siswa->nisn }})' data-bs-dismiss="modal">
                            Pilih
                        </x-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</div>