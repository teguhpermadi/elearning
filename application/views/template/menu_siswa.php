<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		<li class="nav-item">
			<a href="<?= base_url('dashboard') ?>" class="nav-link active">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>
					Dashboard
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('profil_sekolah') ?>" class="nav-link">
				<i class="nav-icon fas fa-school"></i>
				<p>
					Profil Sekolah
				</p>
			</a>
		</li>
		<li class="nav-header">Menu Siswa</li>
		<li class="nav-item">
			<a href="<?= base_url('materi') ?>" class="nav-link">
				<i class="nav-icon fas fa-book"></i>
				<p>
					Materi
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url('materi/task') ?>" class="nav-link">
				<i class="nav-icon fas fa-tasks"></i>
				<p>
					Tugas Saya
				</p>
			</a>
		</li>
	</ul>
</nav>
