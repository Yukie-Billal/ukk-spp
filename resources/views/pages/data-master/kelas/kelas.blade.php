<x-app-layout>
    <div class="row">
        <div class="col-12 px-4 pt-2">
            <div class="col-12 px-4">
                <div class="col-12 px-2 d-flex justify-content-between">
                    <x-breadcrumb parent="Data Master" where="Kelas" />
                    <div class="d-flex text-l-regular align-items-center justify-content-end">
                        <i class="fa fa-calendar-alt fs-4" aria-hidden="true"></i>
                        <span class="ms-2">{{ date('Y-m-d') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
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