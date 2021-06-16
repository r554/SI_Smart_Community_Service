<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Informasi Website</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pengaturan</a></li>
                        <li class="breadcrumb-item active">Informasi Website</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="tab-modal" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-edit-info-website" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Informasi Website</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-edit-contact" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Kontak</a>
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
                                        <dd class="col-sm-8"><?= date('d M Y', $site['updated_at']); ?></dd>
                                        <dt class="col-sm-4">Site Title</dt>
                                        <dd class="col-sm-8"><?= $site['title']; ?></dd>
                                        <dt class="col-sm-4">Short Title</dt>
                                        <dd class="col-sm-8"><?= $site['short_title']; ?></dd>
                                        <dt class="col-sm-4">Description</dt>
                                        <dd class="col-sm-8"><?= $site['description']; ?></dd>
                                        <dt class="col-sm-4">Keywords</dt>
                                        <dd class="col-sm-8"><?= $site['keywords']; ?></dd>
                                        <dt class="col-sm-4">Address</dt>
                                        <dd class="col-sm-8"><?= $site['address']; ?></dd>
                                    </dl>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="tab-edit-contact">
                                    <dl class="row">
                                        <dt class="col-sm-4">Email</dt>
                                        <dd class="col-sm-8"><?= $site['email']; ?></dd>
                                        <dt class="col-sm-4">Phone</dt>
                                        <dd class="col-sm-8"><?= $site['phone']; ?></dd>
                                        <dt class="col-sm-4">Twitter</dt>
                                        <dd class="col-sm-8"><?= $site['twitter']; ?></dd>
                                        <dt class="col-sm-4">Facebook</dt>
                                        <dd class="col-sm-8"><?= $site['facebook']; ?></dd>
                                        <dt class="col-sm-4">LinkedIn</dt>
                                        <dd class="col-sm-8"><?= $site['linkedin']; ?></dd>
                                        <dt class="col-sm-4">instagram</dt>
                                        <dd class="col-sm-8"><?= $site['instagram']; ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Edit Site Info</button>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Site Logo</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <img src="<?= base_url('assets/images/others/') . $site['logo']; ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form action="" role="form" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="image">Ganti logo</label>
                                            <p class="text-sm text-info">biarkan kosong jika tidak ingin merubah logo</p>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="logo" class="custom-file-input" id="image" accept="image/*" required>
                                                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <button type="submit" name="update_logo" value="true" class="btn btn-block btn-primary"><i class="fas fa-save mr-1"></i>Simpan gambar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<div class="modal fade" id="modal-edit">
    <form action="<?= base_url('admin/informasiwebsite'); ?>" method="POST">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Site Info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="tab-modal" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-edit-info-website" data-toggle="pill" href="#tab-edit-info-website-body" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Informasi Website</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-edit-contact" data-toggle="pill" href="#tab-edit-contact-body" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Kontak</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body text-default">
                            <div class="tab-content text-primary" id="tab-modal">
                                <div class="tab-pane fade show active" id="tab-edit-info-website-body" role="tabpanel" aria-labelledby="tab-edit-info-website">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input value="<?= $site['title']; ?>" type="text" name="title" class="form-control" placeholder="Enter title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Short Title</label>
                                        <input value="<?= $site['short_title']; ?>" type="text" name="short_title" class="form-control" placeholder="Enter short title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" placeholder="Enter description" id="" cols="30" rows="7" required><?= $site['description']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <input value="<?= $site['keywords']; ?>" type="text" name="keywords" class="form-control" placeholder="Enter keywords separated with coma ','" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" placeholder="Enter address" id="" cols="30" rows="3" required><?= $site['address']; ?></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-edit-contact-body" role="tabpanel" aria-labelledby="tab-edit-contact">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input value="<?= $site['email']; ?>" type="email" name="email" class="form-control" placeholder="Enter email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input value="<?= $site['phone']; ?>" type="text" name="phone" class="form-control" placeholder="Enter phone number">                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Social Links</label>    
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <input value="<?= $site['twitter']; ?>" type="url" name="twitter" class="form-control" placeholder="Twitter url">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-facebook mr-1" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <input value="<?= $site['facebook']; ?>" type="url" name="facebook" class="form-control" placeholder="Facebook url">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <input value="<?= $site['instagram']; ?>" type="url" name="instagram" class="form-control" placeholder="Instagram url">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <input value="<?= $site['linkedin']; ?>" type="url" name="linkedin" class="form-control" placeholder="LinkedIn url">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_info" value="true" class="btn btn-default">Update</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>
<!-- /.modal -->