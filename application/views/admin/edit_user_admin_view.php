  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Edit User</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('admin/users'); ?>">Users</a></li>
                          <li class="breadcrumb-item active"><?= $user_edit['username']; ?></li>
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
                              <h3 class="card-title">Form Data User</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive">
                              <?= $this->session->flashdata('message'); ?>
                              <form action="" method="POST" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label for="username">Nama</label>
                                              <input id="username" type="text" class="form-control" maxlength="50" placeholder="Nama Lengkap" name="username" value="<?= $user_edit['username']; ?>" required>
                                              <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label for="nik">NIK</label>
                                              <input id="nik" type="number" class="form-control" maxlength="50" placeholder="Nama Lengkap" name="nik" value="<?= $user_edit['nik']; ?>" required>
                                              <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label for="telepon">Telepon</label>
                                              <input id="telepon" type="tel" name="telepon" class="form-control" maxlength="15" placeholder="Nomor Telepon" value="<?= $user_edit['telepon']; ?>" required>
                                              <?php echo form_error('telepon', '<small class="text-danger">', '</small>'); ?>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label for="jenis_kelamin">Jenis Kelamin</label>
                                              <select class="form-control select2" name="jenis_kelamin" id="jenis_kelamin" style="width: 100%;" required>
                                                  <option <?= $user_edit['jenis_kelamin'] == null ? 'selected' : '' ?> value="">Pilih Jenis</option>
                                                  <option <?= $user_edit['jenis_kelamin'] == 'Pria' ? 'selected' : '' ?> value="Pria">Pria</option>
                                                  <option <?= $user_edit['jenis_kelamin'] == 'Wanita' ? 'selected' : '' ?> value="Wanita">Wanita</option>
                                              </select>
                                              <?php echo form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="email">Email</label>
                                      <input id="email" type="email" name="email" class="form-control" maxlength="50" placeholder="Email" value="<?= $user_edit['email']; ?>" required>
                                      <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                  </div>
                                  <div class="form-group">
                                      <label for="alamat">Alamat</label>
                                      <input id="alamat" type="text" name="alamat" class="form-control" maxlength="50" placeholder="Alamat Saat Ini" value="<?= $user_edit['alamat']; ?>" required>
                                      <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
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
                                  <label for="level">Hak akses</label>
                                  <select class="form-control select2" name="level" id="level" style="width: 100%;" required>
                                      <option <?= $user_edit['level'] == null ? 'selected' : '' ?> value="">Pilih Hak Akses</option>
                                      <option <?= $user_edit['level'] == '1' ? 'selected' : '' ?> value="1">ADMIN</option>
                                      <option <?= $user_edit['level'] == '2' ? 'selected' : '' ?> value="2">USER</option>
                                  </select>
                                  <?php echo form_error('level', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                  <label for="password">Password</label>
                                  <small class="text-danger">Kosongi jika tidak ingin merubah password</small>
                                  <input id="password" name="password" type="password" class="form-control" minlength="6" maxlength="50" placeholder="Password">
                                  <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                  <label for="foto">Foto Profil</label>
                                  <small class="text-danger">Kosongi jika tidak ingin menambah foto</small>
                                  <div class="input-group">
                                      <div class="custom-file">
                                          <input type="file" name="foto" class="custom-file-input" id="foto" accept="image/*">
                                          <label class="custom-file-label" for="foto">Pilih Foto Profil</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col">
                                      <button type="submit" name="tambah_user" value="true" class="btn btn-block btn-primary"><i class="fa fa-save mr-1"></i>Simpan User</button>
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