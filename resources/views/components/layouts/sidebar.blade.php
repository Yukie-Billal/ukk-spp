<div class="sidebar m-0 fixed-top" style="width: 18%;">
	<div class="sidebar-header pb-2">
		<div class="text-dark fw-semibold header-s text-white d-flex flex-column mt-2 text-center align-items-center">			
			<img src="{{ asset('img/tip.png') }}" alt=".." style="width: 120px; height: 120px;" class="mb-2">
			<span>SMK TI</span>
			<span>PEMBANGUNAN</span>
		</div>
	</div>
	<div class="sidebar-body">
		<div class="sidebar-menu d-flex flex-column align-items-start">
			<div class="menu" data-bs-toggle="collapse" data-bs-target="#dataMaster">
				<img src="{{ asset('icon/data.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
				<span>Data Master</span>
				<i class="fa-solid fa-chevron-down {{ Request::is('siswa*') || Request::is('petugas*') || Request::is('kelas*') || Request::is('spp*') ? 'fa-rotate-180' : '' }}"></i>
			</div>
			<div class="collapse w-100 {{ Request::is('siswa*') || Request::is('petugas*') || Request::is('kelas*') || Request::is('spp*') ? 'show' : '' }}" id="dataMaster">
				<div class="sub-menu">
					<a class="{{ Request::is('suppliers-users*') ? 'active' : '' }}" href="/spp">
						<i class="fa fa-arrow-right"></i>
						Spp
					</a>
					<a class="{{ Request::is('suppliers-users*') ? 'active' : '' }}" href="/kelas">
						<i class="fa fa-arrow-right"></i>
						Kelas
					</a>
					<a class="{{ Request::is('suppliers-users*') ? 'active' : '' }}" href="/petugas">
						<i class="fa fa-arrow-right"></i>
						Petugas
					</a>
					<a class="{{ Request::is('suppliers-users*') ? 'active' : '' }}" href="/siswa">
						<i class="fa fa-arrow-right"></i>
						Siswa
					</a>
				</div>
			</div>
		</div>
		<div class="sidebar-menu d-flex flex-column align-items-start">
			<div class="menu" data-bs-toggle="collapse" data-bs-target="#transaksi">
				<img src="{{ asset('icon/data.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
				<span>Transaksi</span>
				<i class="fa-solid fa-chevron-down"></i>
			</div>
			<div class="collapse w-100 {{ Request::is('barangs') || Request::is('suppliers-users') || Request::is('barang-masuks') || Request::is('pinjams-kembalis*') ? 'show' : '' }}" id="transaksi">
				<div class="sub-menu">						
					<a class="{{ Request::is('suppliers-users*') ? 'active' : '' }}" href="/pembayaran">
						<i class="fa fa-arrow-right"></i>
						Pembayaran
					</a>
					<a class="{{ Request::is('suppliers-users*') ? 'active' : '' }}" href="/history-pembayaran">
						<i class="fa fa-arrow-right"></i>
						History Pembayaran
					</a>
				</div>
			</div>
		</div>
		<div class="sidebar-menu d-flex flex-column align-items-start">
			<div class="menu" data-bs-toggle="collapse" data-bs-target="#laporan">
				<img src="{{ asset('icon/data.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
				<span>Laporan</span>
				<i class="fa-solid fa-chevron-down"></i>
			</div>
			<div class="collapse w-100 {{ Request::is('barangs') || Request::is('suppliers-users') || Request::is('barang-masuks') || Request::is('pinjams-kembalis*') ? 'show' : '' }}" id="laporan">
				<div class="sub-menu">						
					<a class="{{ Request::is('suppliers-users*') ? 'active' : '' }}" href="/siswa">
						<i class="fa fa-arrow-right"></i>
						Laporan
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

@push('scripts')
	<script>
		const collapseButton = document.querySelectorAll('[data-bs-toggle="collapse"]');
		collapseButton.forEach(item => {
			item.addEventListener('click', function () {
				const arrow = item.querySelector('i');
				if (arrow.classList.contains('fa-rotate-180')) {
					arrow.classList.toggle('fa-rotate-180');
					arrow.classList.add('rotating-reverse');
					setTimeout(() => {
						arrow.classList.remove('rotating-reverse');
					}, 485);
				} else {
					arrow.classList.add('rotating');
					setTimeout(() => {
						arrow.classList.remove('rotating');
						arrow.classList.toggle('fa-rotate-180');
					}, 485);
				}
			});
		});
	</script>
@endpush