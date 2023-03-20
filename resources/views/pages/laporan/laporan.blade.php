<x-app-layout>
    <div class="row">
        <div class="col-12 py-2">
            <div class="col-12">
                <div class="col-12 px-2 d-flex justify-content-between">
                    <x-breadcrumb parent="Data Master" where="Spp" />
                    <div class="d-flex text-l-regular align-items-center justify-content-end">
                        <i class="fa fa-calendar-alt fs-4" aria-hidden="true"></i>
                        <span class="ms-2">{{ date('Y-m-d') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:laporan.laporan-index>
    <livewire:laporan.laporan-print>
</x-app-layout>