<div class="row">
    <div class="col-4">
        <x-card>
            <div class="card-body">
                <div class="img-profile d-flex justify-content-center">
                    @can('IsOperator')
                        @if (Auth::guard('petugas')->user()->foto == null)
                            <img src="{{ asset('img/tip.png') }}" alt=".." style="width: 150px;">
                        @else
                            <img src="{{ asset('storage/') . Auth::guard('petugas')->user()->foto }}" alt=".." style="width: 150px">
                        @endif
                    @endcan
                    @cannot('IsOperator')
                        <img src="{{ asset('storage/') . Auth::guard('siswa')->user()->foto }}" alt="..">
                    @endcannot
                </div>
                <div class="d-flex justify-content-end pe-3 pt-2">
                    <x-button color="info" class="button-sm" modal="true" target="#modal-ubah-profile">Ubah profile</x-button>
                    <livewire:foto-profile-ubah  />
                </div>
            </div>
        </x-card>
    </div>
    <div class="col-8">
        <x-card>
            <div class="card-body">
                @can('IsOperator')
                    <h3>{{ Auth::guard('petugas')->user()->nama_petugas }}</h3>
                @endcan
                @cannot('IsOperator')
                    {{ Auth::guard('siswa')->user()->nama }}
                @endcannot
            </div>
        </x-card>
    </div>
</div>