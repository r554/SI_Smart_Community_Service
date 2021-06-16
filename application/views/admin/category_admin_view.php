<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Informasi Kesehatan</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content m-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Tambah Kategori
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pad">
                        <form action="" method="post" role="form">
                            <input type="hidden" name="id_category" value="null">
                            <div class="form-group">
                                <label for="inputKategori">Nama Kategori</label>
                                <input type="text" name="category" class="form-control" id="inputKategori" placeholder="Masukkan Nama Kategori" required>
                                <?php echo form_error('category', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <button type="submit" name="publish" value="true" class="btn btn-block btn-success"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Tambah Kategori</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->

            <div class="col-md-8">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Semua Kategori
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body pad table-responsive">
                        <?= $this->session->flashdata('message'); ?>
                        <table id="allCategory" class="table table-bordered table-striped table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($categories as $row) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $no++; ?></td>
                                        <td class="align-middle">
                                            <p class="m-0"><?= $row['category']; ?></p>
                                            <p class="m-0">
                                                <a id="<?= $row['id_category']; ?>" class="text-small text-danger action-edit" data-toggle="modal" data-target="#modal-edit">Edit</a> |
                                                <a href="<?= base_url('admin/category/delete/') . $row['id_category']; ?>" class="text-small text-danger action-delete">Hapus</a>
                                            </p>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- col-md4 -->
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-edit-body">
                
            </div>            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->