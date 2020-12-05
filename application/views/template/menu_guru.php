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
			<a href="<?= base_url('profil_sekolah') ?>" class="nav-link <?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'profil_sekolah') { echo 'active';}?>">
				<i class="nav-icon fas fa-school"></i>
				<p>
					Profil Sekolah
				</p>
			</a>
		</li>
		<li class="nav-header">Menu Guru</li>
		<li class="nav-item">
			<a href="<?= base_url('materi') ?>" class="nav-link <?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'materi') { echo 'active';}?>">
				<i class="nav-icon fas fa-book"></i>
				<p>
					Materi
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('bank_soal') ?>" class="nav-link <?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'bank_soal') { echo 'active';}?>">
				<i class="nav-icon fas fa-database"></i>
				<p>
					Bank Soal
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('rekap_nilai') ?>" class="nav-link <?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'rekap_nilai') { echo 'active';}?>">
				<i class="nav-icon fas fa-tasks"></i>
				<p>
					Rekap Nilai
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('rekap_absensi') ?>" class="nav-link <?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'rekap_absensi') { echo 'active';}?>">
				<i class="nav-icon fas fa-user-check"></i>
				<p>
					Rekap Absensi
				</p>
			</a>
		</li>
	</ul>
</nav>
