<!-- <form wire:submit.prevent="loginact"> -->
<form action="/loginact" method="post">
    @csrf
    <input type="text" wire:model='email' class="input-form">
    @error('email')
        <span style="color: red">{{ $message }}</span>
    @enderror
    <input type="text" wire:model='password' class="input-form">
    @error('password')
        <span style="color: red">{{ $message }}</span>
    @enderror
    <button>Login</button>

    @if (session()->has('failed'))
        {{ session('failed') }}
    @endif
</form>