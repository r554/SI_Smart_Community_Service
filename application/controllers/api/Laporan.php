<?php

use Restserver\Libraries\REST_Controller;

// use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Laporan extends CI_Controller
{
    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();

        $this->load->model('apimobile/Auth_model');
        $this->load->model('apimobile/Laporan_model');
        $this->load->model('apimobile/Pemberitahuan_model');

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function index_post()
    {
        $email = $this->post('email');
        $password = $this->post('password');

        $userData = $this->db->get_where('pengguna', ['email_pengguna' => $email])->row_array();

        // apabila email ada
        if ($userData) {
            // apabila belum aktifasi
            if ($userData['is_active'] == 1) {
                // cek password
                if (password_verify($password, $userData['password'])) {
                    $data = [
                        'id_pengguna' => $userData['id_pengguna'],
                        'nama_pengguna' => $userData['nama_pengguna'],
                        'alamat_pengguna' => $userData['alamat_pengguna'],
                        'provinsi_pengguna' => $userData['provinsi_pengguna'],
                        'kota_pengguna' => $userData['kota_pengguna'],
                        'telepon_pengguna' => $userData['telepon_pengguna'],
                        'email_pengguna' => $userData['email_pengguna'],
                        'kelamin_pengguna' => $userData['kelamin_pengguna'],
                        'tanggal_lahir_pengguna' => $userData['tanggal_lahir_pengguna'],
                        'no_ktp_pengguna' => $userData['no_ktp_pengguna'],
                        'foto_pengguna' => 'http://localhost/indiekostci/assets/img/' . $userData['foto_pengguna'],
                        'id_akses' => $userData['id_akses']
                    ];

                    $this->response([
                        'status' => true,
                        'message' => 'Login Berhasil',
                        'data' => $data
                    ], 200);
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'Password Tidak Sesuai'
                    ], 401);
                }
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Akun belum diaktivasi'
                ], 401);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'Email tidak ditemukan'
            ], 401);
        }
    }

    // web.com/api/laporan/index/id_laporan/2

    public function index_get($tipe = 'all', $id = null, $limit = null)
    {

        if ($tipe == 'all') {
            // jika ada limit, maka data hanya akan ditampilkan dibatasi sesuai limit
            if ($limit != null) {
                $data_laporan = $this->Laporan_model->getLaporan('all', NULL, $limit);
            } else {
                $data_laporan = $this->Laporan_model->getLaporan('all');
            }

            if ($data_laporan) {
                $this->response([
                    'status' => true,
                    'message' => 'Berhasil Mendapatkan Semua Laporan',
                    'data' => $data_laporan
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Gagal Mendapatkan Semua Laporan',
                ], 401);
            }
        }

        if ($tipe == 'id_laporan') {
            $id_laporan = $id;
            $data_laporan = $this->Laporan_model->getLaporan('id_laporan', $id_laporan);

            if ($data_laporan) {
                $data_response = [
                    'id_laporan' => $data_laporan['id_laporan'],
                    'id_dinas' => $data_laporan['id_dinas'],
                    'id_user' => $data_laporan['id_user'],
                    'username' => $data_laporan['username'],
                    'judul' => $data_laporan['judul'],
                    'deskripsi' => $data_laporan['deskripsi'],
                    'tanggal' => $data_laporan['tanggal'],
                    'foto' => $data_laporan['foto_laporan'],
                    'alamat' => $data_laporan['alamat_laporan'],
                    'lat' => $data_laporan['lat'],
                    'lng' => $data_laporan['lng'],
                    'dibuat_pada' => $data_laporan['laporan_dibuat'],
                ];


                $this->response([
                    'status' => true,
                    'message' => 'Berhasil Mendapatkan Laporan',
                    'data' => $data_response
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Gagal Mendapatkan Laporan',
                ], 401);
            }
        }

        if ($tipe == 'id_user') {
            $id_user = $id;
            $data_laporan = $this->Laporan_model->getLaporan('id_user', $id_user);

            if ($data_laporan) {
                $this->response([
                    'status' => true,
                    'message' => 'Berhasil Mendapatkan Laporan',
                    'data' => $data_laporan
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Gagal Mendapatkan Laporan',
                ], 401);
            }
        }
    }

    //fungsi hapus data laporan
    public function index_delete($id_laporan)
    {

        if ($this->Laporan_model->deleteLaporan($id_laporan)) {
            $this->response([
                'status' => true,
                'message' => 'Data Berhasil Dihapus',
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data Berhasil Dihapus',
            ], 401);
        }
    }

    public function home_get($tipe, $id_user, $wilayah = null)
    {
        if ($tipe == 'all') {
            $laporan = $this->Laporan_model->getLaporan('all');
            $laporan_user = $this->Laporan_model->getLaporan('id_user', $id_user);
            $pelapor = $this->Auth_model->getUser('level', 2);
            $pemberitahuan = $this->Pemberitahuan_model->getPemberitahuan('id_penerima_not_readed', $id_user);

            if (!$laporan) {
                $count_laporan = 0;
            } else {
                $count_laporan = count($laporan);
            }

            if (!$laporan_user) {
                $count_laporan_user = 0;
            } else {
                $count_laporan_user = count($laporan_user);
            }

            if (!$pelapor) {
                $count_pelapor = 0;
            } else {
                $count_pelapor = count($pelapor);
            }

            if (!$pemberitahuan) {
                $count_pemberitahuan = 0;
            } else {
                $count_pemberitahuan = count($pemberitahuan);
            }

            $this->response([
                'status' => true,
                'message' => 'Data Berhasil Didapatkan',
                'count_laporan' => $count_laporan,
                'count_laporan_user' => $count_laporan_user,
                'count_pelapor' => $count_pelapor,
                'count_pemberitahuan' => $count_pemberitahuan,
                'laporan' => $laporan,
            ], 200);
        } 

    }

    // test
    public function tambah_post()
    {
        $id_user = $this->post('id_user');

        $imgName = uniqid() . '.png';
        $path = 'assets/img/' . $imgName;
        $status = '1';

        $pengguna = $this->db->get_where('tb_user', ['id_user' => $id_user])->row_array();

        if ($pengguna) {
            $foto_laporan = $this->post('foto');

            if ($this->post('id_dinas') == "Dinas Perhubungan") {
                $id_dinas = 1;
            } elseif ($this->post('id_dinas') == "Dinas Lingkungan Hidup") {
                $id_dinas = 2;
            }elseif ($this->post('id_dinas') == "Sosial") {
                $id_dinas = 3;
            }elseif ($this->post('id_dinas') == "Kependudukan") {
                $id_dinas = 4;
            }
            

            $data = array(
                'id_user' => $id_user,
                'id_dinas' => $id_dinas,
                'judul' => $this->post('judul'),
                'deskripsi' => $this->post('deskripsi'),
                'alamat' => $this->post('alamat'),
                'lat' => $this->post('lat'),
                'lng' => $this->post('lng'),
                'foto' => $imgName,
                'dibuat_pada' => time(),
                'tanggal' => date('Y-m-d', time()),
                'status' => $status,
                
            );

            // var_dump(file_put_contents($path, base64_decode($foto_laporan))); die;
            if ($this->db->insert('tb_laporan', $data)) {
                if (file_put_contents($path, base64_decode($foto_laporan))) {
                    // jika berhasil
                    $this->set_response([
                        'status' => true,
                        'message' => 'Berhasil Mengupload Laporan'
                    ], 200);
                } else {
                    $this->set_response([
                        'status' => false,
                        'message' => 'Gagal Mengupload Gambar Laporan'
                    ], 200);
                }
            } else {
                // jika gagal
                $this->set_response([
                    'status' => false,
                    'message' => 'Gagal Mengupload Laporan'
                ], 200);
            }
        } else {
            // jika data pengguna tidak ada
            $this->set_response([
                'status' => false,
                'message' => 'User could not be found'
            ], 404);
        }
    }

    // fungsi proses send email
    private function _sendEmail($token, $email, $type)
    {
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'smtp.gmail.com',
            'smtp_user'     => 'indiekostteknotirta@gmail.com',
            'smtp_pass'     => 'indieforever',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'smtp_crypto'   => 'ssl',
            'crlf'          => "\r\n",
            'newline'       => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('indiekostteknotirta@gmail.com', 'INDIEKOST');
        $this->email->to($email);

        if ($type == 'verify') {
            $message = 'Klik link berikut untuk melakukan aktivasi akun anda <a href="' . base_url("auth/verify") . '?email=' . $email . '&token=' . $token . '">AKTIVASI AKUN</a>';

            $this->email->subject('Verifikasi Akun INDIEKOST');
            $this->email->message($message);
        } else if ($type == 'forgot') {
            $message = 'Klik link berikut untuk mengatur ulang password akun anda <a href="' . base_url("auth/resetpassword") . '?email=' . $email . '&token=' . $token . '">RESET PASSWORD</a>';

            $this->email->subject('Reset Password Akun INDIEKOST');
            $this->email->message($message);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function forgotPassword_post()
    {
        if ($this->post('email')) {
            // jika ada email
            $email = $this->post('email');

            $user = $this->db->get_where('pengguna', ['email_pengguna' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = uniqid(true);

                $user_token = [
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time()
                ];

                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, $email, 'forgot');

                $this->response([
                    'status' => true,
                    'message' => 'Berhasil mengirim email reset password'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Email tidak terdaftar atau belum aktif'
                ], 401);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'Email tidak ditemukan'
            ], 401);
        }
    }
}
