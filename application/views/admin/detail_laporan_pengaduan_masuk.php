  	<!--**********************************
            Content body start
        ***********************************-->
  	<div class="content-body">
  		<!-- row -->
  		<div class="container-fluid">
  			<div class="row page-titles mx-0">
  				<div class="col-sm-6 p-md-0">
  					<div class="welcome-text">
  						<h4>Detail Data Pengaduan Masuk</h4>
  						<!-- <p class="mb-0">Your business dashboard template</p> -->
  					</div>
  				</div>
  				<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
  					<ol class="breadcrumb">
  						<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
  						<li class="breadcrumb-item"><a href="javascript:void(0)">Pengaduan</a></li>
  						<li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Pengaduan Masuk</a></li>
  					</ol>
  				</div>
  			</div>

  			<!-- <div class="row">
  	            <div class="col-12">
  	                <div class="card">
  	                    <div class="card-header">
  	                        <h4 class="card-title">Semua Data Pengaduan</h4>
  	                    </div>
  	                    <div class="card-body">
  	                        <div class="table-responsive">
  	                            <table id="example3" class="display" style="min-width: 845px">
  	                                <thead>
  	                                    <tr>
  	                                        <th></th>
  	                                        <th>Judul</th>
  	                                        <th>Pelapor</th>
  	                                        <th>Lokasi TKP</th>
  	                                        <th>Tanggal Pengaduan</th>
  	                                        <th>Keterangan</th>
  	                                        <th>Status</th>
  	                                        <th>Aksi</th>
  	                                    </tr>
  	                                </thead>
  	                                <tbody>
  	                                    <?php
											$no = 1;
											foreach ($all_laporan as $laporan) :
											?>
  	                                        <tr>
  	                                            <td><img class="rounded-circle" width="35" src="<?= base_url() . 'assets/img/' . $laporan['foto']; ?>" alt=""></td>
  	                                            <td><?= $laporan['judul']; ?></td>
  	                                            <td><?= $laporan['username'] == null ? '-' : $laporan['username']; ?></td>
  	                                            <td><?= $laporan['alamat_laporan'] == null ? '-' : $laporan['alamat_laporan']; ?></td>
  	                                            <td><?= date('d M Y', $laporan['laporan_dibuat']); ?></td>
  	                                            <td><?= $laporan['deskripsi']; ?></td>
  	                                            <td>
  	                                                <?php if ($laporan['status'] == '1') { ?>
  	                                                    <span class="badge badge-info">Belum Diproses</span>
  	                                                <?php } elseif ($laporan['status'] == '2') { ?>
  	                                                    <span class="badge badge-warning">Diproses</span>
  	                                                <?php } elseif ($laporan['status'] == '3') { ?>
  	                                                    <span class="badge badge-danger">Dibatalkan</span>
  	                                                <?php } elseif ($laporan['status'] == '4') { ?>
  	                                                    <span class="badge badge-success">Selesai</span>
  	                                                <?php } ?>
  	                                            </td>
  	                                            <td>
  	                                                <div class="d-flex">
  	                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
  	                                                </div>
  	                                            </td>
  	                                        </tr>
  	                                    <?php endforeach; ?>
  	                                </tbody>
  	                            </table>
  	                        </div>
  	                    </div>
  	                </div>
  	            </div>
              </div> -->

  			<div class="row">
  				<div class="col-lg-8">
  					<div class="card">
  						<div class="card-header">
  							<h4 class="card-title">Informasi Pengaduan</h4>
  						</div>
  						<div class="card-body">
  							<div class="basic-form">
  								<form>
  									<div class="form-group row">
  										<label class="col-sm-3 col-form-label">Judul Pengaduan</label>
  										<div class="col-sm-9">
  											<input type="text" class="form-control" value="<?= $detail_laporan['judul']; ?>" readonly>
  										</div>
  									</div>
  									<div class="form-group row">
  										<label class="col-sm-3 col-form-label">Nama Pelapor</label>
  										<div class="col-sm-9">
  											<input type="text" class="form-control" value="<?= $detail_laporan['username']; ?>" readonly>
  										</div>
  									</div>
  									<div class="form-group row">
  										<label class="col-sm-3 col-form-label">Tanggal Pengaduan</label>
  										<div class="col-sm-9">
  											<input type="text" class="form-control" value="<?= $detail_laporan['tanggal']; ?>" readonly>
  										</div>
  									</div>
  									<div class="form-group row">
  										<label class="col-sm-3 col-form-label">Keterangan Pengaduan</label>
  										<div class="col-sm-9">
  											<input type="text" class="form-control" value="<?= $detail_laporan['deskripsi']; ?>" readonly>
  										</div>
  									</div>
  									<div class="form-group row">
  										<label class="col-sm-3 col-form-label">Lokasi Pengaduan</label>
  										<div class="col-sm-9">
  											<input type="text" class="form-control" value="<?= $detail_laporan['alamat']; ?>" readonly>
  										</div>
  									</div>
  									<div class="form-group row">
  										<label class="col-sm-3 col-form-label">latitude</label>
  										<div class="col-sm-9">
  											<input type="text" class="form-control" value="<?= $detail_laporan['lat']; ?>" readonly>
  										</div>
  									</div>
  									<div class="form-group row">
  										<label class="col-sm-3 col-form-label">longitude</label>
  										<div class="col-sm-9">
  											<input type="text" class="form-control" value="<?= $detail_laporan['lng']; ?>" readonly>
  										</div>
  									</div>
  									<div class="form-group row">
  										<div class="col-sm-10 text-center">
  											<?php if ($detail_laporan['status'] == 1) { ?>
  												<a href="<?= base_url('Admin/terima_pengaduan_masuk/') . $detail_laporan['id_laporan'] . '/' . $user['telepon']  ?>"><button type="button" class="btn btn-info btn-md">Validasi Laporan Pada Dinas</button></a>
  												<!-- <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#exampleModalCenter">Validasi Laporan Pada Dinas</button> -->
  												<button type="button" class="btn btn-danger btn-md ml-4" data-toggle="modal" data-target="#TolakPengaduan">Tolak Pengaduan</button>
  												<!-- <a href="<?= base_url('Admin/tolak_pengaduan/') . $detail_laporan['id_laporan'] . '/' . $user['telepon'] ?>"><button type="button" class="btn btn-danger btn-md ml-4" data-toggle="modal" data-target="#exampleModalCenter">Tolak Pengaduan</button></a> -->
  											<?php } ?>
  										</div>
  									</div>
  									<div class="form-group row">
  										<div class="col-sm-10 text-center">
  											<!-- Button trigger modal -->
  											<!-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalCenter">Peringatan</button> -->
  											<!-- Modal -->
  											<div class="modal fade" id="exampleModalCenter">
  												<div class="modal-dialog modal-dialog-centered" role="document">
  													<div class="modal-content">
  														<div class="modal-header">
  															<h5 class="modal-title">Perhatian</h5>
  															<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
  															</button>
  														</div>
  														<div class="modal-body">
  															<p>Pastikan Anda Sudah Memvalidasi Laporan Pengaduan Sebelum Meneruskan Pada Dinas.</p>
  														</div>
  														<div class="modal-footer">
  															<button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
  															<a href="<?= base_url('Admin/terima_pengaduan/') . $detail_laporan['id_laporan'] . '/' . $user['telepon']  ?>"><button type="button" class="btn btn-primary">Lanjutkan</button></a>
  														</div>
  													</div>
  												</div>
  											</div>
  										</div>
  										<div class="col-sm-10 text-center">
  											<!-- Button trigger modal -->
  											<!-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalCenter">Peringatan</button> -->
  											<!-- Modal -->
  											<div class="modal fade" id="TolakPengaduan">
  												<div class="modal-dialog modal-dialog-centered" role="document">
  													<div class="modal-content">
  														<div class="modal-header">
  															<h5 class="modal-title">Perhatian</h5>
  															<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
  															</button>
  														</div>
  														<div class="modal-body">
  															<p>Pastikan Anda Sudah Memvalidasi Laporan Pengaduan Sebelum Pengaduan Dibatalkan.</p>
  														</div>
  														<div class="modal-footer">
  															<button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
  															<a href="<?= base_url('Admin/tolak_pengaduan/') . $detail_laporan['id_laporan'] . '/' . $user['telepon'] ?>"><button type="button" class="btn btn-primary">Lanjutkan</button></a>
  														</div>
  													</div>
  												</div>
  											</div>
  										</div>
  									</div>
  								</form>
  							</div>
  						</div>
  					</div>
  				</div>
  				<div class="col-lg-4">
  					<img src="<?= base_url() . 'assets/img/' . $detail_laporan['foto']; ?>" alt="" class="img-fluid">
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-lg-12 text-center">
  					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15797.715304619995!2d113.72005644072267!3d-8.159477099999993!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf6c4437632474338!2sState%20Polytechnic%20of%20Jember!5e0!3m2!1sen!2sid!4v1623865800130!5m2!1sen!2sid" width="1200" height="800" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  				</div>
  			</div>

  		</div>
  		<!--**********************************
            Content body end
        ***********************************-->