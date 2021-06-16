  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Tambah laporan baru</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('admin/laporan'); ?>">Laporan</a></li>
                          <li class="breadcrumb-item active">Tambah User</li>
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
                  <div class="col-md-8">
                      <div class="card card-outline card-info">
                          <div class="card-header">
                              <h3 class="card-title">Form Data Laporan</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive">
                              <?= $this->session->flashdata('message'); ?>
                              <form action="" method="POST" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="col-12">
                                          <div class="form-group">
                                              <label for="judul">Judul Laporan</label>
                                              <input id="judul" type="text" class="form-control" maxlength="200" placeholder="Judul Laporan" name="judul" value="<?= set_value('judul'); ?>" required>
                                              <?php echo form_error('judul', '<small class="text-danger">', '</small>'); ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="deskripsi">Deskripsi Laporan</label>
                                              <textarea id="deskripsi" type="text" class="form-control" maxlength="200" rows="5" placeholder="Deskripsi Laporan" name="deskripsi" required><?= set_value('deskripsi'); ?></textarea>
                                              <?php echo form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="alamat">Alamat Laporan</label>
                                              <input id="alamat" type="text" class="form-control" placeholder="Alamat Laporan" name="alamat" value="<?= set_value('alamat'); ?>" required>
                                              <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                          </div>
                                      </div>
                                  </div>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
                  <!-- /.col-md-8 -->
                  <div class="col-md-4">
                      <div class="card card-outline card-info">
                          <div class="card-header">
                              <h3 class="card-title">User Detail</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive">
                              <div class="form-group">
                                  <label for="tanggal">Tanggal Laporan</label>
                                  <input id="tanggal" type="date" class="form-control" placeholder="Tanggal Laporan" name="tanggal" value="<?= set_value('tanggal'); ?>" required>
                                  <?php echo form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                  <label for="lat">Latitude</label>
                                  <input id="lat" name="lat" type="number" class="form-control" minlength="6" step="any" placeholder="Latitude" value="<?= set_value('lat'); ?>" required>
                                  <?php echo form_error('lat', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                  <label for="lng">Longitude</label>
                                  <input id="lng" name="lng" type="number" class="form-control" minlength="6" step="any" placeholder="Longitude" value="<?= set_value('lng'); ?>" required>
                                  <?php echo form_error('lng', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                  <label for="foto">Foto</label>
                                  <!-- <small class="text-danger">Kosongi jika tidak ingin menambah foto</small> -->
                                  <div class="input-group">
                                      <div class="custom-file">
                                          <input type="file" name="foto" class="custom-file-input" id="foto" accept="image/*" required>
                                          <label class="custom-file-label" for="foto">Pilih Foto</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col">
                                      <button type="submit" name="tambah_user" value="true" class="btn btn-block btn-primary"><i class="fa fa-plus mr-1"></i>Tambah Laporan</button>
                                  </div>
                              </div>
                          </div>
                          </form>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
                  <!-- /.col-md-4 -->
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
  </div>