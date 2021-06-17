	<!--**********************************
            Content body start
        ***********************************-->
	<div class="content-body">
	    <!-- row -->
	    <div class="container-fluid">
	        <div class="row page-titles mx-0">
	            <div class="col-sm-6 p-md-0">
	                <div class="welcome-text">
	                    <h4>Data Pengguna</h4>
	                    <!-- <p class="mb-0">Your business dashboard template</p> -->
	                </div>
	            </div>
	            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
	                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Semua Pengguna</a></li>
	                </ol>
	            </div>
	        </div>

	        <div class="row">
	            <div class="col-12">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Data Akun Pengguna Sistem</h4>
	                    </div>
	                    <div class="card-body">
	                        <div class="table-responsive">
	                            <?= $this->session->flashdata('message'); ?>
	                            <table id="example2" class="display" style="width:100%">
	                                <thead>
	                                    <tr><a href="<?= base_url('admin/tambahUser'); ?>"><button class="btn btn-md btn-primary">Tambah Pegguna</button></a></tr>
	                                    <tr>
	                                        <th>Nama</th>
	                                        <th>jumlah Pelaporan</th>
	                                        <th>jenis Kelamin</th>
	                                        <th>Telepon</th>
	                                        <th>Email</th>
	                                        <th>Terdaftar</th>
	                                        <th>Aksi</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    <?php
                                        $no = 1;
                                        foreach ($users as $user) :
                                        ?>
	                                        <tr>
	                                            <td><?= $user['username']; ?></td>
	                                            <td>
	                                                <?php
                                                    $id_user_now = $user['id_user'];
                                                    $current_user = $this->db->query("SELECT tb_laporan.id_user, COUNT(tb_laporan.id_laporan) AS total_laporan FROM tb_laporan WHERE tb_laporan.id_user = $id_user_now GROUP BY tb_laporan.id_user")->row_array();

                                                    echo $current_user['total_laporan'] == null ? '-' : $current_user['total_laporan'];
                                                    ?>
	                                            </td>
	                                            <td><?= $user['jenis_kelamin'] == null ? '-' : $user['jenis_kelamin']; ?></td>
	                                            <td><?= $user['telepon'] == null ? '-' : $user['telepon']; ?></td>
	                                            <td><?= $user['email'] == null ? '-' : $user['email']; ?></td>
	                                            <td><?= date('d M Y', $user['dibuat_pada']); ?></td>
	                                            <td>
	                                                <div class="d-flex">
	                                                    <a href="<?= base_url('admin/userprofile/') . $user['id_user']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
	                                                    <a href="<?= base_url('admin/deleteuser/') . $user['id_user']; ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
	                                                </div>
	                                            </td>
	                                        </tr>
	                                    <?php endforeach; ?>
	                                </tbody>
	                                <tfoot>
	                                    <tr>
	                                        <th>Nama</th>
	                                        <th>jumlah Pelaporan</th>
	                                        <th>jenis Kelamin</th>
	                                        <th>Telepon</th>
	                                        <th>Email</th>
	                                        <th>Terdaftar</th>
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