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
        <div class="provider-menu d-flex flex-column position-relative" x-data="{open:false}">
            <span class="img-fluid position-relative" id="menuToggle" x-on:click="open = true">
                <img src="{{ asset('img/a.jpg') }}" alt=".." class="rounded-4 cursor-pointer" width="35px" height="35px">
            </span>
            <ul class="menu-list" x-show="open" x-transition @click.outside="open  = false" style="z-index: 9999999">
                <a href="/beranda" class="text-l-medium text-neutral-90">
                    <li class="menu-item">
                        <i class="fa fa-list-alt me-1" aria-hidden="true"></i>
                        Dashboard
                    </li>
                </a>
                <a href="/profile" class="text-l-medium text-neutral-90">
                    <li class="menu-item">
                        <i class="fa fa-user me-2" aria-hidden="true"></i>
                        Profile
                    </li>
                </a>
                <li class="menu-dash"></li>
                <a href="/logout" class="text-l-medium text-neutral-90">
                    <li class="menu-item">
                        <i class="fa fa-sign-out me-1" aria-hidden="true"></i>
                        Logout
                    </li>
                </a>
            </ul>
        </div>
    </div>
</nav>