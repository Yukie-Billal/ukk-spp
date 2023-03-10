<div class="sidebar m-0 fixed-top" style="width: 18%;">
	<div class="sidebar-header">
		<div class="text-dark fw-semibold header-s text-white d-flex flex-column mt-3 text-center">			
			<span>SMK TI</span>
			<span>PEMBANGUNAN</span>
		</div>
	</div>
	<div class="sidebar-body">	
		<div class="sidebar-menu d-flex flex-column align-items-start">
			<div class="menu" data-bs-toggle="collapse" data-bs-target="#dataSubMenu">
				<img src="{{ asset('icon/data.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
				<span>Data Master</span>
				<i class="fa-solid fa-chevron-down"></i>
			</div>
			<div class="collapse w-100 {{ Request::is('barangs') || Request::is('suppliers-users') || Request::is('barang-masuks') || Request::is('pinjams-kembalis*') ? 'show' : '' }}" id="dataSubMenu">
				<div class="sub-menu">						
					<a class="{{ Request::is('suppliers-users*') ? 'active' : '' }}" href="/siswas">Siswa</a>
					<a href="/pinjams-kembalis" class="{{ Request::is('pinjams-kembalis*') ? 'active' : '' }}">Pinjam & Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>