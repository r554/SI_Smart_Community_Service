  	<!--**********************************
            Content body start
        ***********************************-->
  	<div class="content-body">
  		<!-- row -->
  		<div class="container-fluid">
  			<div class="form-head d-flex mb-3 align-items-start">
  				<div class="mr-auto d-none d-lg-block">
  					<h2 class="text-black font-w600 mb-0">Data Pengaduan</h2>
  					<!-- <p class="mb-0">Welcome to Davur Admin!</p> -->
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-12">
  					<div class="card">
  						<div class="card-header">
  							<h4 class="card-title">Laporan Pengaduan Dibatalkan</h4>
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
  												<td><span class="badge badge-danger">Dibatalkan</span></td>
  												<td>
  													<div class="d-flex">
  														<a href="<?= base_url('Admin/detail_pengaduan_dibatalkan/' . $laporan['id_laporan']) ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
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
  			</div>
  		</div>
  		<!--**********************************
            Content body end
        ***********************************-->