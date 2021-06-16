  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#l" class="brand-link text-center">
      <!-- <img src="<?= base_url('assets/adminlte/'); ?>dist/img/AdminLTELogo.png" alt="STEP-A Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-bold">STEP-A</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-row align-items-center">
        <div class="image">
          <img src="<?= base_url('assets/images/users/') . $user['image']; ?>" class="img-circle elevation-2" alt="<?= $user['username']; ?>">
        </div>
        <div class="info">
          <a href="<?= base_url('user/profil'); ?>" class="d-block"><?= $user['username']; ?></a>
          <span class="right badge badge-success">USER</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- menu dashboard -->
          <li class="nav-item">
            <a href="<?= base_url('user'); ?>" class="nav-link <?= $menu == 'dasbor' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dasbor
              </p>
            </a>
          </li>

          <!-- menu menuju website -->
          <li class="nav-item">
            <a target="_blank" href="<?= base_url(''); ?>" class="nav-link">
              <i class="nav-icon fas fa-globe-asia"></i>
              <p>
                Halaman Utama
              </p>
            </a>
          </li>

          <!-- menu data -->
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?= $menu == 'data' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Data Utama
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Masa Remaja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat dan Solusi</p>
                </a>
              </li>
            </ul>
          </li> -->

          <!-- menu data -->
          <!-- <li class="nav-item has-treeview <?= $menu == 'data' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $menu == 'data' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-database fa-fw"></i>
              <p>
                Data Utama
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('user/dataremaja'); ?>" class="nav-link <?= $sub_menu == 'riwayat_remaja' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Remaja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('user/datakehamilan'); ?>" class="nav-link <?= $sub_menu == 'riwayat_kehamilan' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Kehamilan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('user/databayibalita'); ?>" class="nav-link <?= $sub_menu == 'riwayat_bayi_balita' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bayi & Balita</p>
                </a>
              </li>
            </ul>
          </li> -->

          <!-- menu Remaja -->
          <li class="nav-item has-treeview <?= $menu == 'remaja' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'remaja' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-user fa-fw"></i>
                <p>
                  Remaja
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('user/tambahdataremaja'); ?>" class="nav-link <?= $sub_menu == 'tambah_remaja' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah Riwayat Remaja</p>
                  </a>
                </li>                
                <li class="nav-item">
                  <a href="<?= base_url('user/dataremaja'); ?>" class="nav-link <?= $sub_menu == 'semua_remaja' || $sub_menu == 'edit_remaja' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Riwayat Remaja</p>
                  </a>
                </li>                
              </ul>
            </li>

            <!-- menu kehamilan -->
            <li class="nav-item has-treeview <?= $menu == 'kehamilan' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'kehamilan' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-heart fa-fw"></i>
                <p>
                  Kehamilan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('user/tambahdatakehamilan'); ?>" class="nav-link <?= $sub_menu == 'tambah_kehamilan' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah Riwayat Kehamilan</p>
                  </a>
                </li>                
                <li class="nav-item">
                  <a href="<?= base_url('user/datakehamilan'); ?>" class="nav-link <?= $sub_menu == 'semua_kehamilan' || $sub_menu == 'edit_kehamilan' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Riwayat Kehamilan</p>
                  </a>
                </li>                
              </ul>
            </li>

            <!-- menu bayi balita -->
            <li class="nav-item has-treeview <?= $menu == 'bayi_balita' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'bayi_balita' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-child fa-fw"></i>
                <p>
                  Bayi Balita
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('user/tambahbayibalita'); ?>" class="nav-link <?= $sub_menu == 'tambah_bayi_balita' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah Bayi Balita</p>
                  </a>
                </li>                                
                <li class="nav-item">
                  <a href="<?= base_url('user/databayibalita'); ?>" class="nav-link <?= $sub_menu == 'semua_bayi_balita' || $sub_menu == 'edit_bayi_balita' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Bayi Balita</p>
                  </a>
                </li>                                
              </ul>
            </li>

          <!-- menu Remaja -->
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user fa-fw"></i>
              <p>
                Remaja
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Masa Remaja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat dan Solusi</p>
                </a>
              </li>
            </ul>
          </li> -->

          <!-- menu kehamilan -->
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-heart fa-fw"></i>
              <p>
                Kehamilan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Masa Kehamilan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat dan Solusi</p>
                </a>
              </li>
            </ul>
          </li> -->

          <!-- menu bayi balita -->
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-child fa-fw"></i>
              <p>
                Bayi Balita
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bayi (0 - 6 bln)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bayi (6 - 12 bln)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Balita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat dan Solusi</p>
                </a>
              </li>
            </ul>
          </li> -->

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
                <a href="<?= base_url('user/profil'); ?>" class="nav-link <?= $sub_menu == 'profil' ? 'active' : '' ?>">
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