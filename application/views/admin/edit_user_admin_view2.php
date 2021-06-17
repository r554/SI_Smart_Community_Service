	<!--**********************************
            Content body start
        ***********************************-->
	<div class="content-body">
	    <!-- row -->
	    <div class="container-fluid">
	        <div class="row page-titles mx-0">
	            <div class="col-sm-6 p-md-0">
	                <div class="welcome-text">
	                    <h4>Edit Data Pengguna</h4>
	                    <!-- <p class="mb-0">Your business dashboard template</p> -->
	                </div>
	            </div>
	            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
	                    <li class="breadcrumb-item"><a href="javascript:void(0)">Semua Pengguna</a></li>
	                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit data Pengguna</a></li>
	                </ol>
	            </div>
	        </div>

	        <div class="row">
	            <div class="col-lg-12">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Data Pengguna</h4>
	                    </div>
	                    <div class="card-body">
	                        <?= $this->session->flashdata('message'); ?>
	                        <div class="form-validation">
	                            <form class="form-valide" action="#" method="post" enctype="multipart/form-data">
	                                <div class="row">
	                                    <div class="col-xl-6">
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="nik">NIK
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" value="<?= $user_edit['nik']; ?>" required>
	                                                <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="username">Nama
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="username" name="username" placeholder="Nama" value="<?= $user_edit['username']; ?>" required>
	                                                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="telepon">Telepon <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" value="<?= $user_edit['telepon']; ?>" required>
	                                                <?php echo form_error('telepon', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="email">Email
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user_edit['email']; ?>" required>
	                                                <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="Alamat">Alamat
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $user_edit['alamat']; ?>">
	                                                <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 col-form-label" for="jenis_kelamin">Jenis Kelamin
	                                                <span class="text-danger">*</span>
	                                            </label>
	                                            <div class="col-lg-6">
	                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
	                                                    <option <?= $user_edit['jenis_kelamin'] == null ? 'selected' : '' ?> value="">Pilih Jenis</option>
	                                                    <option <?= $user_edit['jenis_kelamin'] == 'Pria' ? 'selected' : '' ?> value="Pria">Pria</option>
	                                                    <option <?= $user_edit['jenis_kelamin'] == 'Wanita' ? 'selected' : '' ?> value="Wanita">Wanita</option>
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
	                                                    <option <?= $user_edit['level'] == null ? 'selected' : '' ?> value="">Pilih Hak Akses</option>
	                                                    <option <?= $user_edit['level'] == '1' ? 'selected' : '' ?> value="1">ADMIN</option>
	                                                    <option <?= $user_edit['level'] == '2' ? 'selected' : '' ?> value="2">USER</option>
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