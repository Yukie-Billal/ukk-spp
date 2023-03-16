<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP - Yukie</title>
    <link rel="shortcut icon" href="{{ asset('img/tip.png') }}" type="image/x-icon">
    <x-vendor.links />
    @stack("links")
    <livewire:styles />
</head>
<body>
    <div class="loader" id="loader">
        <div class="load-state-item">
            {{-- <div class="top"></div>
            <div class="bottom"></div> --}}
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row m-0 p-0">
            {{-- <div class="sidebar-main d-sm-none d-md-none d-lg-block"> --}}
            <div class="sidebar-main d-md-none d-lg-block d-sm-none" style="width: 18%">
                <x-layouts.sidebar />
            </div>
            {{-- <div class="p-0 m-0 main-content col-lg-10 col-md-12 col-xl-12"> --}}
            <div class="p-0 m-0 main-content col-lg-10 col-md-12 col-xl-12 col-sm-12" style="width: 82%">
                <x-layouts.header />
                <div class="content px-3" style="min-height: 100vh">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    <x-vendor.toast />
    <x-vendor.swal />
    <livewire:scripts />
    <x-vendor.scripts />
    @stack("scripts")
</body>
</html>