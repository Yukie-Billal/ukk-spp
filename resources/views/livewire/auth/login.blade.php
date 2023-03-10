<form action="/loginact" method="post" class="w-100">
    @csrf
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" wire:model.lazy='username' id="username" name="username" class="input-form text-m-regular placeholder-m-m @error('username') is-invalid @enderror" placeholder="Masukkan Username">
        @error('username')
            <span class="text-danger-main text-m-regular">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-3">
        <label for="username">Password</label>
        <input type="password" wire:model.lazy='password' id="password" name="password" class="input-form text-m-regular placeholder-m-m @error('password') is-invalid @enderror" placeholder="Masukkan Password">
        @error('password')
            <span class="text-danger-main text-m-regular">{{ $message }}</span>
        @enderror
    </div>
    <button class="button button-success">Login</button>

    @if (session()->has('failed'))
        {{ session('failed') }}
    @endif
</form>