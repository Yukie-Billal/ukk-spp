<x-app-layout>
    <div class="row">
        <div class="col-12">            
            <livewire:data-master.siswa-index />
        </div>
    </div>
    <div class="modal fade" id="modalTambahSiswa">
        <div class="modal-dialog">
            <div class="modal-content rounded-1" style="width: 627px; padding:20px;">
                <livewire:data-master.siswa-create />
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEditSiswa">
        <div class="modal-dialog">
            <div class="modal-content rounded-1" style="width: 627px; padding:20px;">
                <livewire:data-master.siswa-edit />
            </div>
        </div>
    </div>
</x-app-layout>