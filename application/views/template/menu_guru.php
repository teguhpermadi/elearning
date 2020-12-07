<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		<li class="nav-item">
			<a href="<?= base_url('dashboard') ?>" class="nav-link <?php if($this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '') { echo 'active';}?>">
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
		<li class="nav-header">Menu Guru</li>
		<li class="nav-item menu-open">
			<a href="<?= base_url('materi') ?>" class="nav-link">
				<i class="nav-icon fas fa-book"></i>
				<p>
					Materi
					<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('posts/add') ?>" class="nav-link <?php if($this->uri->segment(2) == 'add') { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('posts') ?>" class="nav-link <?php if($this->uri->segment(2) == 'posts') { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Postingan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('category') ?>" class="nav-link <?php if($this->uri->segment(1) == 'category') { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tag</p>
                </a>
              </li>
            </ul>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('bank_soal') ?>" class="nav-link <?php if($this->uri->segment(1) == 'bank_soal') { echo 'active';}?>">
				<i class="nav-icon fas fa-database"></i>
				<p>
					Bank Soal
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('rekap_nilai') ?>" class="nav-link <?php if($this->uri->segment(1) == 'rekap_nilai') { echo 'active';}?>">
				<i class="nav-icon fas fa-tasks"></i>
				<p>
					Rekap Nilai
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('rekap_absensi') ?>" class="nav-link <?php if($this->uri->segment(1) == 'rekap_absensi') { echo 'active';}?>">
				<i class="nav-icon fas fa-user-check"></i>
				<p>
					Rekap Absensi
				</p>
			</a>
		</li>
	</ul>
</nav>
