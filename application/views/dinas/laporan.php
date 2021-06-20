  	<!--**********************************
            Content body start
        ***********************************-->
  	<div class="content-body">
  		<!-- row -->
  		<div class="container-fluid">
  			<div class="form-head d-flex mb-3 align-items-start">
  				<div class="mr-auto d-none d-lg-block">
  					<h2 class="text-black font-w600 mb-0">Laporan Data Pengaduan</h2>
  					<!-- <p class="mb-0">Welcome to Davur Admin!</p> -->
  				</div>
  			</div>


  			<div class="row">
  				<div class="col-12">
  					<div class="card">
  						<div class="card-header">
  							<h4 class="card-title">Laporan Berdasarkan Tanggal</h4>
  						</div>
  						<div class="card-body">
  							<form action="<?= base_url('Admin/laporanbytanggal') ?>" method="POST" target="_blank">
  								<label for=""> Pilih Tanggal Awal</label>
  								<input type="date" name="tanggal_awal" class="form-control" required>
  								<br>
  								<label for=""> Pilih Tanggal Akhir</label>
  								<input type="date" name="tanggal_akhir" class="form-control" required>
  								<br>
  								<button type="submit" class="btn btn-xs btn-info">print</button>
  							</form>
  						</div>
  					</div>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-12">
  					<div class="card">
  						<div class="card-header">
  							<h4 class="card-title">Laporan Berdasarkan Bulan</h4>
  						</div>
  						<div class="card-body">
  							<form action="<?= base_url('Admin/filter_laporan') ?>" method="POST" target="_blank">
  								<label for=""> Pilih Tahun</label>
  								<select class="form-contol" name="tahun1" id="" required>
  									<?php foreach ($tahun as $row) { ?>
  										<option value="<?= $row->tahun; ?>"><?= $row->tahun; ?></option>
  									<?php } ?>
  								</select>
  								<br>
  								<label for=""> Bulan Awal</label>
  								<select class="form-contol" name="bulanawal1" id="" required>
  									<option value="1">Januari</option>
  									<option value="2">Februari</option>
  									<option value="3">Maret</option>
  									<option value="4">April</option>
  									<option value="5">Mei</option>
  									<option value="6">Juni</option>
  									<option value="7">Juli</option>
  									<option value="8">Agustus</option>
  									<option value="9">September</option>
  									<option value="10">Oktober</option>
  									<option value="11">Nobember</option>
  									<option value="12">Desember</option>
  								</select>
  								<br>
  								<label for=""> Bulan Akhir</label>
  								<select class="form-contol" name="bulanakhir" id="" required>
  									<option value="1">Januari</option>
  									<option value="2">Februari</option>
  									<option value="3">Maret</option>
  									<option value="4">April</option>
  									<option value="5">Mei</option>
  									<option value="6">Juni</option>
  									<option value="7">Juli</option>
  									<option value="8">Agustus</option>
  									<option value="9">September</option>
  									<option value="10">Oktober</option>
  									<option value="11">Nobember</option>
  									<option value="12">Desember</option>
  								</select><br>
  								<button type="submit" class="btn btn-xs btn-info">print</button>
  							</form>
  						</div>
  					</div>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-12">
  					<div class="card">
  						<div class="card-header">
  							<h4 class="card-title">Laporan Berdasarkan Tahun</h4>
  						</div>
  						<div class="card-body">
  							<form action="<?= base_url('Admin/laporanbytahun') ?>" method="POST" target="_blank">
  								<label for=""> Pilih Tahun</label>
  								<select class="form-contol" name="tahun2" id="" required>
  									<?php foreach ($tahun as $row) { ?>
  										<option value="<?= $row->tahun; ?>"><?= $row->tahun; ?></option>
  									<?php } ?>
  								</select>
  								<br>
  								<button type="submit" class="btn btn-xs btn-info">print</button>
  							</form>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>


  	</div>
  	<!--**********************************
            Content body end
        ***********************************-->