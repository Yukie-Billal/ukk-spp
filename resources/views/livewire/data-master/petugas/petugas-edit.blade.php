<div class="modal-body">
    <h2 class="text-center header-m mb-4">Form Tambah Petugas</h2>
    <form wire:submit.prevent="store">
        {{-- <div class="form-group">
            <label class="text-m-regular">Username</label>
            <x-form.input placeholder="Username Petugas" wire:model.lazy="username" />
        </div>
        <div class="form-group my-2">
            <label class="text-m-regular">Password</label>
            <x-form.input placeholder="Password Petugas" wire:model.lazy="password" />
        </div> --}}
        <div class="form-group my-2">
            <label class="text-m-regular">Nama Petugas</label>
            <x-form.input placeholder="Masukkan Nama Petugas" wire:model.lazy="nama_petugas" />
        </div>
        <div class="form-group my-2">
            <label class="text-m-regular">No Telephone</label>
            <x-form.input placeholder="No Telephone" wire:model.lazy="no_telp" />
        </div>
        <div class="form-group my-2">
            <label class="text-m-regular" for="alamat">Alamat</label>
            <textarea id="alamat" placeholder="Alamat" wire:model.lazy="alamat" class="text-area-form"></textarea>
        </div>
        <div class="form-group mb-3">
            <label class="text-m-regular" for="role">Role</label>
            <select wire:change="$emit('getRole')" class="select-form" id="role">
                @foreach ($roles as $role)
                    @if ($role->id != 3)
                        <option value="{{ $role->id }}" {{ $role->id == $roleId ? 'selected' : '' }}>{{ $role->nama_role }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <x-button color="success" class="mt-3" data-bs-dismiss="modal">Tambah Petugas</x-button>
    </form>
</div>

@push('scripts')
    <script>
        Livewire.on('getRole', function () {
            var value = $('#role').val();
            Livewire.emit('setRole', value);
        })
    </script>
@endpush