<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPP</title>

    <x-vendor.links />
    <style>
        body {
            background-color: #fff;
        }
        .box {
            right: 0;
            width: 460px;
            height: 520px;
            background: #fff;
            border-radius: 8px;
            display: flex;
            padding: 40px 38px;
            justify-content: center;
            align-items: center;
            box-shadow: 2px 2px 12px 4px #0000001f;
            flex-direction: column;
        }
        label {
            font: 400 14px/20px 'Inter', sans-serif;
        }
    </style>
    <livewire:styles />
</head>
<body>
    <livewire:auth.login />
    <livewire:scripts />
    <x-vendor.scripts />
    @stack('scripts')
</body>
</html>