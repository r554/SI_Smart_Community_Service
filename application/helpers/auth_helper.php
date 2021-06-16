<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('test_method')) {
    function verifyAccess($public = false){
        // menampung sesi login role user
        $role = null;

        // jika sudah ada session login maka simpan role login
        if(isset($_SESSION['level'])){
            $role = $_SESSION['level'];
        }

        // jika role 1 diarahkan ke admin
        if($role == 1){
            redirect('admin');
        }

        // jika role 2 diarahkan ke user
        if($role == 2){
            redirect(base_url());
        }

        // jika role null/kosong/belum login
        if($role == null || $role == ''){
            // jika ingin mengakses halaman admin/user maka dikembalikan ke laman utama
            if(!$public){
                redirect(base_url());
            }
        }
    }
}