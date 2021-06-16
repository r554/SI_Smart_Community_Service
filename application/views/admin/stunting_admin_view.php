<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Info Stunting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('informasiwebsite'); ?>">Pengaturan</a></li>
                        <li class="breadcrumb-item active">Info Stunting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content m-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Tambah Info Stunting
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
                            <input type="hidden" name="id_stunting" value="null">
                            <div class="form-group">
                                <label for="inputTag">Judul Info Stunting</label>
                                <input type="text" name="title" class="form-control" id="inputTag" placeholder="Masukkan judul informasi stunting" required>
                                <?php echo form_error('title', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                                <?php echo form_error('description', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <button type="submit" name="publish" value="true" class="btn btn-block btn-success"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Tambah Info Stunting</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->

            <div class="col-md-6">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Semua Info Stunting
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
                        <table id="allTag" class="table table-bordered table-striped table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($stunting as $row) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $no++; ?></td>
                                        <td class="align-middle">
                                            <p class="m-0"><?= $row['title']; ?></p>
                                            <p class="m-0">
                                                <a id="<?= $row['id_stunting']; ?>" class="text-small text-danger action-edit" data-toggle="modal" data-target="#modal-edit">Edit</a> |
                                                <a href="<?= base_url('admin/stunting/delete/') . $row['id_stunting']; ?>" class="text-small text-danger action-delete">Hapus</a>
                                            </p>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
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
                <h4 class="modal-title">Edit Info Stunting</h4>
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