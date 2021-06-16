  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Data Remaja</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dataremaja'); ?>">Remaja</a></li>
              <li class="breadcrumb-item active"><a href="<?= base_url('admin/dataremaja'); ?>">Data Masa Remaja</a></li>
              <li class="breadcrumb-item active"><?= $data_remaja['username'] ?></li>
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
                <h3 class="card-title">Data Riwayat Remaja</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p class="card-text small text-info">Isi sesuai riwayat anda pada saat remaja. (12 - 18 tahun)</p>

                <form action="<?= base_url('admin/updateRiwayatRemaja'); ?>" method="POST">
                  <input type="hidden" name="id_riwayat_remaja" value="<?= $data_remaja['id_riwayat_remaja']; ?>">
                  <input type="hidden" name="id_user" value="<?= $data_remaja['id_user']; ?>">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="tb_user">Tinggi Badan Anda</label>
                        <input type="number" class="form-control" id="tb_user" placeholder="Tinggi Badan (cm)" name="tb_user" value="<?= $data_remaja['tb_user']; ?>" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="bb_user">Berat Badan Anda</label>
                        <input type="number" class="form-control" id="bb_user" placeholder="Berat Badan (kg)" name="bb_user" value="<?= $data_remaja['bb_user']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="riwayat_anemia">Riwayat Anemia</label>
                        <select class="form-control select2" id="riwayat_anemia" name="riwayat_anemia" style="width: 100%;" required>
                          <option <?= $data_remaja['riwayat_anemia'] == null ? 'selected' : '' ?> value="">Pilih riwayat</option>
                          <option <?= $data_remaja['riwayat_anemia'] == 'YA' ? 'selected' : '' ?> value="YA">YA</option>
                          <option <?= $data_remaja['riwayat_anemia'] == 'TIDAK' ? 'selected' : '' ?> value="TIDAK">TIDAK</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="riwayat_penyakit_user">Riwayat Penyakit Anda</label>
                        <input type="text" class="form-control" id="riwayat_penyakit_user" placeholder="Riwayat Penyakit" value="<?= $data_remaja['riwayat_penyakit_user']; ?>" name="riwayat_penyakit_user">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="kadar_hb">Kadar HB (gr/dl)</label>
                        <input type="number" step="0.1" class="form-control" id="kadar_hb" placeholder="Kadar HB dalam (gr/dl)" value="<?= $data_remaja['kadar_hb']; ?>" name="kadar_hb" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="tb_bapak">Tinggi Badan Bapak</label>
                        <input type="number" class="form-control" id="tb_bapak" placeholder="Tinggi Badan (cm)" name="tb_bapak" value="<?= $data_remaja['tb_bapak']; ?>" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="bb_bapak">Berat Badan Bapak</label>
                        <input type="number" class="form-control" id="bb_bapak" placeholder="Berat Badan (kg)" name="bb_bapak" value="<?= $data_remaja['bb_bapak']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="tb_ibu">Tinggi Badan Ibu</label>
                        <input type="number" class="form-control" id="tb_ibu" placeholder="Tinggi Badan (cm)" name="tb_ibu" value="<?= $data_remaja['tb_ibu']; ?>" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="bb_ibu">Berat Badan Ibu</label>
                        <input type="number" class="form-control" id="bb_ibu" placeholder="Berat Badan (kg)" name="bb_ibu" value="<?= $data_remaja['bb_ibu']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="riwayat_penyakit_bapak">Riwayat Penyakit Bapak</label>
                        <input type="text" class="form-control" id="riwayat_penyakit_bapak" placeholder="Riwayat Penyakit" value="<?= $data_remaja['riwayat_penyakit_bapak']; ?>" name="riwayat_penyakit_bapak">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="riwayat_penyakit_ibu">Riwayat Penyakit Ibu</label>
                        <input type="text" class="form-control" id="riwayat_penyakit_ibu" placeholder="Riwayat Penyakit" value="<?= $data_remaja['riwayat_penyakit_ibu']; ?>" name="riwayat_penyakit_ibu">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pendidikan_bapak">Pendidikan bapak</label>
                        <select class="form-control select2" id="pendidikan_bapak" name="pendidikan_bapak" style="width: 100%;" required>
                          <option <?= $data_remaja['pendidikan_bapak'] == null ? 'selected' : '' ?> selected value="">Pilih jenis pendidikan</option>
                          <option <?= $data_remaja['pendidikan_bapak'] == 'Tidak/Belum Sekolah' ? 'selected' : '' ?> value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                          <option <?= $data_remaja['pendidikan_bapak'] == 'Tidak tamat SD/sederajat' ? 'selected' : '' ?> value="Tidak tamat SD/sederajat">Tidak tamat SD/sederajat</option>
                          <option <?= $data_remaja['pendidikan_bapak'] == 'Tamat SD/sederajat' ? 'selected' : '' ?> value="Tamat SD/sederajat">Tamat SD/sederajat</option>
                          <option <?= $data_remaja['pendidikan_bapak'] == 'Tamat SMP/sederajat' ? 'selected' : '' ?> value="Tamat SMP/sederajat">Tamat SMP/sederajat</option>
                          <option <?= $data_remaja['pendidikan_bapak'] == 'Tamat SMA/sederajat' ? 'selected' : '' ?> value="Tamat SMA/sederajat">Tamat SMA/sederajat</option>
                          <option <?= $data_remaja['pendidikan_bapak'] == 'Tamat Diploma' ? 'selected' : '' ?> value="Tamat Diploma">Tamat Diploma</option>
                          <option <?= $data_remaja['pendidikan_bapak'] == 'Tamat Universitas' ? 'selected' : '' ?> value="Tamat Universitas">Tamat Universitas</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pendidikan_ibu">Pendidikan ibu</label>
                        <select class="form-control select2" id="pendidikan_ibu" name="pendidikan_ibu" style="width: 100%;" required>
                          <option <?= $data_remaja['pendidikan_ibu'] == null ? 'selected' : '' ?> selected value="">Pilih jenis pendidikan</option>
                          <option <?= $data_remaja['pendidikan_ibu'] == 'Tidak/Belum Sekolah' ? 'selected' : '' ?> value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                          <option <?= $data_remaja['pendidikan_ibu'] == 'Tidak tamat SD/sederajat' ? 'selected' : '' ?> value="Tidak tamat SD/sederajat">Tidak tamat SD/sederajat</option>
                          <option <?= $data_remaja['pendidikan_ibu'] == 'Tamat SD/sederajat' ? 'selected' : '' ?> value="Tamat SD/sederajat">Tamat SD/sederajat</option>
                          <option <?= $data_remaja['pendidikan_ibu'] == 'Tamat SMP/sederajat' ? 'selected' : '' ?> value="Tamat SMP/sederajat">Tamat SMP/sederajat</option>
                          <option <?= $data_remaja['pendidikan_ibu'] == 'Tamat SMA/sederajat' ? 'selected' : '' ?> value="Tamat SMA/sederajat">Tamat SMA/sederajat</option>
                          <option <?= $data_remaja['pendidikan_ibu'] == 'Tamat Diploma' ? 'selected' : '' ?> value="Tamat Diploma">Tamat Diploma</option>
                          <option <?= $data_remaja['pendidikan_ibu'] == 'Tamat Universitas' ? 'selected' : '' ?> value="Tamat Universitas">Tamat Universitas</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pekerjaan_bapak">Pekerjaan Bapak</label>
                        <input type="text" class="form-control" id="pekerjaan_bapak" placeholder="Pekerjaan Bapak" name="pekerjaan_bapak" value="<?= $data_remaja['pekerjaan_bapak']; ?>" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" value="<?= $data_remaja['pekerjaan_ibu']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pendapatan_bapak">Pendapatan Bapak</label>
                        <select class="form-control select2" id="pendapatan_bapak" name="pendapatan_bapak" style="width: 100%;" required>
                          <option <?= $data_remaja['pendapatan_bapak'] == null ? 'selected' : ''; ?> value="">Pilih Pendapatan</option>
                          <option <?= $data_remaja['pendapatan_bapak'] == 'Kurang dari UMR' ? 'selected' : ''; ?> value="Kurang dari UMR">Kurang dari UMR</option>
                          <option <?= $data_remaja['pendapatan_bapak'] == 'Lebih dari atau sama dengan UMR' ? 'selected' : ''; ?> value="Lebih dari atau sama dengan UMR">Lebih dari atau sama dengan UMR</option>
                        </select>
                        <!-- <input type="number" class="form-control" id="pendapatan_bapak" placeholder="Pendapatan Bapak" name="pendapatan_bapak" value="<?= $data_remaja['pendapatan_bapak']; ?>" required> -->
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pendapatan_ibu">Pendapatan Ibu</label>
                        <select class="form-control select2" id="pendapatan_ibu" name="pendapatan_ibu" style="width: 100%;" required>
                          <option <?= $data_remaja['pendapatan_ibu'] == null ? 'selected' : ''; ?> value="">Pilih Pendapatan</option>
                          <option <?= $data_remaja['pendapatan_ibu'] == 'Kurang dari UMR' ? 'selected' : ''; ?> value="Kurang dari UMR">Kurang dari UMR</option>
                          <option <?= $data_remaja['pendapatan_ibu'] == 'Lebih dari atau sama dengan UMR' ? 'selected' : ''; ?> value="Lebih dari atau sama dengan UMR">Lebih dari atau sama dengan UMR</option>
                        </select>
                        <!-- <input type="number" class="form-control" id="pendapatan_ibu" placeholder="Pendapatan Ibu" name="pendapatan_ibu" value="<?= $data_remaja['pendapatan_ibu']; ?>" required> -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="jml_anggota_keluarga">Jumlah Anggota Keluarga</label>
                        <input type="number" class="form-control" id="jml_anggota_keluarga" placeholder="Jumlah Anggota Keluarga" name="jml_anggota_keluarga" value="<?= $data_remaja['jml_anggota_keluarga']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <input type="submit" name="submit_button" value="UPDATE DATA REMAJA" class="btn btn-success btn-block">
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