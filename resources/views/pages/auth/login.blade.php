<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPP</title>

    
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <style>
        .box {
            bottom: 160px;
            right: 100px;
            width: 360px;
            height: 420px;
            background: #fff;
            border-radius: 8px;
            display: flex;
            padding: 40px 28px;
            justify-content: center;
            align-items: center;
            box-shadow: 4px 4px 8px 2px #0000001f;
            flex-direction: column
        }
        label {
            font: 400 14px/20px 'Inter', sans-serif;
        }
    </style>
    <livewire:styles />
</head>
<body>
    {{-- <img src="{{ asset('img/a.jpg') }}" alt=".."> --}}
    <div class="box my-shadow-2" style="position: absolute;">
        <span class="header-m mb-4">Selamat Datang</span>
        <livewire:auth.login />
    </div>
    <livewire:scripts />
    <x-vendor.scripts />
</body>
</html>