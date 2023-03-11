<x-app-layout>
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