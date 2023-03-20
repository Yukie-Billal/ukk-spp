<div class="container d-flex align-items-center position-relative" style="height: 100vh">
    @if ($role == 'siswa')
        <img src="{{ asset('img/back_to_school.jpg') }}" alt=".." height="100%" class="animate__animated animate__fadeIn animate__delay">
    @else
        <img src="{{ asset('img/accoutn-concept.jpg') }}" alt=".." height="100%" id="bg-petugas" class="animate__animated animate__fadeIn animate__delay">
    @endif
    <div class="box my-shadow-2" style="position: absolute;">
        <div class="header mb-5 pb-3 d-flex flex-column text-center">
            <span class="header-l">{{ __('Selamat Datang') }}</span>
            <small class="text-l-regular">SMK T.I. Pembangunan</small>
        </div>
        @if ($role == 'petugas')
            <form action="/loginact" method="post" class="w-100">
                @csrf
                <input type="hidden" name="role" value="petugas">
                <div class="form-group">
                    <label for="username" class="text-l-regular">Username</label>
                    <input type="text" wire:model.lazy='username' id="username" name="username" class="input-form input-form-lg text-m-regular placeholder-m-m @error('username') is-invalid @enderror" placeholder="Masukkan Username">
                    @error('username')
                    <span class="text-danger-main text-m-regular">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="username" class="text-l-regular">Password</label>
                    <input type="password" wire:model.lazy='password' id="password" name="password" class="input-form input-form-lg text-m-regular placeholder-m-m @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                    @error('password')
                    <span class="text-danger-main text-m-regular">{{ $message }}</span>
                    @enderror
                </div>
                <button class="button button-success w-100 text-l-medium">Login</button>
                <div class="text-center mt-4">
                    <a wire:click='setRole("siswa")' class="text-l-medium text-center cursor-pointer">
                        Login Sebagai Siswa
                    </a>
                </div>
            </form>
        @else
            <form action="/loginact" method="post" class="w-100">
                @csrf
                <input type="hidden" name="role" value="siswa">
                <div class="form-group">
                    <label for="username" class="text-l-regular">NISN</label>
                    <input type="text" wire:model.lazy='username' id="username" name="nisn" class="input-form input-form-lg text-m-regular placeholder-m-m @error('username') is-invalid @enderror" placeholder="Masukkan Username">
                    @error('nisn')
                        <span class="text-danger-main text-m-regular">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="username" class="text-l-regular">Password / NIS</label>
                    <input type="password" wire:model.lazy='password' id="password" name="password" class="input-form input-form-lg text-m-regular placeholder-m-m @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                    @error('password')
                        <span class="text-danger-main text-m-regular">{{ $message }}</span>
                    @enderror
                </div>
                <button class="button button-success w-100 text-l-medium">Login</button>
                <div class="text-center mt-4">
                    <a wire:click='setRole("petugas")' class="text-l-medium text-center cursor-pointer">
                        Login Sebagai Petugas
                    </a>
                </div>
            </form>
        @endif
    </div>
</div>
@push('scripts')
@if (session()->has('failed'))
    <script>
        swal.fire({
            icon: 'error',
            title: "{{ session('failed') }}",
            showConfirmButton: false,
            timer: 2500,
            showClass: {
                popup: 'animate__animated animate__tada'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOut'
            }
        });
    </script>
@endif
@endpush