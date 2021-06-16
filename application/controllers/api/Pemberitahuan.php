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
class Pemberitahuan extends CI_Controller
{
    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();

        $this->load->model('Pemberitahuan_model');
        $this->load->model('Auth_model');

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

    public function index_get($tipe = 'all', $id = null)
    {

        if ($tipe == 'all') {
            $data_pemberitahuan = $this->Pemberitahuan_model->getPemberitahuan('all');

            if ($data_pemberitahuan) {
                $this->response([
                    'status' => true,
                    'message' => 'Berhasil Mendapatkan Semua Pemberitahuan',
                    'data' => $data_pemberitahuan
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Gagal Mendapatkan Semua Pemberitahuan',
                ], 401);
            }
        }

        if ($tipe == 'id_pemberitahuan') {
            $id_pemberitahuan = $id;
            $data_pemberitahuan = $this->Pemberitahuan_model->getPemberitahuan('id_pemberitahuan', $id_pemberitahuan);

            if ($data_pemberitahuan) {
                $data_terbaca = ['dibaca' => 1];

                if (!$this->Pemberitahuan_model->updatePemberitahuan('id_pemberitahuan', $data_terbaca, $data_pemberitahuan['id_pemberitahuan'])) {
                    $this->response([
                        'status' => false,
                        'message' => 'Gagal Membaca Pemberitahuan',
                    ], 401);
                }

                $data_response = [
                    'id_pemberitahuan' => $data_pemberitahuan['id_pemberitahuan'],
                    'id_user' => $data_pemberitahuan['id_user'],
                    'id_penerima' => $data_pemberitahuan['id_penerima'],
                    'username' => $data_pemberitahuan['username'],
                    'judul' => $data_pemberitahuan['judul'],
                    'deskripsi' => $data_pemberitahuan['deskripsi'],
                    'dibaca' => $data_pemberitahuan['dibaca'],
                    'dibuat_pada' => $data_pemberitahuan['pemberitahuan_dibuat'],
                ];

                $this->response([
                    'status' => true,
                    'message' => 'Berhasil Mendapatkan Pemberitahuan',
                    'data' => $data_response
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Gagal Mendapatkan Pemberitahuan',
                ], 401);
            }
        }

        if ($tipe == 'id_user') {
            $id_user = $id;
            $data_pemberitahuan = $this->Pemberitahuan_model->getPemberitahuan('id_user', $id_user);

            if ($data_pemberitahuan) {
                $this->response([
                    'status' => true,
                    'message' => 'Berhasil Mendapatkan Pemberitahuan',
                    'data' => $data_pemberitahuan
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Gagal Mendapatkan Pemberitahuan',
                ], 401);
            }
        }

        if ($tipe == 'id_penerima') {
            $id_penerima = $id;
            $data_pemberitahuan = $this->Pemberitahuan_model->getPemberitahuan('id_penerima', $id_penerima);

            if ($data_pemberitahuan) {
                $this->response([
                    'status' => true,
                    'message' => 'Berhasil Mendapatkan Pemberitahuan',
                    'data' => $data_pemberitahuan
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Gagal Mendapatkan Pemberitahuan',
                ], 401);
            }
        }
    }

    //fungsi hapus data pemberitahuan
    public function index_delete($id_pemberitahuan)
    {

        //hapus data
        if ($this->Pemberitahuan_model->deletePemberitahuan($id_pemberitahuan)) {
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

    // test
    public function tambah_post()
    {
        $id_user = $this->post('id_user');

        // cek apakah email sudah terdaftar
        $user = $this->Auth_model->getUser('id_user', $id_user);

        if (!$user) {
            $this->response([
                'status' => false,
                'message' => 'User tidak terdaftar',
            ], 404);
        }

        $all_user = $this->Auth_model->getUser('all');

        $status = true;

        foreach ($all_user as $penerima) {
            // data ditangkap
            $data_pemberitahuan = [
                'id_user' => $id_user,
                'id_penerima' => $penerima['id_user'],
                'judul' => $this->post('judul'),
                'deskripsi' => $this->post('deskripsi'),
                'dibaca' => '2',
                'dibuat_pada' => time()
            ];

            if ($this->Pemberitahuan_model->insertPemberitahuan($data_pemberitahuan)) {
                $status = true;
            } else {
                $status = false;
            }
        }

        // data diinput
        if ($status) {
            $this->response([
                'status' => true,
                'message' => 'Pemberitahuan Terkirim!',
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Pemberitahuan Tidak Terkirim!',
            ], 401);
        }
    }

    public function count_get($id_penerima)
    {
        $pemberitahuan = $this->Pemberitahuan_model->getPemberitahuan('id_penerima_not_readed', $id_penerima);

        if ($pemberitahuan) {
            $this->response([
                'status' => true,
                'message' => 'Jumlah Pemberitahuan Belum Dibaca Didapatkan',
                'count' => count($pemberitahuan)
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Tidak ditemukan pemberitahuan' . $id_penerima,
                'count' => 0
            ], 200);
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
