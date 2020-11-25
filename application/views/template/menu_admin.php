<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		<li class="nav-item">
			<a href="<?= base_url('dashboard') ?>" class="nav-link <?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard') { echo 'active';}?>">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>
					Dashboard
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('profil_sekolah') ?>" class="nav-link <?php if($this->uri->segment(1) == 'profil_sekolah') { echo 'active';}?>">
				<i class="nav-icon fas fa-school"></i>
				<p>
					Profil Sekolah
				</p>
			</a>
		</li>
		<li class="nav-header">Menu User</li>
		<li class="nav-item <?php if($this->uri->segment(1) == 'profil_user') { echo 'active';}?>">
			<a href="<?= base_url('profil_user') ?>" class="nav-link">
				<i class="nav-icon fas fa-chalkboard-teacher"></i>
				<p>
					Profil User
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('auth/logout') ?>" class="nav-link <?php if($this->uri->segment(1) == 'auth/logout') { echo 'active';}?>">
				<i class="nav-icon fas fa-sign-out-alt"></i>
				<p>
					Keluar
				</p>
			</a>
		</li>
		<li class="nav-header">Menu Admin</li>
		<li class="nav-item">
			<a href="<?= base_url('guru') ?>" class="nav-link <?php if($this->uri->segment(1) == 'guru') { echo 'active';}?>">
				<i class="nav-icon fas fa-chalkboard-teacher"></i>
				<p>
					Guru
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('siswa') ?>" class="nav-link <?php if($this->uri->segment(1) == 'siswa') { echo 'active';}?>">
				<i class="nav-icon fas fa-user-graduate"></i>
				<p>
					Siswa
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('kelas') ?>" class="nav-link <?php if($this->uri->segment(1) == 'kelas') { echo 'active';}?>">
				<i class="nav-icon fas fa-book-reader"></i>
				<p>
					Kelas
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('rombel') ?>" class="nav-link <?php if($this->uri->segment(1) == 'rombel') { echo 'active';}?>">
				<i class="nav-icon fas fa-users"></i>
				<p>
					Rombel
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('mapel') ?>" class="nav-link <?php if($this->uri->segment(1) == 'mapel') { echo 'active';}?>">
				<i class="nav-icon fas fa-book"></i>
				<p>
					Mata Pelajaran
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('pengajar') ?>" class="nav-link <?php if($this->uri->segment(1) == 'pengajar') { echo 'active';}?>">
				<i class="nav-icon fas fa-book"></i>
				<p>
					Pengajar
				</p>
			</a>
		</li>
	</ul>
</nav>
