	<!--**********************************
            Content body start
        ***********************************-->
	<div class="content-body">
	    <!-- row -->
	    <div class="container-fluid">
	        <div class="form-head d-flex mb-3 align-items-start">
	            <div class="mr-auto d-none d-lg-block">
	                <h2 class="text-black font-w600 mb-0">Dashboard</h2>
	                <!-- <p class="mb-0">Welcome to Davur Admin!</p> -->
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
	            <div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
	                <div class="widget-stat card">
	                    <div class="card-body p-4">
	                        <div class="media ai-icon">
	                            <span class="mr-3 bgl-primary text-primary">
	                                <!-- <i class="ti-user"></i> -->
	                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="28" viewBox="0 0 24 24" fill="none" stroke="#4861E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
	                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
	                                    <line x1="8" y1="21" x2="16" y2="21"></line>
	                                    <line x1="12" y1="17" x2="12" y2="21"></line>
	                                </svg>
	                            </span>
	                            <div class="media-body">
	                                <h3 class="mb-0 text-black"><span class="counter ml-0"><?= $count_laporan; ?></span></h3>
	                                <p class="mb-0">Total Pengaduan</p>
	                                <!-- <small>4% (30 days)</small> -->
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
	                <div class="widget-stat card">
	                    <div class="card-body p-4">
	                        <div class="media ai-icon">
	                            <span class="mr-3 bgl-primary text-primary">
	                                <!-- <i class="ti-user"></i> -->

	                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="28" viewBox="0 0 24 24" fill="none" stroke="#4861E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
	                                    <path d="M12 2a10 10 0 1 0 10 10H12V2zM21.18 8.02c-1-2.3-2.85-4.17-5.16-5.18" /></svg>
	                            </span>
	                            <div class="media-body">
	                                <h3 class="mb-0 text-black"><span class="counter ml-0"><?= $count_pemberitahuan; ?></span></h3>
	                                <p class="mb-0">Total Pemberitahuan</p>
	                                <!-- <small>4% (30 days)</small> -->
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
	                <div class="widget-stat card">
	                    <div class="card-body p-4">
	                        <div class="media ai-icon">
	                            <span class="mr-3 bgl-primary text-primary">
	                                <!-- <i class="ti-user"></i> -->
	                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4861E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
	                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
	                                    <circle cx="8.5" cy="7" r="4"></circle>
	                                    <line x1="18" y1="8" x2="23" y2="13"></line>
	                                    <line x1="23" y1="8" x2="18" y2="13"></line>
	                                </svg>
	                            </span>
	                            <div class="media-body">
	                                <h3 class="mb-0 text-black"><span class="counter ml-0"><?= $count_admin; ?></span></h3>
	                                <p class="mb-0">Total Admin</p>
	                                <!-- <small>4% (30 days)</small> -->
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
	                <div class="widget-stat card">
	                    <div class="card-body p-4">
	                        <div class="media ai-icon">
	                            <span class="mr-3 bgl-primary text-primary">
	                                <!-- <i class="ti-user"></i> -->
	                                <svg width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path d="M4 30.5H22.75C23.7442 30.4989 24.6974 30.1035 25.4004 29.4004C26.1035 28.6974 26.4989 27.7442 26.5 26.75V16.75C26.5 16.4185 26.3683 16.1005 26.1339 15.8661C25.8995 15.6317 25.5815 15.5 25.25 15.5C24.9185 15.5 24.6005 15.6317 24.3661 15.8661C24.1317 16.1005 24 16.4185 24 16.75V26.75C23.9997 27.0814 23.8679 27.3992 23.6336 27.6336C23.3992 27.8679 23.0814 27.9997 22.75 28H4C3.66857 27.9997 3.3508 27.8679 3.11645 27.6336C2.88209 27.3992 2.7503 27.0814 2.75 26.75V9.25C2.7503 8.91857 2.88209 8.6008 3.11645 8.36645C3.3508 8.13209 3.66857 8.0003 4 8H15.25C15.5815 8 15.8995 7.8683 16.1339 7.63388C16.3683 7.39946 16.5 7.08152 16.5 6.75C16.5 6.41848 16.3683 6.10054 16.1339 5.86612C15.8995 5.6317 15.5815 5.5 15.25 5.5H4C3.00577 5.50109 2.05258 5.89653 1.34956 6.59956C0.646531 7.30258 0.251092 8.25577 0.25 9.25V26.75C0.251092 27.7442 0.646531 28.6974 1.34956 29.4004C2.05258 30.1035 3.00577 30.4989 4 30.5Z" fill="#2F4CDD" />
	                                    <path d="M25.25 0.5C24.0139 0.5 22.8055 0.866556 21.7777 1.55331C20.7499 2.24007 19.9488 3.21619 19.4758 4.35823C19.0027 5.50027 18.8789 6.75693 19.1201 7.96931C19.3613 9.1817 19.9565 10.2953 20.8306 11.1694C21.7047 12.0435 22.8183 12.6388 24.0307 12.8799C25.2431 13.1211 26.4997 12.9973 27.6418 12.5242C28.7838 12.0512 29.7599 11.2501 30.4467 10.2223C31.1334 9.19451 31.5 7.98613 31.5 6.75C31.498 5.093 30.8389 3.50442 29.6673 2.33274C28.4956 1.16106 26.907 0.501952 25.25 0.5ZM25.25 10.5C24.5083 10.5 23.7833 10.2801 23.1666 9.86801C22.5499 9.45596 22.0693 8.87029 21.7855 8.18506C21.5016 7.49984 21.4274 6.74584 21.5721 6.01841C21.7167 5.29098 22.0739 4.6228 22.5983 4.09835C23.1228 3.5739 23.791 3.21675 24.5184 3.07206C25.2458 2.92736 25.9998 3.00162 26.6851 3.28545C27.3703 3.56928 27.9559 4.04993 28.368 4.66661C28.7801 5.2833 29 6.00832 29 6.75C28.9989 7.74423 28.6035 8.69742 27.9004 9.40044C27.1974 10.1035 26.2442 10.4989 25.25 10.5Z" fill="#2F4CDD" />
	                                    <path d="M6.5 13H12.75C13.0815 13 13.3995 12.8683 13.6339 12.6339C13.8683 12.3995 14 12.0815 14 11.75C14 11.4185 13.8683 11.1005 13.6339 10.8661C13.3995 10.6317 13.0815 10.5 12.75 10.5H6.5C6.16848 10.5 5.85054 10.6317 5.61612 10.8661C5.3817 11.1005 5.25 11.4185 5.25 11.75C5.25 12.0815 5.3817 12.3995 5.61612 12.6339C5.85054 12.8683 6.16848 13 6.5 13Z" fill="#2F4CDD" />
	                                    <path d="M5.25 16.75C5.25 17.0815 5.3817 17.3995 5.61612 17.6339C5.85054 17.8683 6.16848 18 6.5 18H17.75C18.0815 18 18.3995 17.8683 18.6339 17.6339C18.8683 17.3995 19 17.0815 19 16.75C19 16.4185 18.8683 16.1005 18.6339 15.8661C18.3995 15.6317 18.0815 15.5 17.75 15.5H6.5C6.16848 15.5 5.85054 15.6317 5.61612 15.8661C5.3817 16.1005 5.25 16.4185 5.25 16.75Z" fill="#2F4CDD" /></svg>
	                            </span>
	                            <div class="media-body">
	                                <h3 class="mb-0 text-black"><span class="counter ml-0"><?= $count_user; ?></span></h3>
	                                <p class="mb-0">Total User</p>
	                                <!-- <small>4% (30 days)</small> -->
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- /.row -->
	        </div>

	        <div class="row">
	            <div class="col-xl-12">
	                <div class="card">
	                    <div class="card-header border-0 pb-0 d-sm-flex d-block">
	                        <div>
	                            <h4 class="card-title mb-1">Laporan Terbaru</h4>
	                            <small class="mb-0">Laporan Terakhir Pengaduan Masyarakat</small>
	                        </div>
	                        <div class="card-action card-tabs mt-3 mt-sm-0">
	                            <ul class="nav nav-tabs" role="tablist">
	                                <li class="nav-item">
	                                    <a class="nav-link active" data-toggle="tab" href="#monthly" role="tab">
	                                        Monthly
	                                    </a>
	                                </li>
	                                <li class="nav-item">
	                                    <a class="nav-link" data-toggle="tab" href="#weekly" role="tab">
	                                        Weekly
	                                    </a>
	                                </li>
	                                <li class="nav-item">
	                                    <a class="nav-link" data-toggle="tab" href="#today" role="tab">
	                                        Today
	                                    </a>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="card-body tab-content">
	                        <?php foreach ($all_laporan as $laporan) : ?>
	                            <div class="tab-pane fade show active" id="monthly">
	                                <div class="media mb-4 items-list-2">
	                                    <img class="img-fluid rounded mr-3" width="85" src="<?= base_url('assets/img/') . $laporan['foto_laporan']; ?>" alt="DexignZone">
	                                    <div class="media-body col-6 px-0">
	                                        <h5 class="mt-0 mb-1 text-black"><?= $laporan['judul']; ?></h5>
	                                        <small class="text-primary font-w500 mb-3"><?= $laporan['deskripsi']; ?></small>
	                                        <span class="text-secondary mr-2 fo"></span>
	                                        <ul class="fs-14 list-inline">
	                                            <li class="mr-3"> oleh: <?= $laporan['username']; ?></li>
	                                            <li><?= date('d M Y H:i:s', $laporan['laporan_dibuat']); ?></li>
	                                        </ul>
	                                    </div>
	                                    <!-- <div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
	                                        <h3 class="mb-0 font-w600 text-secondary">$12.56</h3>
	                                        <div class="dropdown ml-3 ">
	                                            <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
	                                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                                        <rect x="0" y="0" width="24" height="24"></rect>
	                                                        <circle fill="#000000" cx="5" cy="12" r="2"></circle>
	                                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
	                                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
	                                                    </g>
	                                                </svg>
	                                            </button>
	                                            <div class="dropdown-menu dropdown-menu-right">
	                                                <a class="dropdown-item" href="#">Edit</a>
	                                                <a class="dropdown-item" href="#">Delete</a>
	                                            </div>
	                                        </div>
	                                    </div> -->
	                                </div>
	                            </div>
	                        <?php endforeach; ?>
	                    </div>
	                    <div class="card-footer border-0 pt-0 text-center">
	                        <a href="<?= base_url('admin/laporan'); ?>" class="btn-link">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="row">
	            <div class="col-lg-4">
	                <!-- card new users -->
	                <div class="card">
	                    <div class="card-header">
	                        <h3 class="card-title">Anggota Terbaru</h3>
	                        <!-- <div class="card-tools">
	                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
	                            </button>
	                        </div> -->
	                    </div>
	                    <!-- /.card-header -->
	                    <div class="card-body p-0">
	                        <ul class="users-list clearfix">

	                            <?php foreach ($all_user as $row) : ?>
	                                <li>
	                                    <img src="<?= base_url() . 'assets/img/' . $row['foto']; ?>" style="height: 60px; width: 60px;" alt="User Image">
	                                    <a class="users-list-name" href="<?= base_url('admin/userprofile/') . $row['id_user']; ?>"><?= $row['username'] ?></a>
	                                    <span class="users-list-date"><?= date('d M Y', $row['dibuat_pada']); ?></span>
	                                </li>
	                            <?php endforeach; ?>

	                        </ul>
	                        <!-- /.users-list -->
	                    </div>
	                    <!-- /.card-body -->
	                    <div class="card-footer text-center">
	                        <a href="<?= base_url('admin/users'); ?>">View All Users</a>
	                    </div>
	                    <!-- /.card-footer -->
	                </div>
	                <!--/.card -->
	            </div>
	            <div class="col-lg-8">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Histori Login</h4>
	                    </div>
	                    <div class="card-body">
	                        <div class="table-responsive">
	                            <table class="table table-responsive-md">
	                                <thead>
	                                    <tr>
	                                        <th><strong>NAMA</strong></th>
	                                        <th><strong>WAKTU DAN TANGGAL</strong></th>
	                                        <th><strong>Status</strong></th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    <?php foreach ($login_history as $row) : ?>
	                                        <tr>
	                                            <td>
	                                                <div class="d-flex align-items-center"><img src="<?= base_url() . 'assets/img/' . $row->foto; ?>" class="rounded-lg mr-2" width="24" alt="" /> <span class="w-space-no"><?= $row->username; ?></span></div>
	                                            </td>
	                                            <td><?= $row->login_time; ?></td>
	                                            <td>
	                                                <div class="d-flex align-items-center"><i class="fa fa-circle text-success mr-1"></i>
	                                                    <?php
                                                        if ($row->level == 1) {
                                                            echo 'ADMIN';
                                                        } else {
                                                            echo 'USER';
                                                        }
                                                        ?>
	                                                </div>
	                                            </td>

	                                        </tr>
	                                    <?php endforeach; ?>
	                                </tbody>
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