	<!--**********************************
            Content body start
        ***********************************-->
	<div class="content-body">
		<!-- row -->
		<div class="container-fluid">
			<div class="row page-titles mx-0">
				<div class="col-sm-6 p-md-0">
					<div class="welcome-text">
						<h4>Kelola Dinas</h4>
						<!-- <p class="mb-0">Your business dashboard template</p> -->
					</div>
				</div>
				<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Data Dinas</a></li>
					</ol>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Data Dinas Kab. Jember</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<?= $this->session->flashdata('message'); ?>
								<table id="example2" class="display" style="width:100%">
									<thead>
										<tr><a href="<?= base_url('admin/tambahDinas'); ?>"><button class="btn btn-md btn-primary">Tambah Dinas</button></a></tr>
										<tr>
											<th>No.</th>
											<th>Nama Dinas</th>
											<th>Alamat Dinas</th>
											<th>Logo</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($data_dinas as $data_dinas) :
										?>
											<tr>

												<td><?= $no++ ?></td>
												<td><?= $data_dinas['nama_dinas']; ?></td>
												<td><?= $data_dinas['alamat_dinas'] == null ? '-' : $data_dinas['alamat_dinas']; ?></td>
												<td><img src="<?= base_url() . 'assets/img/' . $data_dinas['logo_dinas']; ?>" class="rounded-lg mr-2" width="100" height="100" alt="" /></td>
												<td>
													<div class="d-flex">
														<a href="<?= base_url('admin/editDinas/') . $data_dinas['id_dinas']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="<?= base_url('admin/deleteDinas/') . $data_dinas['id_dinas']; ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
									<tfoot>
										<tr>
											<th>No.</th>
											<th>Nama Dinas</th>
											<th>Alamat Dinas</th>
											<th>Logo</th>
											<th>Aksi</th>
										</tr>
									</tfoot>
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