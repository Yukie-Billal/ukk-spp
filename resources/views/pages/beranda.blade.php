<x-app-layout>
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-6">
                    <div class="card flex-fill border-0 my-shadow-2 dashboard-card">
                        <div class="card-body" style="overflow: hidden">
                            <div class="d-flex justify-content-between">
                                <span class="header-m ms-2">Total Siswa</span>
                                <div class="icon-dashboard text-neutral-10 d-flex justify-content-center align-items-center bg-info-border me-2 px-3 py-2 rounded-3" style="z-index: 1289">
                                    <i class="fa fa-user fs-2"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-column mt-2">
                                <div class="count" style="z-index: 1289">
                                    <i class="fa fa-arrow-right me-2"></i>
                                    <span class="text-l-medium">{{ $banyakSiswa }} <a href="">Siswa</a> </span>
                                </div>
                            </div>
                        </div>
                        <x-indicator-dashboard-card color="success-main" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="card flex-fill border-0 my-shadow-2 dashboard-card">
                        <div class="card-body" style="overflow: hidden">
                            <div class="d-flex justify-content-between">
                                <span class="header-m ms-2">Total Petugas</span>
                                <div class="icon-dashboard text-neutral-10 d-flex justify-content-center align-items-center bg-danger-border me-2 px-3 py-2 rounded-3" style="z-index: 1289">
                                    <i class="fa fa-user fs-2"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-column mt-2">
                                <div class="count" style="z-index: 1289">
                                    <i class="fa fa-arrow-right me-2"></i>
                                    <span class="text-l-medium">{{ $banyakPetugas }} <a href="">Petugas</a> </span>
                                </div>
                            </div>
                        </div>
                        <x-indicator-dashboard-card color="warning-main" />
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
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
                <div class="col-6">
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
        </div>
        <div class="col-6">
            <x-card>
                <canvas id="myChart" class="h-100"></canvas>
            </x-card>
        </div>
    </div>

    @push('scripts')
        <script>
            var ctx = document.getElementById('myChart');
            const DATA_COUNT = 12;
            const labels = [];
            for (let i = {{ date('Y') }} - 12; i <= "{{ date('Y') }}"; ++i) {
                labels.push(i);
            }
            const datapoints = [0, 20, 20, 60, 60, 120, NaN, 180, 120, 125, 105, 110, 170];
            const data = {
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
                        label: 'Cubic interpolation',
                        data: datapoints,
                        // borderColor: Utils.CHART_COLORS.blue,
                        fill: false,
                        tension: 0.4
                    }
                    // {
                    //     label: 'Linear interpolation (default)',
                    //     data: datapoints,
                    //     // borderColor: Utils.CHART_COLORS.green,
                    //     fill: false
                    // }
                ]
            };
            const config = {
                type: 'line',
                data: data,
                options: {
                    // legend: false,
                    responsive: true,
                    plugins: {
                    title: {
                        display: true,
                        text: 'Chart.js Line Chart - Cubic interpolation mode'
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
    @endpush

</x-app-layout>