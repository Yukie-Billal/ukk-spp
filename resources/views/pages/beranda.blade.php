<x-app-layout>
    <div class="row">
        <div class="col-12 px-4 py-2">
            <div class="col-12 px-2 d-flex justify-content-between">
                <x-breadcrumb />
                <div class="d-flex text-l-regular align-items-center justify-content-end">
                    <i class="fa fa-calendar-alt fs-4" aria-hidden="true"></i>
                    <span class="ms-2">{{ date('Y-m-d') }}</span>
                </div>
            </div>
        </div>
    </div>
    @can('IsOperator')        
        <div class="row pb-3">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <div class="card flex-fill border-0 my-shadow-2 dashboard-card">
                            <div class="card-body" style="overflow: hidden">
                                <div class="d-flex justify-content-between">
                                    <span class="header-m ms-2">Siswa</span>
                                    <div class="icon-dashboard text-neutral-10 d-flex justify-content-center align-items-end bg-info-border me-2 px-3 py-2 pb-1 rounded-3" style="z-index: 1289">
                                        <i class="fa fa-user fs-2"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mt-1">
                                    <span class="header-s my-1 ms-3">{{ $banyakSiswa }}</span>
                                    <div class="count" style="z-index: 1289">
                                        <i class="fa fa-arrow-right me-2"></i>
                                        <span class="text-l-medium">Total <a href="/siswa">{{ $banyakSiswa }} Siswa</a> </span>
                                    </div>
                                </div>
                            </div>
                            <x-indicator-dashboard-card color="success-main" />
                        </div>
                    </div>
                    @can('IsAdmin')                        
                    <div class="col-6">
                        <div class="card flex-fill border-0 my-shadow-2 dashboard-card">
                            <div class="card-body" style="overflow: hidden">
                                <div class="d-flex justify-content-between">
                                    <span class="header-m ms-2">Petugas</span>
                                    {{-- <div class="icon-dashboard text-neutral-10 d-flex justify-content-center align-items-center bg-danger-border me-2 px-3 py-2 pb-1 rounded-3" style="z-index: 1289"> --}}
                                    <div class="icon-dashboard text-neutral-10 d-flex justify-content-center align-items-center bg-info-border me-2 px-3 py-2 pb-1 rounded-3" style="z-index: 1289">
                                        <i class="fa fa-user fs-2"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mt-1">
                                    <span class="header-s my-1 ms-3">{{ $banyakPetugas }}</span>
                                    <div class="count" style="z-index: 1289">
                                        <i class="fa fa-arrow-right me-2"></i>
                                        <span class="text-l-medium">Total <a href="">{{ $banyakPetugas }} Petugas</a> </span>
                                    </div>
                                </div>
                            </div>
                            {{-- <x-indicator-dashboard-card color="warning-main" /> --}}
                            <x-indicator-dashboard-card color="success-main" />
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="card flex-fill border-0 my-shadow-2 dashboard-card">
                            <div class="card-body" style="overflow: hidden">
                                <div class="d-flex justify-content-between">
                                    <span class="header-m ms-2">Spp</span>
                                    <div class="icon-dashboard text-neutral-10 d-flex justify-content-center align-items-center bg-info-border me-2 px-3 py-2 pb-1 rounded-3" style="z-index: 1289">
                                        <i class="fa fa-user fs-2"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mt-1">
                                    <span class="header-s my-1 ms-3">{{ $banyakSpp }}</span>
                                    <div class="count" style="z-index: 1289">
                                        <i class="fa fa-arrow-right me-2"></i>
                                        <span class="text-l-medium">Total <a href="/spp">{{ $banyakSpp }} Spp</a></span>
                                    </div>
                                </div>
                            </div>
                            <x-indicator-dashboard-card color="success-main" />
                        </div>
                    </div>
                    @endcan
                    <div class="col-6">
                        <div class="card flex-fill border-0 my-shadow-2 dashboard-card">
                            <div class="card-body" style="overflow: hidden">
                                <div class="d-flex justify-content-between">
                                    <span class="header-m ms-2">Kelas</span>
                                    <div class="icon-dashboard text-neutral-10 d-flex justify-content-center align-items-center bg-info-border me-2 px-3 py-2 pb-1 rounded-3" style="z-index: 1289">
                                        <i class="fa fa-user fs-2"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mt-1">
                                    <span class="header-s my-1 ms-3">{{ $banyakKelas }}</span>
                                    <div class="count" style="z-index: 1289">
                                        <i class="fa fa-arrow-right me-2"></i>
                                        <span class="text-l-medium">Total <a href="">{{ $banyakKelas }} Kelas</a> </span>
                                    </div>
                                </div>
                            </div>
                            <x-indicator-dashboard-card color="success-main" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <x-card>
                    <canvas id="spp" class="h-100"></canvas>
                </x-card>
            </div>
            {{-- <div class="col-4 mt-3 bg-danger">
                <x-card>
                    <canvas id="siswa" class="h-100"></canvas>
                </x-card>
            </div> --}}
        </div>

        @foreach ($dataPertahun as $item)
            <input type="hidden" id="datapertahun" value="{{ $item }}">        
        @endforeach
        @foreach ($dataPertahun as $item)
            <input type="hidden" id="siswapertahun" value="{{ $item }}">        
        @endforeach
        @push('scripts')
            <script>
                var ctx = document.getElementById('spp');
                var DATA_COUNT = 6;
                var dataset = JSON.parse($('#datapertahun').val());        
                var labels = ["{{ __('kalendar.January') }}", "{{ __('kalendar.Febuary') }}", "{{ __('kalendar.March') }}", "{{ __('kalendar.April') }}", "{{ __('kalendar.May') }}", "{{ __('kalendar.June') }}", "{{ __('kalendar.July') }}", "{{ __('kalendar.August') }}", "{{ __('kalendar.September') }}", "{{ __('kalendar.October') }}", "{{ __('kalendar.November') }}", "{{ __('kalendar.December') }}"]
                var datapoints = [dataset.Januari, dataset.Februari, dataset.Maret, dataset.April, dataset.Mei,dataset.Juni,dataset.Juli,dataset.Agustus,dataset.September,dataset.Oktober,dataset.November,dataset.Desember];
                var data = {
                    labels: labels,
                    datasets: [
                        // {
                        //     label: 'Cubic interpolation (monotone)',
                        //     data: datapoints,
                        //     // borderColor: Utils.CHART_COLORS.red,
                        //     fill: false,
                        //     cubicInterpolationMode: 'monotone',
                        //     tension: 0.4
                        // },
                        {
                            label: 'Pembayaran Rp',
                            data: datapoints,
                            // borderColor: '#000',
                            fill: false,
                            tension: 0.4,
                        }
                        // {
                        //     label: 'Linear interpolation (default)',
                        //     data: datapoints,
                        //     // borderColor: Utils.CHART_COLORS.green,
                        //     fill: true,
                        //     tension: .3
                        // }
                    ]
                };
                var config = {
                    type: 'line',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                        title: {
                            display: true,
                            text: 'Grafik Total Pembayaran Tahun Ini'
                        },
                        },
                        interaction: {
                            intersect: false,
                        },
                        scales: {
                            x: {
                                display: true,
                                title: {
                                display: true
                                }
                            },
                            y: {
                                display: true,
                                title: {
                                display: true,
                                // text: 'Value'
                                },
                                suggestedMin: -10,
                                suggestedMax: 200
                            }
                        }
                    },
                    };
                new Chart(ctx, config, data);
            </script>
            {{-- <script>
                var ctx = document.getElementById('siswa');
                // var DATA_COUNT = 12;
                var dataset = JSON.parse($('#siswapertahun').val());
                var labels = [];
                for (let index = 0; index < 5; index++) {
                    labels.push(moment().format('YYYY') - index);
                }
                var datapoints = [dataset.Januari, dataset.Februari, dataset.Maret, dataset.April, dataset.Mei,dataset.Juni];
                var data = {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Cubic interpolation',
                            data: datapoints,
                            borderColor: '#43936C',
                            fill: false,
                            tension: 0.4
                        }
                    ]
                };
                var config = {
                    type: 'line',
                    data: data,
                    options: {
                        // legend: false,
                        responsive: true,
                        plugins: {
                        title: {
                            display: true,
                            text: 'Grafik Total Pembayaran Tahun Ini'
                        },
                        },
                        interaction: {
                            intersect: false,
                        },
                        scales: {
                            x: {
                                display: true,
                                title: {
                                display: true
                                }
                            },
                            y: {
                                display: true,
                                title: {
                                display: true,
                                // text: 'Value'
                                },
                                suggestedMin: -10,
                                suggestedMax: 200
                            }
                        }
                    },
                    };
                new Chart(ctx, config, data);            
            </script>             --}}
        @endpush
    @endcan
    @cannot('IsOperator')
        
    @endcannot
</x-app-layout>