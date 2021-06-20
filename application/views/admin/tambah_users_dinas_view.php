	<!--**********************************
            Content body start
        ***********************************-->
	<div class="content-body">
	    <!-- row -->
	    <div class="container-fluid">
	        <div class="row page-titles mx-0">
	            <div class="col-sm-6 p-md-0">
	                <div class="welcome-text">
	                    <h4>Tambah Data Pengguna</h4>
	                    <!-- <p class="mb-0">Your business dashboard template</p> -->
	                </div>
	            </div>
	            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
	                    <li class="breadcrumb-item"><a href="javascript:void(0)">Semua Pengguna</a></li>
	                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah data Pengguna Dinas</a></li>
	                </ol>
	            </div>
	        </div>

	        <div class="row">
	            <div class="col-lg-12">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Form Data Pengguna</h4>
	                    </div>
	                    <div class="card-body">
	                        <?= $this->session->flashdata('message'); ?>
	                        <div class="form-validation">
	                            <form class="form-valide" action="" method="post" enctype="multipart/form-data">
	                                <div class="row">
	                                    <div class="col-xl-6">
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="nik">NIK
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" maxlength="50" value="<?= set_value('nik'); ?>" required>
	                                                <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="username">Nama
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="username" name="username" placeholder="Nama" value="<?= set_value('username'); ?>" required>
	                                                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="telepon">Telepon <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" value="<?= set_value('telepon'); ?>" required>
	                                                <?php echo form_error('telepon', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="email">Email
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" required>
	                                                <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="Alamat">Alamat
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>" required>
	                                                <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="jenis_kelamin">Jenis Kelamin
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
	                                                    <option value="">Pilih Jenis</option>
	                                                    <option value="Pria">Pria</option>
	                                                    <option value="Wanita">Wanita</option>
	                                                </select>
	                                                <?php echo form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="col-xl-6">
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="level">Hak Akses
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <select class="form-control" name="level" id="level" required>
	                                                    <option value="">Pilih Hak Akses</option>
	                                                    <option value="1">ADMIN</option>
	                                                    <option value="3">Dinas Perhubungan</option>
	                                                </select>
	                                                <?php echo form_error('level', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="password">Password
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="password" name="password" placeholder="password">
	                                                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="password_confirmation">Password Confirmation
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="password confirmation">
	                                                <?php echo form_error('password_confirmation', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="foto">Foto Profil
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto" accept="image/*">
	                                                <label class="custom-file-label" for="foto">Pilih Foto Profil</label>
	                                            </div>
	                                        </div>

	                                        <div class=" form-group row">
	                                            <div class="col-lg-8 ml-auto">
	                                                <button type="submit" class="btn btn-primary" name="tambah_user" value="true">Simpan User</button>
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