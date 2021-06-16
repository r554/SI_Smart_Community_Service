	<!--**********************************
            Content body start
        ***********************************-->
	<div class="content-body">
		<!-- row -->
		<div class="container-fluid">
			<div class="form-head d-flex mb-3 align-items-start">
				<div class="mr-auto d-none d-lg-block">
					<h2 class="text-black font-w600 mb-0">Dashboard</h2>
					<p class="mb-0">Welcome to Davur Admin!</p>
				</div>

				<div class="dropdown custom-dropdown">
					<div class="btn btn-sm btn-primary light d-flex align-items-center svg-btn" data-toggle="dropdown">
						<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g>
								<path d="M22.4281 2.856H21.8681V1.428C21.8681 0.56 21.2801 0 20.4401 0C19.6001 0 19.0121 0.56 19.0121 1.428V2.856H9.71606V1.428C9.71606 0.56 9.15606 0 8.28806 0C7.42006 0 6.86006 0.56 6.86006 1.428V2.856H5.57206C2.85606 2.856 0.560059 5.152 0.560059 7.868V23.016C0.560059 25.732 2.85606 28.028 5.57206 28.028H22.4281C25.1441 28.028 27.4401 25.732 27.4401 23.016V7.868C27.4401 5.152 25.1441 2.856 22.4281 2.856ZM5.57206 5.712H22.4281C23.5761 5.712 24.5841 6.72 24.5841 7.868V9.856H3.41606V7.868C3.41606 6.72 4.42406 5.712 5.57206 5.712ZM22.4281 25.144H5.57206C4.42406 25.144 3.41606 24.136 3.41606 22.988V12.712H24.5561V22.988C24.5841 24.136 23.5761 25.144 22.4281 25.144Z" fill="#2F4CDD"></path>
							</g>
						</svg>
						<div class="text-left ml-3">
							<span class="d-block fs-16">Filter Periode</span>
							<small class="d-block fs-13">4 June 2020 - 4 July 2020</small>
						</div>
						<i class="fa fa-angle-down scale5 ml-3"></i>
					</div>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#">4 June 2020 - 4 July 2020</a>
						<a class="dropdown-item" href="#">5 july 2020 - 4 Aug 2020</a>
					</div>
				</div>
			</div>
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
									<input id="judul" type="judul" name="judul" class="form-control" maxlength="50" placeholder="Judul Laporan" value="<?= set_value('judul'); ?>" required>
									<?php echo form_error('judul', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<label for="deskripsi">Deskripsi</label>
									<textarea id="deskripsi" type="text" name="deskripsi" class="form-control" rows="5" placeholder="Deskripsi laporan" required><?= set_value('deskripsi'); ?></textarea>
									<?php echo form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
								</div>
								<button type="submit" name="tambah_pemberitahuan" value="true" class="btn btn-block btn-primary"><i class="fa fa-send mr-1"></i>Kirim Pemberitahuan</button>
							</form>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col-md-8 -->
			</div>
		</div>
	</div>
	<!--**********************************
            Content body end
        ***********************************-->