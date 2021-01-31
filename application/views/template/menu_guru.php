<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		<li class="nav-item">
			<a href="<?= base_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '') {
																		echo 'active';
																	} ?>">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>
					Dashboard
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('profil_sekolah') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'profil_sekolah') {
																			echo 'active';
																		} ?>">
				<i class="nav-icon fas fa-school"></i>
				<p>
					Profil Sekolah
				</p>
			</a>
		</li>
		<li class="nav-header">Menu Guru</li>
		<li class="nav-item <?= ($this->uri->segment(1) == 'post' || $this->uri->segment(1) == 'post/add') ? 'menu-open' : ''; ?>">
			<a href="#" class="nav-link">
				<i class="nav-icon fas fa-book"></i>
				<p>
					Postingan
					<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="<?= base_url('post/add') ?>" class="nav-link <?= ($this->uri->segment(1) == 'post' && $this->uri->segment(2) == 'add') ? 'active' : ''; ?>">
						<i class="far fa-file nav-icon"></i>
						<p>Tambah Baru</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('post') ?>" class="nav-link <?= ($this->uri->segment(1) == 'post' && $this->uri->segment(2) == '')? 'active' : ''; ?>">
						<i class="far fa-folder-open nav-icon"></i>
						<p>Semua Postingan</p>
					</a>
				</li>
			</ul>

		</li>
		<li class="nav-item  <?= ($this->uri->segment(1) == 'soal' || $this->uri->segment(1) == 'ujian') ? 'menu-open' : ''; ?>">
			<a  href="#" class="nav-link">
				<i class="nav-icon fas fa-database"></i>
				<p>
					Bank Soal
					<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="<?= base_url('soal') ?>" class="nav-link <?= ($this->uri->segment(1) == 'soal') ? 'active' : ''; ?>">
						<i class="fas fa-pencil-ruler nav-icon"></i>
						<p>Soal</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('ujian') ?>" class="nav-link <?= ($this->uri->segment(1) == 'ujian') ? 'active' : ''; ?>">
						<i class="fas fa-pencil-ruler nav-icon"></i>
						<p>Ujian</p>
					</a>
				</li>
			</ul>
		</li>
		
		<li class="nav-item">
			<a href="<?= base_url('nilai') ?>" class="nav-link <?= ($this->uri->segment(1) == 'nilai') ? 'active' : '' ?>">
				<i class="nav-icon fas fa-file-alt"></i>
				<p>
					Rekap Nilai
				</p>
			</a>
		</li>
		<!-- <li class="nav-item">
			<a href="<?= base_url('rekap_absensi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'rekap_absensi') {
																			echo 'active';
																		} ?>">
				<i class="nav-icon fas fa-user-check"></i>
				<p>
					Rekap Absensi
				</p>
			</a>
		</li> -->
	</ul>
</nav>