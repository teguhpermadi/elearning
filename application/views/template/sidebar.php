  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          Pengaturan User
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php
          if (user_info()['foto'] != null) {
            $foto = base_url('uploads/') . user_info()['foto'];
          } else {
            $foto = base_url('assets/images/avatar_default.png');
          }
          ?>
          <img src="<?= $foto ?>" alt="User Avatar" class="img-size-50 img-circle mx-auto d-block mt-3">
          <span class="dropdown-item dropdown-header"><?= user_info()['first_name'] ?></span>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('profil_user') ?>" class="dropdown-item">
            <i class="fas fa-users-cog mr-2"></i> Pengaturan Profil
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('auth/change_password') ?>" class="dropdown-item">
            <i class="fas fa-key mr-2"></i> Ubah Password
          </a>
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Pesan
            <span class="float-right text-muted text-sm">2 days</span>
          </a> -->
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('auth/logout') ?>" class="dropdown-item dropdown-footer bg-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <?php
      if (file_exists('uploads/logo.png')) {
        $logo = 'uploads/logo.png';
      } else {
        $logo = 'assets/images/logo_default.png';
      }
      ?>
      <img src="<?= base_url($logo) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Elearning</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php
          if (user_info()['foto'] != null) {
            $foto = base_url('uploads/') . user_info()['foto'];
          } else {
            $foto = base_url('assets/images/avatar_default.png');
          }
          ?>
          <img src="<?= $foto ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= user_info()['first_name'] . ' ' . user_info()['last_name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php user_menu() ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>