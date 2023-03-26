<div class="sidebar m-0 fixed-top" style="width: 18%;">
	<div class="sidebar-header pb-2">
		<div class="">
			<a href="http://www.smktipembangunan.sch.id/" class="text-dark fw-semibold header-s text-white d-flex flex-column mt-2 text-center align-items-center">
				<img src="{{ asset('img/tip.png') }}" alt=".." style="width: 120px; height: 120px;" class="mb-2">
				<span>SMK TI</span>
				<span>PEMBANGUNAN</span>
			</a>			
		</div>
	</div>
	<div class="sidebar-body">
		<div class="sidebar-menu d-flex flex-column align-items-start mb-0 pb-0">
			<a href="/beranda" class="menu item py-2 {{ Request::is('beranda') ? 'active' : '' }} ">
				<i class="fa fa-graduation-cap fs-5 me-2" aria-hidden="true"></i>
				<span class="">Beranda</span>
			</a>
		</div>
		<hr>
		@cannot('IsOperator')		
		<div class="sidebar-menu d-flex flex-column align-items-start">
			<a href="/histori-pembayaran" class="menu item">
				<i class="fas fa-book fs-5 me-3" aria-hidden="true"></i>
				<span>History</span>
			</a>
		</div>
		@endcannot
		@can('IsAdmin')
			<div class="sidebar-menu d-flex flex-column align-items-start">
				<div class="menu" data-bs-toggle="collapse" data-bs-target="#dataMaster">
					<img src="{{ asset('icon/data.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
					<span>Data Master</span>
					<i class="fa-solid fa-chevron-down {{ Request::is('siswa*') || Request::is('petugas*') || Request::is('kelas*') || Request::is('spp*') ? 'fa-rotate-180' : '' }}"></i>
				</div>
				<div class="collapse w-100 {{ Request::is('siswa*') || Request::is('petugas*') || Request::is('kelas*') || Request::is('spp*') ? 'show' : '' }}" id="dataMaster">
					<div class="sub-menu">
						<a class="{{ Request::is('spp*') ? 'active' : '' }}" href="/spp">
							<i class="fa fa-arrow-right"></i>
							Spp
						</a>
						<a class="{{ Request::is('kelas*') ? 'active' : '' }}" href="/kelas">
							<i class="fa fa-arrow-right"></i>
							Kelas
						</a>
						<a class="{{ Request::is('petugas*') ? 'active' : '' }}" href="/petugas">
							<i class="fa fa-arrow-right"></i>
							Petugas
						</a>
						<a class="{{ Request::is('siswa*') ? 'active' : '' }}" href="/siswa">
							<i class="fa fa-arrow-right"></i>
							Siswa
						</a>
					</div>
				</div>
			</div>
		@endcan
		@can('IsOperator')
			<div class="sidebar-menu d-flex flex-column align-items-start">
				<div class="menu" data-bs-toggle="collapse" data-bs-target="#transaksi">
					{{-- <img src="{{ asset('icon/data.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;"> --}}
					<i class="fa fa-book me-2" style="font-size: 20px" aria-hidden="true"></i>
					<span>Transaksi</span>
					<i class="fa-solid fa-chevron-down {{ Request::is('pembayaran*') || Request::is('histori-pembayaran*') ? 'fa-rotate-180' : '' }}"></i>
				</div>
				<div class="collapse w-100 {{ Request::is('pembayaran') || Request::is('histori-pembayaran') ? 'show' : '' }}" id="transaksi">
					<div class="sub-menu">						
						<a class="{{ Request::is('pembayaran*') ? 'active' : '' }}" href="/pembayaran">
							<i class="fa fa-arrow-right"></i>
							Pembayaran
						</a>
						<a class="{{ Request::is('histori-pembayaran*') ? 'active' : '' }}" href="/histori-pembayaran">
							<i class="fa fa-arrow-right"></i>
							History Pembayaran
						</a>
					</div>
				</div>
			</div>
		@endcan
		@can('IsAdmin')
			<div class="sidebar-menu d-flex flex-column align-items-start">
				<div class="menu" data-bs-toggle="collapse" data-bs-target="#laporan">
					{{-- <img src="{{ asset('icon/data.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;"> --}}
					<i class="fa fa-archive me-2" style="font-size: 20px" aria-hidden="true"></i>
					<span>Laporan</span>
					<i class="fa-solid fa-chevron-down {{ Request::is('laporan-pembayaran*') ? 'fa-rotate-180' : '' }}"></i>
				</div>
				<div class="collapse w-100 {{ Request::is('laporan-pembayaran*') ? 'show' : '' }}" id="laporan">
					<div class="sub-menu">						
						<a class="{{ Request::is('laporan-pembayaran*') ? 'active' : '' }}" href="/laporan-pembayaran">
							<i class="fa fa-arrow-right"></i>
							Laporan Pembayaran
						</a>
					</div>
				</div>
			</div>
		@endcan
	</div>
</div>

@push('scripts')
	<script>
		const collapseButton = document.querySelectorAll('[data-bs-toggle="collapse"]');
		collapseButton.forEach(item => {
			item.addEventListener('click', function () {
				const arrow = item.querySelector('i.fa-solid');
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