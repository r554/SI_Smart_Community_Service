  	<!--**********************************
            Content body start
        ***********************************-->
  	<div class="content-body">
  		<!-- row -->
  		<div class="container-fluid">
  			<div class="form-head d-flex mb-3 align-items-start">
  				<div class="mr-auto d-none d-lg-block">
  					<h2 class="text-black font-w600 mb-0">Pengaturan Profil</h2>
  					<!-- <p class="mb-0">Welcome to Davur Admin!</p> -->
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-md-4">
  					<!-- Widget: user widget style 1 -->
  					<div class="card">
  						<!-- Add the bg color to the header using any of the bg-* classes -->
  						<div class="card-header">
  							<h3 class="widget-user-username text-right"><?= $user['username']; ?></h3>
  							<h5 class="widget-user-desc text-right"><?= $user['level'] == 1 ? 'Admin' : 'User' ?></h5>
  						</div>
  						<div class="card-body">
  							<div class="text-center">
  								<img class="img-circle" style="width: 90px; height: 90px" src="<?= base_url('assets/img/') . $user['foto']; ?>" alt="User Avatar">
  							</div>
  							<br>
  							<br>

  							<div class="row">
  								<div class="col-sm-4 border-right">
  									<div class="description-block">
  										<h5 class="description-header">Level</h5>
  										<span class="description-text"><?= $user['level'] == 1 ? 'ADMIN' : 'USER'; ?></span>
  									</div>
  									<!-- /.description-block -->
  								</div>
  								<!-- /.col -->
  								<div class="col-sm-4 border-right">
  									<div class="description-block">
  										<h5 class="description-header">NIK</h5>
  										<span class="description-text"><?= $user['nik'] == null ? '-' : $user['nik']; ?></span>
  									</div>
  									<!-- /.description-block -->
  								</div>
  								<!-- /.col -->
  								<div class="col-sm-4">
  									<div class="description-block">
  										<h5 class="description-header">JK</h5>
  										<span class="description-text"><?= $user['jenis_kelamin'] != null ? $user['jenis_kelamin'] : '-'; ?></span>
  									</div>
  									<!-- /.description-block -->
  								</div>
  								<!-- /.col -->
  							</div>
  						</div>
  						<div class="card-footer">

  							<!-- /.row -->
  						</div>
  					</div>
  					<!-- /.widget-user -->
  				</div>
  				<!-- /.col-md-4 -->
  				<div class="col-md-8">
  					<div class="card card-primary card-outline card-outline-tabs">
  						<div class="card-header p-0 border-bottom-0">
  							<ul class="nav nav-tabs" id="tab-modal" role="tablist">
  								<li class="nav-item">
  									<a class="nav-link active" id="tab-edit-info-website" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Profile</a>
  								</li>
  								<li class="nav-item">
  									<a class="nav-link" id="tab-edit-contact" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Password</a>
  								</li>
  							</ul>
  						</div>
  						<div class="card-body">
  							<div class="tab-content" id="tab-modal">
  								<div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="tab-edit-info-website">
  									<div class="row">
  										<div class="col">
  											<?= $this->session->flashdata('message'); ?>
  										</div>
  									</div>
  									<dl class="row">
  										<dt class="col-sm-4">Last Update</dt>
  										<dd class="col-sm-8"><?= $user['diubah_pada'] == null ? '- (Belum Pernah Diupdate)' : date('d M Y', $user['diubah_pada']); ?></dd>
  										<dt class="col-sm-4">Nama</dt>
  										<dd class="col-sm-8"><?= $user['username'] == null ? '- (Lebih baik Dilengkapi)' : $user['username']; ?></dd>
  										<dt class="col-sm-4">NIK</dt>
  										<dd class="col-sm-8"><?= $user['nik'] == null ? '- (Lebih baik Dilengkapi)' : $user['nik']; ?></dd>
  										<dt class="col-sm-4">Jenis Kelamin</dt>
  										<dd class="col-sm-8"><?= $user['jenis_kelamin'] == null ? '- (Lebih baik Dilengkapi)' : $user['jenis_kelamin']; ?></dd>
  										<dt class="col-sm-4">Alamat</dt>
  										<dd class="col-sm-8"><?= $user['alamat'] == null ? '- (Lebih baik Dilengkapi)' : $user['alamat']; ?></dd>
  										<dt class="col-sm-4">Email</dt>
  										<dd class="col-sm-8"><?= $user['email'] == null ? '- (Lebih baik Dilengkapi)' : $user['email']; ?></dd>
  										<dt class="col-sm-4">Telepon</dt>
  										<dd class="col-sm-8"><?= $user['telepon'] == null ? '- (Lebih baik Dilengkapi)' : $user['telepon']; ?></dd>
  									</dl>
  									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Edit & Lengkapi Profil</button>
  								</div>
  								<div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="tab-edit-contact">
  									<form role="form" action="" method="POST">
  										<div class="form-group">
  											<label for="passlama">Password Lama</label>
  											<input type="password" class="form-control" id="passlama" placeholder="Password Lama" name="password_lama" required maxlength="50">
  										</div>
  										<div class="form-group">
  											<label for="passbaru">Password Baru</label>
  											<input type="password" class="form-control" id="passbaru" placeholder="Password Baru" name="password_baru" required maxlength="50" minlength="6">
  										</div>
  										<div class="form-group">
  											<label for="verpass">Verifikasi Password</label>
  											<input type="password" class="form-control" id="verpass" placeholder="Verifikasi Password Baru" name="password_baru_ver" required maxlength="50" minlength="6">
  										</div>
  										<div class="form-group">
  											<button type="submit" name="update_action" value="password" class="btn btn-block btn-primary">Rubah Password</button>
  										</div>
  									</form>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  				<!-- /.col-md-8 -->
  			</div><!-- /.container-fluid -->


  			<div class="modal fade" id="modal-edit">
  				<div class="modal-dialog">
  					<div class="modal-content">
  						<form action="" method="POST" enctype="multipart/form-data">
  							<div class="modal-header">
  								<h4 class="modal-title">Edit Profile</h4>
  								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  									<span aria-hidden="true">&times;</span>
  								</button>
  							</div>
  							<div class="modal-body">
  								<div class="form-group">
  									<label for="nama">Nama</label>
  									<input type="text" class="form-control" id="username" placeholder="Nama" name="username" required maxlength="50" value="<?= $user['username']; ?>">
  								</div>
  								<div class="form-group">
  									<label for="jenis_kelamin">Jenis Kelamin</label>
  									<select class="form-control select2" id="jenis_kelamin" name="jenis_kelamin" style="width: 100%;">
  										<option <?= $user['jenis_kelamin'] == null ? 'selected' : '' ?> value="">Pilih Jenis Kelamin</option>
  										<option <?= $user['jenis_kelamin'] == 'Pria' ? 'selected' : '' ?> value="Pria">Pria</option>
  										<option <?= $user['jenis_kelamin'] == 'Wanita' ? 'selected' : '' ?> value="Wanita">Wanita</option>
  									</select>
  								</div>
  								<div class="form-group">
  									<label for="alamat">Alamat</label>
  									<input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" maxlength="125" value="<?= $user['alamat']; ?>">
  								</div>
  								<div class="form-group">
  									<label for="nik">NIK</label>
  									<input type="number" class="form-control" id="nik" placeholder="NIK" name="nik" maxlength="20" required value="<?= $user['nik']; ?>">
  								</div>
  								<div class="form-group">
  									<label for="telepon">Telepon</label>
  									<input type="tel" class="form-control" id="telepon" placeholder="Telepon" name="telepon" maxlength="15" required value="<?= $user['telepon']; ?>">
  								</div>
  								<div class="form-group">
  									<label for="email">Email</label>
  									<input type="email" class="form-control" id="email" placeholder="Email" name="email" maxlength="50" value="<?= $user['email']; ?>">
  								</div>
  								<div class="form-group">
  									<label for="exampleInputFile">Foto</label>
  									<small class="text-danger">Kosongi jika tidak ingin merubah foto</small>
  									<div class="input-group">
  										<div class="custom-file">
  											<input type="file" name="foto" accept="image/*" class="custom-file-input" id="image">
  											<label class="custom-file-label" for="image">Choose file</label>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="modal-footer justify-content-between">
  								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  								<button type="submit" name="update_action" value="profile" class="btn btn-primary">Update</button>
  							</div>
  						</form>
  					</div>
  					<!-- /.modal-content -->
  				</div>
  				<!-- /.modal-dialog -->
  			</div>
  			<!-- /.modal -->

  		</div>
  		<!--**********************************
            Content body end
        ***********************************-->