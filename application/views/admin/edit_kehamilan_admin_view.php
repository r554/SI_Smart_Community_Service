  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Data Kehamilan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/datakehamilan'); ?>">Kehamilan</a></li>
              <li class="breadcrumb-item active"><a href="<?= base_url('admin/datakehamilan'); ?>">Data Masa Kehamilan</a></li>
              <li class="breadcrumb-item active"><?= $data_kehamilan['username'] ?></li>
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
          <div class="col">
            <?= $this->session->flashdata('message'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Riwayat Kehamilan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p class="card-text small text-info">Isi sesuai riwayat anda pada masa kehamilan.</p>

                <form action="<?= base_url('admin/updateRiwayatKehamilan') ?>" method="POST">
                  <input type="hidden" name="id_riwayat_hamil" value="<?= $data_kehamilan['id_riwayat_hamil']; ?>">
                  <input type="hidden" name="id_user" value="<?= $data_kehamilan['id_user']; ?>">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="usia_kehamilan">Usia Kehamilan (minggu)</label>
                        <input type="number" class="form-control" id="usia_kehamilan" placeholder="Usia Kehamilan" name="usia_kehamilan" value="<?= $data_kehamilan['usia_kehamilan']; ?>" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="jarak_persalinan">Jarak Persalinan (tahun)</label>
                        <input type="number" class="form-control" id="jarak_persalinan" placeholder="Jarak Persalinan (th)" name="jarak_persalinan" value="<?= $data_kehamilan['jarak_persalinan']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="riwayat_penyakit_user">Riwayat Penyakit Saat Hamil</label>
                        <input type="text" class="form-control" id="riwayat_penyakit_user" placeholder="Riwayat Penyakit Saat Hami" value="<?= $data_kehamilan['riwayat_penyakit_user']; ?>" name="riwayat_penyakit_user">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="kadar_hb">Kadar HB (gr/dl)</label>
                        <input type="number" step="0.01" class="form-control" id="kadar_hb" placeholder="Kadar HB" name="kadar_hb" value="<?= $data_kehamilan['kadar_hb']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="lila">LILA (cm)</label>
                        <input type="number" class="form-control" id="lila" placeholder="LILA" name="lila" value="<?= $data_kehamilan['lila']; ?>" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="jml_anggota_keluarga">Jumlah Anggota Keluarga</label>
                        <input type="number" class="form-control" id="jml_anggota_keluarga" placeholder="(Suami, Istri, Anak)" name="jml_anggota_keluarga" value="<?= $data_kehamilan['jml_anggota_keluarga']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="tb_suami">Tinggi Badan Suami</label>
                        <input type="number" class="form-control" id="tb_suami" placeholder="Tinggi Badan (cm)" name="tb_suami" value="<?= $data_kehamilan['tb_suami']; ?>" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="bb_suami">Berat Badan Suami</label>
                        <input type="number" class="form-control" id="bb_suami" placeholder="Berat Badan (kg)" name="bb_suami" value="<?= $data_kehamilan['bb_suami']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="tb_istri">Tinggi Badan Istri</label>
                        <input type="number" class="form-control" id="tb_istri" placeholder="Tinggi Badan (cm)" name="tb_istri" value="<?= $data_kehamilan['tb_istri']; ?>" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="bb_istri">Berat Badan Istri</label>
                        <input type="number" class="form-control" id="bb_istri" placeholder="Berat Badan (kg)" name="bb_istri" value="<?= $data_kehamilan['bb_istri']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pendidikan_suami">Pendidikan Suami</label>
                        <select class="form-control select2" id="pendidikan_suami" name="pendidikan_suami" style="width: 100%;" required>
                          <option <?= $data_kehamilan['pendidikan_suami'] == null ? 'selected' : '' ?> selected value="">Pilih jenis pendidikan</option>
                          <option <?= $data_kehamilan['pendidikan_suami'] == 'Tidak/Belum Sekolah' ? 'selected' : '' ?> value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                          <option <?= $data_kehamilan['pendidikan_suami'] == 'Tidak tamat SD/sederajat' ? 'selected' : '' ?> value="Tidak tamat SD/sederajat">Tidak tamat SD/sederajat</option>
                          <option <?= $data_kehamilan['pendidikan_suami'] == 'Tamat SD/sederajat' ? 'selected' : '' ?> value="Tamat SD/sederajat">Tamat SD/sederajat</option>
                          <option <?= $data_kehamilan['pendidikan_suami'] == 'Tamat SMP/sederajat' ? 'selected' : '' ?> value="Tamat SMP/sederajat">Tamat SMP/sederajat</option>
                          <option <?= $data_kehamilan['pendidikan_suami'] == 'Tamat SMA/sederajat' ? 'selected' : '' ?> value="Tamat SMA/sederajat">Tamat SMA/sederajat</option>
                          <option <?= $data_kehamilan['pendidikan_suami'] == 'Tamat Diploma' ? 'selected' : '' ?> value="Tamat Diploma">Tamat Diploma</option>
                          <option <?= $data_kehamilan['pendidikan_suami'] == 'Tamat Universitas' ? 'selected' : '' ?> value="Tamat Universitas">Tamat Universitas</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pendidikan_istri">Pendidikan Istri</label>
                        <select class="form-control select2" id="pendidikan_istri" name="pendidikan_istri" style="width: 100%;" required>
                          <option <?= $data_kehamilan['pendidikan_istri'] == null ? 'selected' : '' ?> selected value="">Pilih jenis pendidikan</option>
                          <option <?= $data_kehamilan['pendidikan_istri'] == 'Tidak/Belum Sekolah' ? 'selected' : '' ?> value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                          <option <?= $data_kehamilan['pendidikan_istri'] == 'Tidak tamat SD/sederajat' ? 'selected' : '' ?> value="Tidak tamat SD/sederajat">Tidak tamat SD/sederajat</option>
                          <option <?= $data_kehamilan['pendidikan_istri'] == 'Tamat SD/sederajat' ? 'selected' : '' ?> value="Tamat SD/sederajat">Tamat SD/sederajat</option>
                          <option <?= $data_kehamilan['pendidikan_istri'] == 'Tamat SMP/sederajat' ? 'selected' : '' ?> value="Tamat SMP/sederajat">Tamat SMP/sederajat</option>
                          <option <?= $data_kehamilan['pendidikan_istri'] == 'Tamat SMA/sederajat' ? 'selected' : '' ?> value="Tamat SMA/sederajat">Tamat SMA/sederajat</option>
                          <option <?= $data_kehamilan['pendidikan_istri'] == 'Tamat Diploma' ? 'selected' : '' ?> value="Tamat Diploma">Tamat Diploma</option>
                          <option <?= $data_kehamilan['pendidikan_istri'] == 'Tamat Universitas' ? 'selected' : '' ?> value="Tamat Universitas">Tamat Universitas</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pekerjaan_suami">Pekerjaan Suami</label>
                        <input type="text" class="form-control" id="pekerjaan_suami" placeholder="Pekerjaan Suami" name="pekerjaan_suami" value="<?= $data_kehamilan['pekerjaan_suami']; ?>" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pekerjaan_istri">Pekerjaan Istri</label>
                        <input type="text" class="form-control" id="pekerjaan_istri" placeholder="Pekerjaan Ibu" name="pekerjaan_istri" value="<?= $data_kehamilan['pekerjaan_istri']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pendapatan_suami">Pendapatan Suami</label>
                        <select class="form-control select2" id="pendapatan_suami" name="pendapatan_suami" style="width: 100%;" required>
                          <option <?= $data_kehamilan['pendapatan_suami'] == null ? 'selected' : ''; ?> value="">Pilih Pendapatan</option>
                          <option <?= $data_kehamilan['pendapatan_suami'] == 'Kurang dari UMR' ? 'selected' : ''; ?> value="Kurang dari UMR">Kurang dari UMR</option>
                          <option <?= $data_kehamilan['pendapatan_suami'] == 'Lebih dari atau sama dengan UMR' ? 'selected' : ''; ?> value="Lebih dari atau sama dengan UMR">Lebih dari atau sama dengan UMR</option>
                        </select>
                        <!-- <input type="number" class="form-control" id="pendapatan_suami" placeholder="Pendapatan Suami" name="pendapatan_suami" value="<?= $data_kehamilan['pendapatan_suami']; ?>" required> -->
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pendapatan_istri">Pendapatan Istri</label>
                        <select class="form-control select2" id="pendapatan_istri" name="pendapatan_istri" style="width: 100%;" required>
                          <option <?= $data_kehamilan['pendapatan_istri'] == null ? 'selected' : ''; ?> value="">Pilih Pendapatan</option>
                          <option <?= $data_kehamilan['pendapatan_istri'] == 'Kurang dari UMR' ? 'selected' : ''; ?> value="Kurang dari UMR">Kurang dari UMR</option>
                          <option <?= $data_kehamilan['pendapatan_istri'] == 'Lebih dari atau sama dengan UMR' ? 'selected' : ''; ?> value="Lebih dari atau sama dengan UMR">Lebih dari atau sama dengan UMR</option>
                        </select>
                        <!-- <input type="number" class="form-control" id="pendapatan_istri" placeholder="Pendapatan Istri" name="pendapatan_istri" value="<?= $data_kehamilan['pendapatan_istri']; ?>" required> -->
                      </div>
                    </div>
                  </div>
                  <input type="submit" name="submit_button" value="UPDATE DATA KEHAMILAN" class="btn btn-success btn-block">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->