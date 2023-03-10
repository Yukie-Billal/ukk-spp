<x-app-layout>
    <div class="row mt-4">
        <div class="col-12 px-4">
            <livewire:data-master.spp.spp-index >
        </div>
    </div>
    <x-modal id="modalTambahSpp">
        <livewire:data-master.spp.spp-create />
    </x-modal>
    <x-modal id="modalEditSpp">
        <livewire:data-master.spp.spp-edit>
    </x-modal>
            
</x-app-layout>