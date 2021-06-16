  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#l" class="brand-link text-center">
      <!-- <img src="<?= base_url('assets/adminlte/'); ?>dist/img/AdminLTELogo.png" alt="STEP-A Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-bold">PELAPORAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-row align-items-center">
        <div class="image">
          <img src="<?= base_url('assets/img/') . $user['foto']; ?>" style="width: 40px; height: 40px;" class="img-circle elevation-2" alt="<?= $user['username']; ?>">
        </div>
        <div class="info">
          <a href="<?= base_url('admin/profil') ?>" class="d-block"><?= $user['username']; ?></a>
          <span class="right badge badge-primary">ADMIN</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- menu dashboard -->
          <?php if ($menu == 'dasbor') : ?>
            <li class="nav-item">
              <a href="<?= base_url('admin'); ?>" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dasbor
                </p>
              </a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a href="<?= base_url('admin'); ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dasbor
                </p>
              </a>
            </li>
          <?php endif; ?>          

          <!-- menu pengguna -->
          <li class="nav-item has-treeview <?= $menu == 'pengguna' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $menu == 'pengguna' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Pengguna
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/tambahUser'); ?>" class="nav-link <?= $sub_menu == 'tambah_pengguna' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/users'); ?>" class="nav-link <?= $sub_menu == 'semua_pengguna' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Pengguna</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- menu laporan -->
          <li class="nav-item has-treeview <?= $menu == 'laporan' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $menu == 'laporan' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-book fa-fw"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/tambahlaporan'); ?>" class="nav-link <?= $sub_menu == 'tambah_laporan' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Laporan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/laporan'); ?>" class="nav-link <?= $sub_menu == 'semua_laporan' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Laporan</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- menu pemberitahuan -->
          <li class="nav-item has-treeview <?= $menu == 'pemberitahuan' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $menu == 'pemberitahuan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-bell fa-fw"></i>
              <p>
                Pemberitahuan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/tambahpemberitahuan'); ?>" class="nav-link <?= $sub_menu == 'tambah_pemberitahuan' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Pemberitahuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/pemberitahuan'); ?>" class="nav-link <?= $sub_menu == 'semua_pemberitahuan' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Pemberitahuan</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- menu pengaturan -->
          <li class="nav-item has-treeview <?= $menu == 'pengaturan' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $menu == 'pengaturan' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-cog fa-fw"></i>
              <p>
                Pengaturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/profil'); ?>" class="nav-link <?= $sub_menu == 'profil' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil</p>
                </a>
              </li>                            
              <li class="nav-item">
                <a href="<?= base_url('logout'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>