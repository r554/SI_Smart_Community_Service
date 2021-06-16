  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Data Bayi Balita</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/databayibalita'); ?>">Remaja</a></li>
              <li class="breadcrumb-item active"><a href="<?= base_url('admin/databayibalita'); ?>">Data Masa Remaja</a></li>
              <li class="breadcrumb-item active"><?= $data_bayi_balita['username'] ?></li>
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
                <h3 class="card-title">Data Riwayat Bayi Balita</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="<?= base_url('admin/updateBayiBalita'); ?>" method="POST">
                  <input type="hidden" name="id_bayi_balita" value="<?= $data_bayi_balita['id_bayi_balita']; ?>">
                  <input type="hidden" name="id_user" value="<?= $data_bayi_balita['id_user']; ?>">
                  <div class="row">
                    <div class="col-12">
                      <p class="card-text small text-info">Isi sesuai data bayi/balita anda.</p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label for="usia_bayi">Usia bayi saat ini (bulan)</label>
                                <input type="number" class="form-control" id="usia_bayi" placeholder="Usia bayi saat ini (bulan)" name="usia_bayi" value="<?= $data_bayi_balita['usia_bayi']; ?>" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="jenis_kelamin">Jenis kelamin</label>
                                <select class="form-control select2" id="jenis_kelamin" name="jenis_kelamin" style="width: 100%;" required>
                                  <option <?= $data_bayi_balita['jenis_kelamin'] == null ? 'selected' : ''; ?> value="">Pilih Jenis Kelamin</option>
                                  <option <?= $data_bayi_balita['jenis_kelamin'] == 'Laki - laki' ? 'selected' : ''; ?> value="Laki - laki">Laki - laki</option>
                                  <option <?= $data_bayi_balita['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?> value="Perempuan">Perempuan</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label for="bb_bayi">Berat bayi saat ini (gr)</label>
                                <input type="number" step="0.1" class="form-control" id="bb_bayi" placeholder="Berat bayi saat ini (gr)" name="bb_bayi" value="<?= $data_bayi_balita['bb_bayi']; ?>" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="tb_bayi">Tinggi bayi saat ini (cm)</label>
                                <input type="number" step="0.1" class="form-control" id="tb_bayi" placeholder="Tinggi bayi saat ini (cm)" name="tb_bayi" value="<?= $data_bayi_balita['tb_bayi']; ?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label for="tb_ayah">Tinggi ayah</label>
                                <input type="number" class="form-control" id="tb_ayah" placeholder="Tinggi ayah (cm)" name="tb_ayah" value="<?= $data_bayi_balita['tb_ayah']; ?>" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="tb_ibu">Tinggi ibu</label>
                                <input type="number" class="form-control" id="tb_ibu" placeholder="Tinggi ibu (cm)" name="tb_ibu" value="<?= $data_bayi_balita['tb_ibu']; ?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label for="bb_bayi_lahir">Berat bayi saat lahir (gr)</label>
                                <input type="number" step="0.1" class="form-control" id="bb_bayi_lahir" placeholder="Berat bayi saat lahir (gr)" name="bb_bayi_lahir" value="<?= $data_bayi_balita['bb_bayi_lahir']; ?>" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="tb_bayi_lahir">Tinggi bayi saat lahir (cm)</label>
                                <input type="number" step="0.1" class="form-control" id="tb_bayi_lahir" placeholder="Tinggi bayi saat lahir (cm)" name="tb_bayi_lahir" value="<?= $data_bayi_balita['tb_bayi_lahir']; ?>" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label for="penyakit_penyerta">Penyakit penyerta</label>
                                <select class="form-control select2" id="penyakit_penyerta" name="penyakit_penyerta" style="width: 100%;" required>
                                  <option <?= $data_bayi_balita['penyakit_penyerta'] == null ? 'selected' : ''; ?> value="">Pilih penyakit</option>
                                  <option <?= $data_bayi_balita['penyakit_penyerta'] == 'Tidak ada' ? 'selected' : ''; ?> value="Tidak ada">Tidak ada</option>
                                  <option <?= $data_bayi_balita['penyakit_penyerta'] == 'Gangguan perkembangan otak' ? 'selected' : ''; ?> value="Gangguan perkembangan otak">Gangguan perkembangan otak</option>
                                  <option <?= $data_bayi_balita['penyakit_penyerta'] == 'Hidrosepalus' ? 'selected' : ''; ?> value="Hidrosepalus">Hidrosepalus</option>
                                  <option <?= $data_bayi_balita['penyakit_penyerta'] == 'Cacat Bawaan' ? 'selected' : ''; ?> value="Cacat Bawaan">Cacat Bawaan</option>
                                  <?php
                                  $penyakit = $data_bayi_balita['penyakit_penyerta'];
                                  if (
                                    $penyakit != 'Tidak ada'
                                    && $penyakit != 'Gangguan perkembangan otak'
                                    && $penyakit != 'Hidrosepalus'
                                    && $penyakit != 'Cacat Bawaan'
                                  ) : ?>
                                    <option selected value="Lainnya">Lainnya</option>

                                  <?php else : ?>
                                    <option <?= $data_bayi_balita['penyakit_penyerta'] == 'Lainnya' ? 'selected' : ''; ?> value="Lainnya">Lainnya</option>
                                  <?php endif; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="penyakit_penyerta_lainnya">Penyakit penyerta lainnya</label>
                                <input disabled type="text" class="form-control" id="penyakit_penyerta_lainnya" placeholder="Penyakit penyerta lainnya (jika ada)" name="penyakit_penyerta_lainnya" value="<?= $data_bayi_balita['penyakit_penyerta']; ?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label for="riwayat_penyakit">Riwayat Penyakit</label>
                                <select class="form-control select2" id="riwayat_penyakit" name="riwayat_penyakit" style="width: 100%;" required>
                                  <option <?= $data_bayi_balita['riwayat_penyakit'] == null ? 'selected' : ''; ?> value="">Pilih penyakit</option>
                                  <option <?= $data_bayi_balita['riwayat_penyakit'] == 'Tidak ada' ? 'selected' : ''; ?> value="Tidak ada">Tidak ada</option>
                                  <option <?= $data_bayi_balita['riwayat_penyakit'] == 'ISPA' ? 'selected' : ''; ?> value="ISPA">ISPA</option>
                                  <option <?= $data_bayi_balita['riwayat_penyakit'] == 'Diare' ? 'selected' : ''; ?> value="Diare">Diare</option>
                                  <option <?= $data_bayi_balita['riwayat_penyakit'] == 'Cacingan' ? 'selected' : ''; ?> value="Cacingan">Cacingan</option>
                                  <?php
                                  $penyakit = $data_bayi_balita['riwayat_penyakit'];
                                  if (
                                    $penyakit != 'Tidak ada'
                                    && $penyakit != 'Gangguan perkembangan otak'
                                    && $penyakit != 'Hidrosepalus'
                                    && $penyakit != 'Cacat Bawaan'
                                  ) : ?>
                                    <option selected value="Lainnya">Lainnya</option>

                                  <?php else : ?>                                    
                                    <option <?= $data_bayi_balita['riwayat_penyakit'] == 'Lainnya' ? 'selected' : ''; ?> value="Lainnya">Lainnya</option>
                                  <?php endif; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="riwayat_penyakit_lainnya">Riwayat penyakit lainnya</label>
                                <input disabled type="text" class="form-control" id="riwayat_penyakit_lainnya" placeholder="Riwayat penyakit lainnya (jika ada)" name="riwayat_penyakit_lainnya" value="<?= $data_bayi_balita['riwayat_penyakit']; ?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label for="usia_kandungan_lahir">Usia kandungan saat lahir</label>
                                <input type="number" class="form-control" id="usia_kandungan_lahir" placeholder="Usia kandungan saat lahir (minggu)" name="usia_kandungan_lahir" value="<?= $data_bayi_balita['usia_kandungan_lahir']; ?>" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="mp_asi">MP ASI</label>
                                <select class="form-control select2" id="mp_asi" name="mp_asi" style="width: 100%;" required>
                                  <option <?= $data_bayi_balita['mp_asi'] == null ? 'selected' : ''; ?> value="">Pilih jenis MP ASI</option>
                                  <option <?= $data_bayi_balita['mp_asi'] == '4 Bintang (nasi, lauk, sayur, buah)' ? 'selected' : ''; ?> value="4 Bintang (nasi, lauk, sayur, buah)">4 Bintang (nasi, lauk, sayur, buah)</option>
                                  <option <?= $data_bayi_balita['mp_asi'] == 'nasi+lauk / nasi+sayur / buah saja' ? 'selected' : ''; ?> value="nasi+lauk / nasi+sayur / buah saja">nasi+lauk / nasi+sayur / buah saja</option>
                                  <option <?= $data_bayi_balita['mp_asi'] == 'Biskuit instan / Bubur instan' ? 'selected' : ''; ?> value="Biskuit instan / Bubur instan">Biskuit instan / Bubur instan</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label for="asi_eksklusif">ASI Eksklusif</label>
                                <select class="form-control select2" id="asi_eksklusif" name="asi_eksklusif" style="width: 100%;" required>
                                  <option <?= $data_bayi_balita['asi_eksklusif'] == null ? 'selected' : ''; ?> value="">Pilih jenis ASI</option>
                                  <option <?= $data_bayi_balita['asi_eksklusif'] == 'YA' ? 'selected' : ''; ?> value="YA">YA</option>
                                  <option <?= $data_bayi_balita['asi_eksklusif'] == 'TIDAK' ? 'selected' : ''; ?> value="TIDAK">TIDAK</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="lama_asi">Lama Pemberian ASI</label>
                                <input disabled type="number" class="form-control" id="lama_asi" placeholder="Lama Pemberian ASI (bulan)" name="lama_asi" value="<?= $data_bayi_balita['lama_asi']; ?>" required>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="submit" name="submit_button" value="UPDATE DATA BAYI BALITA" class="btn btn-block btn-success">
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