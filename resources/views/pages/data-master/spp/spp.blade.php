<x-app-layout>
    <div class="row">
        <div class="col-12 px-4 pt-2">
            <div class="col-12 px-4">
                <div class="col-12 px-2 d-flex justify-content-between">
                    <x-breadcrumb parent="Data Master" where="Spp" />
                    <div class="d-flex text-l-regular align-items-center justify-content-end">
                        <i class="fa fa-calendar-alt fs-4" aria-hidden="true"></i>
                        <span class="ms-2">{{ date('Y-m-d') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 px-4">
            <livewire:data-master.spp.spp-index >
        </div>
    </div>
    <x-modal id="modalTambahSpp">
        <div class="modal-header d-flex justify-content-center mb-3 border-0 bg-transparent">
            <div class="header-m">Tambah SPP</div>
        </div>
        <livewire:data-master.spp.spp-create />
    </x-modal>
    <x-modal id="modalEditSpp">
        <livewire:data-master.spp.spp-edit>
    </x-modal>
            
</x-app-layout>