<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP - Yukie</title>

    <x-vendor.links />
    @stack("links")
    <livewire:styles />
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row m-0 p-0">
            <div style="width: 18%;" class="m-0 p-0" style="background: #315ae0;">
                <x-layouts.sidebar />
            </div>
            <div style="width: 82%;" class="p-0 m-0">
                <x-layouts.header />
                <div class="content px-3" style="height: 200vh;">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    {{ auth()->user() }}

    <x-vendor.toast />
    <x-vendor.swal />
    <livewire:scripts />
    <x-vendor.scripts />
    @stack("scripts")
</body>
</html>