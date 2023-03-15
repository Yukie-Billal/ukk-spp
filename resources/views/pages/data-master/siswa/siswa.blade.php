<x-app-layout>
    <div class="row">
        <div class="col-12">            
            <livewire:data-master.siswa-index />
        </div>
    </div>
    <x-modal id="modalTambahSiswa">
        <livewire:data-master.siswa-create />
    </x-modal>
    <x-modal id="modalEditSiswa">
        <livewire:data-master.siswa-edit />
    </x-modal>
</x-app-layout>