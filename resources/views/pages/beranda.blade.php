<x-app-layout>
    
    <div class="row">
        <div class="col-3">
            <div class="card flex-fill border-0 my-shadow-2 dashboard-card">
                <div class="card-body" style="overflow: hidden">
                    <div class="d-flex justify-content-between">
                        <span class="header-m ms-2">Siswa</span>
                        <div class="icon-dashboard text-neutral-10 d-flex justify-content-center align-items-center bg-info-border me-2 px-3 py-2 rounded-3" style="z-index: 1289">
                            <i class="fa fa-user fs-2"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-2">
                        <div class="count" style="z-index: 1289">
                            <i class="fa fa-arrow-right me-2"></i>
                            <span class="text-l-medium">Jumlah <a href="">Siswa</a> </span>
                        </div>
                    </div>
                </div>
                <x-indicator-dashboard-card color="success-main" />
            </div>
        </div>
        <div class="col-3">
            <div class="card flex-fill border-0 my-shadow-2 dashboard-card">
                <div class="card-body" style="overflow: hidden">
                    <div class="d-flex justify-content-between">
                        <span class="header-m ms-2">Petugas</span>
                        <div class="icon-dashboard text-neutral-10 d-flex justify-content-center align-items-center bg-danger-border me-2 px-3 py-2 rounded-3" style="z-index: 1289">
                            <i class="fa fa-user fs-2"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-2">
                        <div class="count" style="z-index: 1289">
                            <i class="fa fa-arrow-right me-2"></i>
                            <span class="text-l-medium">Jumlah <a href="">Petugas</a> </span>
                        </div>
                    </div>
                </div>
                <x-indicator-dashboard-card color="warning-main" />
            </div>
        </div>
        <div class="col-3">
            <div class="card flex-fill border-0 my-shadow-2 dashboard-card">
                <div class="card-body" style="overflow: hidden">
                    <div class="d-flex justify-content-between">
                        <span class="header-m ms-2">Spp</span>
                        <div class="icon-dashboard text-neutral-10 d-flex justify-content-center align-items-center bg-info-border me-2 px-3 py-2 rounded-3" style="z-index: 1289">
                            <i class="fa fa-user fs-2"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-2">
                        <div class="count" style="z-index: 1289">
                            <i class="fa fa-arrow-right me-2"></i>
                            <span class="text-l-medium">Jumlah <a href="">Spp</a> </span>
                        </div>
                    </div>
                </div>
                <x-indicator-dashboard-card color="success-main" />
            </div>
        </div>
        <div class="col-3">
            <div class="card flex-fill border-0 my-shadow-2 dashboard-card">
                <div class="card-body" style="overflow: hidden">
                    <div class="d-flex justify-content-between">
                        <span class="header-m ms-2">Kelas</span>
                        <div class="icon-dashboard text-neutral-10 d-flex justify-content-center align-items-center bg-danger-border me-2 px-3 py-2 rounded-3" style="z-index: 1289">
                            <i class="fa fa-user fs-2"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-2">
                        <div class="count" style="z-index: 1289">
                            <i class="fa fa-arrow-right me-2"></i>
                            <span class="text-l-medium">Jumlah <a href="">Kelas</a> </span>
                        </div>
                    </div>
                </div>
                <x-indicator-dashboard-card color="warning-main" />
            </div>
        </div>
    </div>

</x-app-layout>