  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Tambah user baru</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('admin/pemberitahuan'); ?>">Pemberitahuan</a></li>
                          <li class="breadcrumb-item active">Tambah Pemberitahuan</li>
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
                  <div class="col-md-12">
                      <div class="card card-outline card-info">
                          <div class="card-header">
                              <h3 class="card-title">Form Data Pemberitahuan</h3>
                          </div>
                          <!-- /.card-header -->                          
                          <div class="card-body table-responsive">
                              <?= $this->session->flashdata('message'); ?>
                              <form action="" method="POST" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label for="judul">Judul</label>
                                      <input id="judul" type="judul" name="judul" class="form-control" maxlength="50" placeholder="Judul Laporan" value="<?= $pemberitahuan_edit('judul'); ?>" required>
                                      <?php echo form_error('judul', '<small class="text-danger">', '</small>'); ?>
                                  </div>
                                  <div class="form-group">
                                      <label for="deskripsi">Deskripsi</label>
                                      <textarea id="deskripsi" type="text" name="deskripsi" class="form-control" rows="5" placeholder="Deskripsi laporan" required><?= $pemberitahuan_edit('deskripsi'); ?></textarea>
                                      <?php echo form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                  </div>
                                  <button type="submit" name="tambah_pemberitahuan" value="true" class="btn btn-block btn-primary"><i class="fa fa-save mr-1"></i>Simpan Pemberitahuan</button>
                              </form>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
                  <!-- /.col-md-8 -->                  
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
  </div>