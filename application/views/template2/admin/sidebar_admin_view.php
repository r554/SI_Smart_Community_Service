<!--**********************************
            Sidebar start
***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="ai-icon" href="<?= base_url('admin'); ?>" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Pengaduan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('Admin/laporan'); ?>">Semuan Pengaduan</a></li>
                    <li><a href="<?= base_url('Admin/Tampil_Pengaduan_Masuk') ?>">Pengaduan Masuk</a></li>
                    <li><a href="<?= base_url('Admin/Tampil_Validasi_Masuk') ?>">Memvalidasi Pengaduan</a></li>
                    <li><a href="<?= base_url('Admin/Tampil_Pengaduan_Diproses') ?>">Pengaduan Diproses</a></li>
                    <li><a href="<?= base_url('Admin/Tampil_Pengaduan_Dibatalkan') ?>">Pengaduan Dibatalkan</a></li>
                    <li><a href="<?= base_url('Admin/Tampil_Pengaduan_Selesai') ?>">Pengaduan Selesai</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Data Master</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('admin/tampil_dinas'); ?>">Data Dinas</a></li>
                    <li><a href="<?= base_url('admin/users'); ?>">Data Akun User</a></li>
                    <li><a href="<?= base_url('admin/tampil_akun_dinas'); ?>">Data Akun Dinas</a></li>
                </ul>
            </li>
            <li><a href="<?php echo site_url('Admin/laporann'); ?>" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Laporan</span>
                </a>
            </li>
        </ul>
        <div class="copyright">
            <p><strong>Dera Official</strong> © 2021 All Rights Reserved</p>
        </div>
    </div>
</div>
<!--**********************************
            Sidebar end
***********************************-->