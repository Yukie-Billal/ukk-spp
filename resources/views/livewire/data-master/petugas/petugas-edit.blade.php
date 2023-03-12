<div class="modal-body">
    <h2 class="text-center header-m mb-4">Form Tambah Petugas</h2>
    <form wire:submit.prevent="edit">
        <div class="form-group my-2">
            <label class="text-m-regular">Nama Petugas</label>
            <x-form.input placeholder="Masukkan Nama Petugas" wire:model.lazy="nama_petugas" />
            @error('nama_petugas')
                <small class="text-m-medium text-danger-main">{{ $message }}</small>                
            @enderror
        </div>
        <div class="form-group my-2">
            <label class="text-m-regular">No Telephone</label>
            <x-form.input placeholder="No Telephone" wire:model.lazy="no_telp" />
            @error('no_telp')
                <small class="text-m-medium text-danger-main">{{ $message }}</small>                
            @enderror
        </div>
        <div class="form-group my-2">
            <label class="text-m-regular" for="alamat">Alamat</label>
            <textarea id="alamat" placeholder="Alamat" wire:model.lazy="alamat" class="text-area-form" wire:loading.attr='readonly'></textarea>
            @error('alamat')
                <small class="text-m-medium text-danger-main">{{ $message }}</small>                
            @enderror
        </div>
        <div class="form-group mb-3">
            <label class="text-m-regular">Role</label>
            <select wire:change="$emit('getRole')" id="roleEdit" class="select-form" nama="role_id" wire:loading.attr='readonly'>
                @foreach ($roles as $role)
                    @if ($role->id != 3)
                    <option value="{{ $role->id }}" {{ $role->id == $role_id ? 'selected' : '' }}>{{ $role->nama_role }}</option>
                    @endif
                @endforeach
            </select>
            @error('role_id')
                <small class="text-m-medium text-danger-main">{{ $message }}</small>                
            @enderror
        </div>
        <x-button color="success" class="mt-3">Tambah Petugas</x-button>
    </form>
</div>

@push('scripts')
    <script>
        Livewire.on('getRole', function () {
            var value = $('#roleEdit').val();
            Livewire.emit('setRole', value);
        });
        Livewire.on('fresh',function(){$('#modalEditPetugas').modal('hide');});
    </script>
@endpush