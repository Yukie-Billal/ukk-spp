<x-app-layout>
    <div class="row">
        <div class="col-12">
            <livewire:data-master.kelas.kelas-index />
        </div>
    </div>

    <x-modal id="modalTambahKelas">
        <livewire:data-master.kelas.kelas-create />
    </x-modal>
    <x-modal id="modalEditKelas">
        <livewire:data-master.kelas.kelas-edit />
    </x-modal>
</x-app-layout>