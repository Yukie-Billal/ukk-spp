<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPP</title>

    <livewire:styles />
</head>
<body>
    <h1>Selamat Datang</h1>
    {{-- <livewire:auth.login /> --}}
    <form action="/loginact" method="post">
        @csrf
        <input type="text" name="username" class="input-form">
        @error('email')
            <span style="color: red">{{ $message }}</span>
        @enderror
        <input type="text" name="password" class="input-form">
        @error('password')
            <span style="color: red">{{ $message }}</span>
        @enderror
        <button>Login</button>
    
        @if (session()->has('failed'))
            {{ session('failed') }}
        @endif
    </form>

    <livewire:scripts />
</body>
</html>