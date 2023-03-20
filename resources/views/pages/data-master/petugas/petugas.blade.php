<x-app-layout>
	<div class="row">
        <div class="col-12 px-4 pt-2">
            <div class="col-12 px-4">
                <div class="col-12 px-2 d-flex justify-content-between">
                    <x-breadcrumb parent="Data Master" where="Petugas" />
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
			<livewire:data-master.petugas.petugas-index />
		</div>
	</div>
	<x-modal id="modalTambahPetugas">
		<livewire:data-master.petugas.petugas-create />
	</x-modal>
	<x-modal id="modalEditPetugas">
		<livewire:data-master.petugas.petugas-edit />
	</x-modal>

</x-app-layout>