	<!--**********************************
            Content body start
        ***********************************-->
	<div class="content-body">
	    <!-- row -->
	    <div class="container-fluid">
	        <div class="row page-titles mx-0">
	            <div class="col-sm-6 p-md-0">
	                <div class="welcome-text">
	                    <h4>Tambah Data Dinas</h4>
	                    <!-- <p class="mb-0">Your business dashboard template</p> -->
	                </div>
	            </div>
	            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
	                    <li class="breadcrumb-item"><a href="javascript:void(0)">Data Dinas</a></li>
	                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data Dinas</a></li>
	                </ol>
	            </div>
	        </div>

	        <div class="row">
	            <div class="col-lg-12">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Form Data Dinas</h4>
	                    </div>
	                    <div class="card-body">
	                        <?= $this->session->flashdata('message'); ?>
	                        <div class="form-validation">
	                            <form class="form-valide" action="" method="post" enctype="multipart/form-data">
	                                <div class="row">
	                                    <div class="col-xl-6">
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="dinas">Nama Dinas
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="dinas" name="dinas" placeholder="Nama Dinas" maxlength="50" value="<?= set_value('dinas'); ?>" required>
	                                                <?php echo form_error('dinas', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="alamat_dinas">Alamat Dinas
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="alamat_dinas" name="alamat_dinas" placeholder="Alamat Dinas" value="<?= set_value('alamat_dinas'); ?>" required>
	                                                <?php echo form_error('alamat_dinas', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="col-xl-6">
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="logo_dinas">Logo Dinas
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="file" class="form-control" id="logo_dinas" name="logo_dinas" placeholder="logo_dinas" accept="image/*">
	                                                <label class="custom-file-label" for="logo_dinas">Pilih Foto Profil</label>
	                                            </div>
	                                        </div>
	                                        <div class=" form-group row">
	                                            <div class="col-lg-8 ml-auto">
	                                                <button type="submit" class="btn btn-primary btn-md" name="tambah_user" value="true">Simpan Data Dinas</button>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
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