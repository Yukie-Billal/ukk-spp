<x-modal id="modal-ubah-profile">
    <div class="modal-body">
        <div class="form-group text-center">
            <h2>
                Ubah Foto Profile
            </h2>
        </div>
        <hr>
        {{ $foto }}
        <div class="d-flex justify-content-start">
            <x-form.input type="file" class="py-2" wire:model='foto'/>
        </div>
    </div>
</x-modal>