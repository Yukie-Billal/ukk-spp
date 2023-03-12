<nav class="navbar navbar-expand-md bg-white m-0 px-3 justify-content-between align-items-center mb-4">
    <span class="header-m ms-3">T.I.P </span>
    <div class="d-flex justify-content-center align-items-center me-3">
        <span class="text-l-medium me-2">
            @if (Auth::guard('siswa')->check())
                {{ Auth::guard('siswa')->user()->nama }}
            @else
                {{ Auth::guard('petugas')->user()->nama_petugas }}                
            @endif
        </span>
        <img src="{{ asset('img/a.jpg') }}" alt=".." class="rounded-4 cursor-pointer" width="35px" height="35px" onclick="top.location='/logout'">
    </div>
</nav>