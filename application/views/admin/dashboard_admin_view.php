  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dasbor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Dasbor</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $count_laporan; ?></h3>

                <p>Total Laporan</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="<?= base_url('admin/laporan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $count_pemberitahuan; ?></h3>

                <p>Total Pemberitahuan</p>
              </div>
              <div class="icon">
                <i class="fas fa-bell"></i>
              </div>
              <a href="<?= base_url('admin/pemberitahuan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $count_admin; ?></h3>

                <p>Total Admin</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="<?= base_url('admin/users/admin'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $count_user; ?></h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-alt"></i>
              </div>
              <a href="<?= base_url('admin/users/user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-8">
            <!-- baris baru -->
            <div class="row">
              <div class="col-md-6">
                <!-- card new users -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">

                      <?php foreach ($all_user as $row) : ?>
                        <li>
                          <img src="<?= base_url() . 'assets/img/' . $row['foto']; ?>" style="height: 60px; width: 60px;"  alt="User Image">
                          <a class="users-list-name" href="<?= base_url('admin/userprofile/') . $row['id_user']; ?>"><?= $row['username'] ?></a>
                          <span class="users-list-date"><?= date('d M Y', $row['dibuat_pada']); ?></span>
                        </li>
                      <?php endforeach; ?>

                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="<?= base_url('admin/users'); ?>">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>

              <div class="col-md-6">
                <!-- recent comment -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Recent Laporan</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                      <?php foreach ($all_laporan as $laporan) : ?>
                        <li class="item">
                          <div class="product-img">
                            <img src="<?= base_url('assets/img/') . $laporan['foto_laporan']; ?>" alt="<?= $laporan['judul']; ?>" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="<?= base_url('admin/editlaporan/') . $laporan['id_laporan']; ?>" target="_blank" class="product-title"><?= $laporan['judul']; ?>
                              <!-- <span class="badge badge-warning float-right"><i class="fa fa-eye mr-1" aria-hidden="true"></i><?= $laporan['views']; ?></span></a> -->
                              <span class="product-description">
                                <small><?= date('d M Y H:i:s', $laporan['laporan_dibuat']) . ' oleh: ' . $laporan['username']; ?></small>
                              </span>
                          </div>
                        </li>
                        <!-- /.item -->
                      <?php endforeach; ?>
                    </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="<?= base_url('admin/laporan'); ?>" class="uppercase">View All Laporan</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-md-4">
            <!-- recent login -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recent Login</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">

                  <?php foreach ($login_history as $row) : ?>
                    <li class="item">
                      <div class="product-img">
                        <img src="<?= base_url() . 'assets/img/' . $row->foto; ?>" alt="Product Image" class="img-size-50">
                      </div>
                      <div class="product-info">
                        <a href="<?= base_url('admin/userprofile/') . $row->id_user; ?>" class="product-title"><?= $row->username; ?>
                          <span class="badge <?= $row->level == 1 ? 'badge-primary' : 'badge-success' ?> float-right">
                            <?php
                            if ($row->level == 1) {
                              echo 'ADMIN';
                            } else {
                              echo 'USER';
                            }
                            ?>
                          </span></a>
                        <span class="product-description">
                          <small><?= $row->login_time; ?></small>
                          <!-- <small class="text-info"><?= 'on ' . $row->os ?></small> -->
                        </span>
                      </div>
                    </li>
                    <!-- /.item -->
                  <?php endforeach; ?>

                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="<?= base_url('admin/users'); ?>" class="uppercase">View All Users</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->