<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        if ($this->session->userdata('level') != 1) {
            verifyAccess();
        }

        // Your own constructor code
        $this->load->model('Auth_model');
        $this->load->model('Login_model');
        $this->load->model('Pemberitahuan_model');
        $this->load->model('Laporan_model');
        $this->load->model('Track_model');
    }
    // endpoint untuk page dashboard
    public function index()
    {
        // echo "admin dashboard"; die;                       

        $data['title'] = "Dashboard";
        $data['menu'] = "dasboard";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);
        $data['all_user'] = $this->Auth_model->getUser('all', NULL, '12');
        // login history data
        $data['login_history'] = $this->Login_model->getLatestLoginWithLimit(6);
        $data['count_laporan'] = count($this->Laporan_model->getLaporan('all'));
        $data['count_pemberitahuan'] = count($this->Pemberitahuan_model->getPemberitahuan('all'));
        $data['count_admin'] = count($this->Auth_model->getUser('level', 1));
        $data['count_user'] = count($this->Auth_model->getUser('level', 2));
        $data['all_laporan'] = $this->Laporan_model->getLaporan('all', null, 5);

        // load view dashboard dengan template admin
        $this->load->view('template2/admin/header_admin_view', $data);
        $this->load->view('template2/admin/sidebar_admin_view');
        $this->load->view('admin/dashboard_admin_view2');
        // $this->load->view('template2/admin/control_admin_view');
        $this->load->view('template2/admin/footer_admin_view');
    }

    // endpoint untuk tambah pengguna
    public function tambahUser()
    {
        $data['title'] = "Tambah Pengguna";
        $data['menu'] = "pengguna";
        $data['sub_menu'] = "tambah_pengguna";
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);

        // form validation config ===============================
        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('level', 'Hak akses', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'required|trim|max_length[10]');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|is_unique[tb_user.telepon]|trim|max_length[15]|numeric');
        $this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[tb_user.nik]|trim|max_length[20]|numeric');
        $this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[tb_user.email]|valid_email|max_length[100]');
        $this->form_validation->set_rules('password', 'password', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|trim|max_length[50]|matches[password]');
        // ===============================

        if ($this->form_validation->run() == FALSE) {
            // load view tambah user dengan template admin
            $this->load->view('template2/admin/header_admin_view', $data);
            $this->load->view('template2/admin/sidebar_admin_view');
            $this->load->view('admin/tambah_user_admin_view2');
            // $this->load->view('template/admin/control_admin_view');
            $this->load->view('template2/admin/footer_admin_view');
        } else {
            if ($_FILES['foto']['error'] != 4) {
                $image = $this->upload_image('foto', './assets/img/');
            } else {
                $image = 'user-no-image.jpg';
            }

            $data_user = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'alamat' => strtoupper(htmlspecialchars($this->input->post('alamat', true))),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'level' => htmlspecialchars($this->input->post('level', true)),
                'password' => password_hash(htmlspecialchars($this->input->post('password', true)), PASSWORD_DEFAULT),
                'foto' => $image,
                'dibuat_pada' => time(),
            ];

            if ($this->Auth_model->insertUser($data_user)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil mendaftarkan pengguna</div>');

                redirect('admin/tambahuser');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal mendaftarkan pengguna</div>');

                redirect('admin/tambahuser');
            }
        }
    }

    // endpoint untuk tambah laporan
    public function tambahLaporan()
    {
        $data['title'] = "Tambah Laporan";
        $data['menu'] = "laporan";
        $data['sub_menu'] = "tambah_laporan";
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);

        // form validation config ===============================
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('lat', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('lng', 'Longitude', 'required|trim');
        // ===============================

        if ($this->form_validation->run() == FALSE) {
            // load view tambah user dengan template admin
            $this->load->view('template/admin/header_admin_view', $data);
            $this->load->view('template/admin/sidebar_admin_view');
            $this->load->view('admin/tambah_laporan_admin_view');
            $this->load->view('template/admin/control_admin_view');
            $this->load->view('template/admin/footer_admin_view');
        } else {
            if ($_FILES['foto']['error'] != 4) {
                $image = $this->upload_image('foto', './assets/img/');
            } else {
                $image = 'no-image.jpg';
            }

            $data_laporan = [
                'id_user' => $this->session->userdata('id_user'),
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
                'lat' => htmlspecialchars($this->input->post('lat', true)),
                'lng' => htmlspecialchars($this->input->post('lng', true)),
                'foto' => $image,
                'dibuat_pada' => time(),
            ];

            if ($this->Laporan_model->insertLaporan($data_laporan)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menyimpan laporan</div>');

                redirect('admin/tambahlaporan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menyimpan laporan</div>');

                redirect('admin/tambahlaporan');
            }
        }
    }

    // endpoint untuk tambah pemberitahuan
    public function tambahPemberitahuan()
    {
        $data['title'] = "Tambah Pemberitahuan";
        $data['menu'] = "pemberitahuan";
        $data['sub_menu'] = "tambah_pemberitahuan";
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);

        // form validation config ===============================
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        // ===============================

        if ($this->form_validation->run() == FALSE) {
            // load view tambah user dengan template admin
            $this->load->view('template2/admin/header_admin_view', $data);
            $this->load->view('template2/admin/sidebar_admin_view');
            $this->load->view('admin/tambah_pemberitahuan_admin_view2');
            // $this->load->view('template/admin/control_admin_view');
            $this->load->view('template2/admin/footer_admin_view');
        } else {
            $status_send = true;
            $users = $this->Auth_model->getUser('all');

            foreach ($users as $user) {
                $data_pemberitahuan = [
                    'id_user' => $this->session->userdata('id_user'),
                    'id_penerima' => $user['id_user'],
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                    'dibaca' => 2,
                    'dibuat_pada' => time(),
                ];

                if ($this->Pemberitahuan_model->insertPemberitahuan($data_pemberitahuan)) {
                    $status_send = true;
                } else {
                    $status_send = false;
                }
            }

            if ($status_send) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil mengirim pemberitahuan</div>');

                redirect('admin/tambahpemberitahuan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal mengirim pemberitahuan</div>');

                redirect('admin/tambahpemberitahuan');
            }
        }
    }

    // endpoint edit user by id
    public function userProfile($id_user)
    {
        $data['title'] = "Edit Pengguna";
        $data['menu'] = "pengguna";
        $data['sub_menu'] = "semua_pengguna";
        $data['sub_menu_action'] = "edit_pengguna";

        // user data
        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);
        $data['user_edit'] = $this->Auth_model->getUser('id_user', $id_user);

        // form validation config ===============================
        $this->form_validation->set_rules('username', 'username', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim|max_length[10]');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim|max_length[15]|numeric');
        $this->form_validation->set_rules('nik', 'nik', 'required|trim|max_length[20]|numeric');
        $this->form_validation->set_rules('level', 'level', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|max_length[100]');
        $this->form_validation->set_rules('password', 'password', 'trim|max_length[50]');
        // ===============================

        if ($this->form_validation->run() == FALSE) {
            // load view PROFILE dengan template admin
            $this->load->view('template2/admin/header_admin_view', $data);
            $this->load->view('template2/admin/sidebar_admin_view');
            $this->load->view('admin/edit_user_admin_view2');
            // $this->load->view('template2/admin/control_admin_view');
            $this->load->view('template2/admin/footer_admin_view');
        } else {
            // update thumbnail atatu tidak
            if ($_FILES['foto']['error'] != 4) {
                $image = $this->upload_image('foto', './assets/img/');
            } else {
                $image = $data['user_edit']['foto'];
            }

            // update password atau tidak
            if ($this->input->post('password')) {
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            } else {
                $password = $data['user_edit']['password'];
            }

            $data_user_update = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'alamat' => strtoupper(htmlspecialchars($this->input->post('alamat', true))),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'level' => htmlspecialchars($this->input->post('level', true)),
                'password' => $password,
                'foto' => $image,
                'diubah_pada' => time(),
            ];

            if ($this->Auth_model->updateUser('id_user', $data_user_update, $id_user)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil mengupdate pengguna</div>');

                redirect('admin/users');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal mengupdate pengguna</div>');

                redirect('admin/users');
            }
        }
    }

    // endpoint edit pemberitahuan by id
    public function editPemberitahuan($id_pemberitahuan)
    {
        $data['title'] = "Edit Pemberitahuan";
        $data['menu'] = "pemberitahuan";
        $data['sub_menu'] = "semua_pemberitahuan";
        $data['sub_menu_action'] = "edit_pemberitahuan";

        // user data
        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);
        $data['pemberitahuan'] = $this->Pemberitahuan_model->getPemberitahuan('id_pemberitahuan', $id_pemberitahuan);

        // form validation config ===============================
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        // ===============================

        if ($this->form_validation->run() == FALSE) {
            // load view PROFILE dengan template admin
            $this->load->view('template/admin/header_admin_view', $data);
            $this->load->view('template/admin/sidebar_admin_view');
            $this->load->view('admin/edit_pemberitahuan_admin_view');
            $this->load->view('template/admin/control_admin_view');
            $this->load->view('template/admin/footer_admin_view');
        } else {
            $data_pemberitahuan_update = [
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'diubah_pada' => time(),
            ];

            if ($this->Pemberitahuan_model->updatePemberitahuan('id_pemberitahuan', $data_pemberitahuan_update, $id_pemberitahuan)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil mengupdate pemberitahuan</div>');

                redirect('admin/pemberitahuan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal mengupdate pemberitahuan</div>');

                redirect('admin/pemberitahuan');
            }
        }
    }

    // endpoint edit laporan by id
    public function editLaporan($id_laporan)
    {
        $data['title'] = "Edit Laporan";
        $data['menu'] = "laporan";
        $data['sub_menu'] = "semua_laporan";
        $data['sub_menu_action'] = "edit_laporan";

        // user data
        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);
        $data['laporan'] = $this->Laporan_model->getLaporan('id_laporan', $id_laporan);

        // form validation config ===============================
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('lat', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('lng', 'Longitude', 'required|trim');
        // ===============================

        if ($this->form_validation->run() == FALSE) {
            // load view PROFILE dengan template admin
            $this->load->view('template/admin/header_admin_view', $data);
            $this->load->view('template/admin/sidebar_admin_view');
            $this->load->view('admin/edit_laporan_admin_view');
            $this->load->view('template/admin/control_admin_view');
            $this->load->view('template/admin/footer_admin_view');
        } else {
            if ($_FILES['foto']['error'] != 4) {
                $image = $this->upload_image('foto', './assets/img/');
            } else {
                $image = $data['laporan']['foto_laporan'];
            }

            $data_pemberitahuan_update = [
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
                'lat' => htmlspecialchars($this->input->post('lat', true)),
                'lng' => htmlspecialchars($this->input->post('lng', true)),
                'foto' => $image,
                'diubah_pada' => time(),
            ];

            if ($this->Laporan_model->updateLaporan('id_laporan', $data_pemberitahuan_update, $id_laporan)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil mengupdate laporan</div>');

                redirect('admin/laporan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal mengupdate laporan</div>');

                redirect('admin/laporan');
            }
        }
    }

    // endpoint untuk users
    public function users($level = 'user')
    {
        $data['title'] = "Semua Pengguna";
        $data['menu'] = "pengguna";
        $data['sub_menu'] = 'semua_pengguna';
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);
        $data['count_admin'] = count($this->Auth_model->getUser('level', 1));
        $data['count_user'] = count($this->Auth_model->getUser('level', 2));
        $data['count_all_users'] = count($this->Auth_model->getUser('all'));

        if ($level == 'all') {
            $data['users'] = $this->Auth_model->getUser('all');
        } else if ($level == 'admin') {
            $data['users'] = $this->Auth_model->getUser('level', 1);
        } else if ($level == 'user') {
            $data['users'] = $this->Auth_model->getUser('level', 2);
        }


        // load view tambah user dengan template admin
        $this->load->view('template2/admin/header_admin_view', $data);
        $this->load->view('template2/admin/sidebar_admin_view');
        $this->load->view('admin/users_admin_view2');
        // $this->load->view('template/admin/control_admin_view');
        $this->load->view('template2/admin/footer_admin_view');
    }

    // endpoint untuk all pemberitahuan
    public function pemberitahuan()
    {
        $data['title'] = "Semua Pemberitahuan";
        $data['menu'] = "pemberitahuan";
        $data['sub_menu'] = 'semua_pemberitahuan';
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);
        $data['all_pemberitahuan'] = $this->Pemberitahuan_model->getPemberitahuan('all_for_web');

        // load view tambah user dengan template admin
        $this->load->view('template/admin/header_admin_view', $data);
        $this->load->view('template/admin/sidebar_admin_view');
        $this->load->view('admin/pemberitahuan_admin_view');
        $this->load->view('template/admin/control_admin_view');
        $this->load->view('template/admin/footer_admin_view');
    }

    // endpoint untuk all laporan
    public function laporan()
    {
        $data['title'] = "Semua Laporan";
        $data['menu'] = "laporan";
        $data['sub_menu'] = 'semua_laporan';
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);
        $data['all_laporan'] = $this->Laporan_model->getLaporan('all');


        // load view tambah user dengan template admin
        $this->load->view('template2/admin/header_admin_view', $data);
        $this->load->view('template2/admin/sidebar_admin_view');
        $this->load->view('admin/laporan_admin_view2');
        // $this->load->view('template2/admin/control_admin_view');
        $this->load->view('template2/admin/footer_admin_view');
    }

    // endpoint untuk detail laporan
    public function detail_laporan($id_laporan)
    {
        $data['title'] = "Semua Laporan";
        $data['menu'] = "laporan";
        $data['sub_menu'] = 'semua_laporan';
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);
        $data['detail_laporan'] = $this->Laporan_model->getLaporan('id_laporan', $id_laporan);

        // load view tambah user dengan template admin
        $this->load->view('template2/admin/header_admin_view', $data);
        $this->load->view('template2/admin/sidebar_admin_view');
        $this->load->view('admin/detail_laporan_admin_view');
        // $this->load->view('template2/admin/control_admin_view');
        $this->load->view('template2/admin/footer_admin_view');
    }

    // endpoint Tolak Pengaduan
    public function tolak_pengaduan($id = null)
    {
        $this->_sendWA_Tolak();
        $status = '3';
        $this->db->set('status', $status);
        $this->db->where('id_laporan', $id);
        $this->db->update('tb_laporan');

        redirect(site_url('Admin/laporan'));
    }

    // endpoint Terima Pengaduan
    public function terima_pengaduan($id = null)
    {
        $this->_sendWA();
        $status = '2';
        $this->db->set('status', $status);
        $this->db->where('id_laporan', $id);
        $this->db->update('tb_laporan');

        redirect(site_url('Admin/laporan'));
    }

    private function _sendWA()
    {
        $no_penerima = $this->uri->segment('4');

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($no_penerima))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($no_penerima), 0, 2) == '62') {
                $hp = trim($no_penerima);

                $curl = curl_init();
                $sender = "628984050435"; // nomor Server 
                $dest = $hp; // nomor tujuan, pake kode negara 
                $isiPesan = "Terimakasih sudah Memberikan Pelaporan Pengaduan Terhadap Unit Pelayanan Dinas Kab. Jember <br> Pengaduan Anda Sedang Dalam Proses Penyelesaian Oleh Dinas Terkait";

                curl_setopt_array($curl, array(

                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_URL => "https://whapi.io/api/send",
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\r\n  \"app\": {\r\n    \"id\": \"$sender\",\r\n    \"time\": \"1605326773\",\r\n    \"data\": {\r\n      \"recipient\": {\r\n        \"id\": \"$dest\"\r\n      },\r\n      \"message\": [\r\n        {\r\n          \"time\": \"1605326773\",\r\n          \"type\": \"text\",\r\n          \"value\": \"$isiPesan\"\r\n        }\r\n      ]\r\n    }\r\n  }\r\n}",
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: text/plain",
                        "Cookie: __cfduid=d424776e2d5021b158f1e64c99f2d7fce1604293254; ci_session=3b712ap59vc924a9o15j5rti70gif6k0"
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                echo $response;
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($no_penerima), 0, 1) == '0') {
                $hp = '62' . substr(trim($no_penerima), 1);

                $curl = curl_init();
                $sender = "628984050435"; // nomor Server 
                $dest = $hp; // nomor tujuan, pake kode negara 
                $isiPesan = "Terimakasih sudah Memberikan Pelaporan Pengaduan Terhadap Unit Pelayanan Dinas Kab. Jember <br> Pengaduan Anda Sedang Dalam Proses Penyelesaian Oleh Dinas Terkait";

                curl_setopt_array($curl, array(

                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_URL => "https://whapi.io/api/send",
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\r\n  \"app\": {\r\n    \"id\": \"$sender\",\r\n    \"time\": \"1605326773\",\r\n    \"data\": {\r\n      \"recipient\": {\r\n        \"id\": \"$dest\"\r\n      },\r\n      \"message\": [\r\n        {\r\n          \"time\": \"1605326773\",\r\n          \"type\": \"text\",\r\n          \"value\": \"$isiPesan\"\r\n        }\r\n      ]\r\n    }\r\n  }\r\n}",
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: text/plain",
                        "Cookie: __cfduid=d424776e2d5021b158f1e64c99f2d7fce1604293254; ci_session=3b712ap59vc924a9o15j5rti70gif6k0"
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                echo $response;
            }
        }
    }

    // Kirim Notif WA TOLAK Pengaduan
    private function _sendWA_Tolak()
    {
        $no_penerima = $this->uri->segment('4');

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($no_penerima))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($no_penerima), 0, 2) == '62') {
                $hp = trim($no_penerima);

                $curl = curl_init();
                $sender = "628984050435"; // nomor Server 
                $dest = $hp; // nomor tujuan, pake kode negara 
                $isiPesan = "Terimakasih sudah Memberikan Pelaporan Pengaduan Terhadap Unit Pelayanan Dinas Kab. Jember <br> Pengaduan Anda Kami Tolak dikarenakan informasi yang anda berikan Tidak Lengkap atau Valid. <br> *Pesan ini Dikirim Otomastis Oleh Sistem* ";

                curl_setopt_array($curl, array(

                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_URL => "https://whapi.io/api/send",
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\r\n  \"app\": {\r\n    \"id\": \"$sender\",\r\n    \"time\": \"1605326773\",\r\n    \"data\": {\r\n      \"recipient\": {\r\n        \"id\": \"$dest\"\r\n      },\r\n      \"message\": [\r\n        {\r\n          \"time\": \"1605326773\",\r\n          \"type\": \"text\",\r\n          \"value\": \"$isiPesan\"\r\n        }\r\n      ]\r\n    }\r\n  }\r\n}",
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: text/plain",
                        "Cookie: __cfduid=d424776e2d5021b158f1e64c99f2d7fce1604293254; ci_session=3b712ap59vc924a9o15j5rti70gif6k0"
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                echo $response;
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($no_penerima), 0, 1) == '0') {
                $hp = '62' . substr(trim($no_penerima), 1);

                $curl = curl_init();
                $sender = "628984050435"; // nomor Server 
                $dest = $hp; // nomor tujuan, pake kode negara 
                $isiPesan = "Terimakasih sudah Memberikan Pelaporan Pengaduan Terhadap Unit Pelayanan Dinas Kab. Jember <br> Pengaduan Anda Kami Tolak dikarenakan informasi yang anda berikan Tidak Lengkap atau Valid. <br> *Pesan ini Dikirim Otomastis Oleh Sistem* ";

                curl_setopt_array($curl, array(

                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_URL => "https://whapi.io/api/send",
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\r\n  \"app\": {\r\n    \"id\": \"$sender\",\r\n    \"time\": \"1605326773\",\r\n    \"data\": {\r\n      \"recipient\": {\r\n        \"id\": \"$dest\"\r\n      },\r\n      \"message\": [\r\n        {\r\n          \"time\": \"1605326773\",\r\n          \"type\": \"text\",\r\n          \"value\": \"$isiPesan\"\r\n        }\r\n      ]\r\n    }\r\n  }\r\n}",
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: text/plain",
                        "Cookie: __cfduid=d424776e2d5021b158f1e64c99f2d7fce1604293254; ci_session=3b712ap59vc924a9o15j5rti70gif6k0"
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                echo $response;
            }
        }
    }

    // endpoint deleteUser
    public function deleteUser($id_user)
    {
        // $data['user'] = $this->User_model->getUser($id_user, 'id_user');
        // ============================================        

        if ($this->Auth_model->deleteUser($id_user)) {
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus User</div>');

            redirect('admin/users');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus User</div>');

            redirect('admin/users');
        }
    }

    // endpoint delete pemberitahuan
    public function deletePemberitahuan($id_pemberitahuan)
    {
        if ($this->Pemberitahuan_model->deletePemberitahuan($id_pemberitahuan)) {
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus pemberitahuan</div>');

            redirect('admin/pemberitahuan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus pemberitahuan</div>');

            redirect('admin/pemberitahuan');
        }
    }

    // endpoint delete Laporan
    public function deleteLaporan($id_laporan)
    {
        if ($this->Laporan_model->deleteLaporan($id_laporan)) {
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus laporan</div>');

            redirect('admin/laporan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus laporan</div>');

            redirect('admin/laporan');
        }
    }

    // endpoint untuk menu all post
    public function allPost()
    {
        $this->load->model('Post_model');

        $data['title'] = "Semua Post";
        $data['menu'] = "informasi_kesehatan";
        $data['sub_menu'] = "semua_post";
        $data['sub_menu_action'] = "get_post";

        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata['id_user']);

        // post data
        $data['total_all_posts'] = $this->Post_model->countPosts();
        $data['total_published_posts'] = $this->Post_model->countPosts('1');
        $data['total_draft_posts'] = $this->Post_model->countPosts('0');

        // data posts
        if ($this->input->get('show')) {
            $show = $this->input->get('show');

            switch ($show) {
                case 'all':
                    $data['posts'] = $this->Post_model->getPostByPublished(null);
                    break;
                case 'published':
                    $data['posts'] = $this->Post_model->getPostByPublished('1');
                    break;
                case 'draft':
                    $data['posts'] = $this->Post_model->getPostByPublished('0');
                    break;
                default:
                    $data['posts'] = $this->Post_model->getPostByPublished(null);
                    break;
            }
        } else {
            $data['posts'] = $this->Post_model->getPostByPublished();;
        }

        // load view all post dengan template admin
        $this->load->view('template/admin/header_admin_view', $data);
        $this->load->view('template/admin/sidebar_admin_view');
        $this->load->view('admin/all_post_admin_view');
        $this->load->view('template/admin/control_admin_view');
        $this->load->view('template/admin/footer_admin_view');
    }

    // endpoint untuk hapus post
    public function deletePost($id_post)
    {
        $this->load->model('Post_model');

        // jika berhasil menghpaus post
        if ($this->Post_model->deletePostById($id_post)) {
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Post berhasil dihapus</div>');

            redirect('admin/allpost');
        } else {
            // jika gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Post gagal dihapus</div>');

            redirect('admin/allpost');
        }
    }

    // endpoint untuk edit post
    public function editPost($id_post)
    {
        // load library form validation
        $this->load->library('form_validation');
        // model post
        $this->load->model('Post_model');
        $this->load->model('Category_model');
        $this->load->model('Tag_model');

        $data['title'] = "Edit Post";
        $data['menu'] = "informasi_kesehatan";
        $data['sub_menu'] = "semua_post";
        $data['sub_menu_action'] = "edit_post";

        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata('id_user'));

        $data['post'] = $this->Post_model->getPostById($id_post);

        // data tag n category
        $data['categories'] = $this->Category_model->getAllCategories(true);
        $data['tags'] = $this->Tag_model->getAllTags(true);

        // validation forms        
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('body', 'Body', 'required|trim');
        $this->form_validation->set_rules('category', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('tags[]', 'Tags', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // load view edit Post dengan template admin
            $this->load->view('template/admin/header_admin_view', $data);
            $this->load->view('template/admin/sidebar_admin_view');
            $this->load->view('admin/editpost_admin_view');
            $this->load->view('template/admin/control_admin_view');
            $this->load->view('template/admin/footer_admin_view');
        } else {
            // aapakah dipublis atau tidak
            $published = 0;
            $date_published = null;

            // update thumbnail atatu tidak
            if ($_FILES['thumb']['error'] != 4) {
                $thumbnail = $this->upload_image('thumb', './assets/images/posts/');
            } else {
                $thumbnail = $data['post']['image'];
            }

            // var_dump($thumbnail); die;

            $title = $this->input->post('title');

            // buat slug
            $slug = url_title($title, 'dash', true);

            // mengisi tag
            $tag_item = $this->input->post('tags[]');
            $tags = '';
            // menjadikan semua tags menjadi satu
            foreach ($tag_item as $item) {
                $tags .= $item . ',';
            }
            $tags = rtrim($tags, ',');

            if ($this->input->post('publish') == 'true') {
                $published = 1;
                $date_published = date('Y-m-d', time());
            }

            // data untuk insert ke tabel post
            $data_post = [
                'id_user' => $this->session->userdata('id_user'),
                'title' => $title,
                'slug' => $slug,
                'image' => $thumbnail,
                'body' => $this->input->post('body'),
                'category' => $this->input->post('category'),
                'tags' => $tags,
                'published' => $published,
                'date_published' => $date_published,
                'updated_at' => time(),
            ];

            if ($this->Post_model->updatePostById($id_post, $data_post)) {
                if ($published == 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Post berhasil diupdate, disimpan sebagai draf</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Post berhasil diupdate, dan dipublish</div>');
                }

                redirect('admin/allpost');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal memproses post baru</div>');

                redirect('admin/allpost');
            }
        }
    }

    // endpoint untuk page new post
    public function newPost()
    {
        // load library form validation
        $this->load->library('form_validation');
        // model post
        $this->load->model('Post_model');
        $this->load->model('Category_model');
        $this->load->model('Tag_model');

        $data['title'] = "New Post";
        $data['menu'] = "informasi_kesehatan";
        $data['sub_menu'] = "tambah_post_baru";
        $data['sub_menu_action'] = null;

        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata('id_user'));

        // data tag n category
        $data['categories'] = $this->Category_model->getAllCategories(true);
        $data['tags'] = $this->Tag_model->getAllTags(true);

        // validation forms        
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('body', 'Body', 'required|trim');
        $this->form_validation->set_rules('category', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('tags[]', 'Tags', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // load view new post dengan template admin
            $this->load->view('template/admin/header_admin_view', $data);
            $this->load->view('template/admin/sidebar_admin_view');
            $this->load->view('admin/newpost_admin_view');
            $this->load->view('template/admin/control_admin_view');
            $this->load->view('template/admin/footer_admin_view');
        } else {
            // aapakah dipublis atau tidak
            $published = 0;
            $date_published = null;
            $thumbnail = $this->upload_image('thumb', './assets/images/posts/');
            $title = $this->input->post('title');

            // buat slug
            $slug = url_title($title, 'dash', true);

            // mengisi tag
            $tag_item = $this->input->post('tags[]');
            $tags = '';
            // menjadikan semua tags menjadi satu
            foreach ($tag_item as $item) {
                $tags .= $item . ',';
            }
            $tags = rtrim($tags, ',');

            if ($this->input->post('publish') == 'true') {
                $published = 1;
                $date_published = date('Y-m-d', time());
            }

            // data untuk insert ke tabel post
            $data_post = [
                'id_user' => $this->session->userdata('id_user'),
                'title' => $title,
                'slug' => $slug,
                'views' => 0,
                'image' => $thumbnail,
                'body' => $this->input->post('body'),
                'category' => $this->input->post('category'),
                'tags' => $tags,
                'published' => $published,
                'date_published' => $date_published,
                'created_at' => time(),
            ];

            if ($this->Post_model->insertNewPost($data_post)) {
                if ($published == 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Post berhasil disimpan</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Post berhasil dipublish</div>');
                }

                redirect('admin/newpost');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal memproses post baru</div>');

                redirect('admin/newpost');
            }
        }
    }

    // fungsi untuk endpoint kategori
    public function category($action = null, $id_category = null)
    {
        // load library form validation
        $this->load->library('form_validation');
        $this->load->model('Category_model');

        $data['title'] = "Kategori";
        $data['menu'] = "informasi_kesehatan";
        $data['sub_menu'] = "kategori";
        $data['sub_menu_action'] = "get_category";

        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata('id_user'));

        if ($action == 'delete') {
            if ($this->Category_model->deleteCategory($id_category)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus kategori</div>');
                redirect('admin/category');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus kategori</div>');
                redirect('admin/category');
            }
        }

        if ($this->input->post('update_category')) {
            $id_category = $this->input->post('id_category');

            $data_category = [
                'category' => $this->input->post('category'),
                'updated_at' => time(),
            ];

            if ($this->Category_model->updateCategoryById($id_category, $data_category)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil update kategori</div>');
                redirect('admin/category');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal update kategori</div>');
                redirect('admin/category');
            }
        }

        $data['categories'] = $this->Category_model->getAllCategories();

        // validation forms                
        $this->form_validation->set_rules('category', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // load view category dengan template admin
            $this->load->view('template/admin/header_admin_view', $data);
            $this->load->view('template/admin/sidebar_admin_view', $data);
            $this->load->view('admin/category_admin_view');
            $this->load->view('template/admin/control_admin_view', $data);
            $this->load->view('template/admin/footer_admin_view');
        } else {
            $data_category = [
                'category' => $this->input->post('category'),
                'created_at' => time(),
            ];

            if ($this->Category_model->insertCategory($data_category)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menambah kategori</div>');
                redirect('admin/category');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menambah kategori</div>');
                redirect('admin/category');
            }
        }
    }

    // fungsi untuk endpoint kategori
    public function tag($action = null, $id_tag = null)
    {
        // load library form validation
        $this->load->library('form_validation');
        $this->load->model('Tag_model');

        $data['title'] = "Tag";
        $data['menu'] = "informasi_kesehatan";
        $data['sub_menu'] = "tag";
        $data['sub_menu_action'] = "get_tag";

        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata('id_user'));

        if ($action == 'delete') {
            if ($this->Tag_model->deleteTag($id_tag)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus tag</div>');
                redirect('admin/tag');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus tag</div>');
                redirect('admin/tag');
            }
        }

        if ($this->input->post('update_tag')) {
            $id_tag = $this->input->post('id_tag');

            $data_tag = [
                'tag' => $this->input->post('tag'),
                'updated_at' => time(),
            ];

            if ($this->Tag_model->updateTagById($id_tag, $data_tag)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil update tag</div>');
                redirect('admin/tag');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal update tag</div>');
                redirect('admin/tag');
            }
        }

        $data['tags'] = $this->Tag_model->getAllTags();

        // validation forms                
        $this->form_validation->set_rules('tag', 'Tag', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // load view tag dengan template admin
            $this->load->view('template/admin/header_admin_view', $data);
            $this->load->view('template/admin/sidebar_admin_view');
            $this->load->view('admin/tag_admin_view');
            $this->load->view('template/admin/control_admin_view');
            $this->load->view('template/admin/footer_admin_view');
        } else {
            $data_tag = [
                'tag' => $this->input->post('tag'),
                'created_at' => time(),
            ];

            if ($this->Tag_model->insertTag($data_tag)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menambah tag</div>');
                redirect('admin/tag');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menambah tag</div>');
                redirect('admin/tag');
            }
        }
    }

    // endpoint all data remaja
    public function dataRemaja()
    {
        $this->load->model('RiwayatRemaja_model');

        $data['title'] = "Semua Data Remaja";
        $data['menu'] = "remaja";
        $data['sub_menu'] = 'semua_remaja';
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata['id_user']);
        $data['data_remaja'] = $this->RiwayatRemaja_model->getRiwayatRemaja('all');

        // load view tambah user dengan template admin
        $this->load->view('template/admin/header_admin_view', $data);
        $this->load->view('template/admin/sidebar_admin_view');
        $this->load->view('admin/data_remaja_admin_view');
        $this->load->view('template/admin/control_admin_view');
        $this->load->view('template/admin/footer_admin_view');
    }

    public function editdataremaja($id_riwayat_remaja)
    {
        $this->load->model('RiwayatRemaja_model');

        $data['title'] = "Edit Data Remaja";
        $data['menu'] = "remaja";
        $data['sub_menu'] = 'semua_remaja';
        $data['sub_menu_action'] = 'edit_remaja';
        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata['id_user']);
        $data['data_remaja'] = $this->RiwayatRemaja_model->getRiwayatRemaja('id_riwayat_remaja', $id_riwayat_remaja);

        // load view tambah user dengan template admin
        $this->load->view('template/admin/header_admin_view', $data);
        $this->load->view('template/admin/sidebar_admin_view');
        $this->load->view('admin/edit_remaja_admin_view');
        $this->load->view('template/admin/control_admin_view');
        $this->load->view('template/admin/footer_admin_view');
    }

    // simpan master data riwayat remaja
    public function updateRiwayatRemaja()
    {
        $this->load->model('RiwayatRemaja_model');

        if ($this->input->post('submit_button') == 'UPDATE DATA REMAJA') {
            $id_riwayat_remaja = $this->input->post('id_riwayat_remaja');

            $data_riwayat_remaja = [
                'id_user' => $this->input->post('id_user', true),
                'tb_user' => $this->input->post('tb_user', true),
                'bb_user' => $this->input->post('bb_user', true),
                'riwayat_anemia' => $this->input->post('riwayat_anemia', true),
                'riwayat_penyakit_user' => $this->input->post('riwayat_penyakit_user', true),
                'kadar_hb' => $this->input->post('kadar_hb', true),
                'tb_bapak' => $this->input->post('tb_bapak', true),
                'bb_bapak' => $this->input->post('bb_bapak', true),
                'tb_ibu' => $this->input->post('tb_ibu', true),
                'bb_ibu' => $this->input->post('bb_ibu', true),
                'riwayat_penyakit_bapak' => $this->input->post('riwayat_penyakit_bapak', true),
                'riwayat_penyakit_ibu' => $this->input->post('riwayat_penyakit_ibu', true),
                'pendidikan_bapak' => $this->input->post('pendidikan_bapak', true),
                'pendidikan_ibu' => $this->input->post('pendidikan_ibu', true),
                'pekerjaan_bapak' => $this->input->post('pekerjaan_bapak', true),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu', true),
                'pendapatan_bapak' => $this->input->post('pendapatan_bapak', true),
                'pendapatan_ibu' => $this->input->post('pendapatan_ibu', true),
                'jml_anggota_keluarga' => $this->input->post('jml_anggota_keluarga', true),
                'updated_at' => time()
            ];

            if ($this->RiwayatRemaja_model->updateRiwayatRemaja('id_riwayat_remaja', $id_riwayat_remaja, $data_riwayat_remaja)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil mengupdate data riwayat remaja</div>');

                redirect('admin/dataremaja');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal mengupdate data riwayat remaja</div>');

                redirect('admin/dataremaja');
            }
        }
    }

    public function deleteDataRemaja($id_riwayat_remaja)
    {
        $this->load->model('RiwayatRemaja_model');

        if ($this->RiwayatRemaja_model->deleteRiwayatRemaja('id_riwayat_remaja', $id_riwayat_remaja)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus data remaja</div>');

            redirect('admin/dataremaja');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus data remaja</div>');

            redirect('admin/dataremaja');
        }
    }

    // endpoint all data kehamilan
    public function dataKehamilan()
    {
        $this->load->model('RiwayatHamil_model');

        $data['title'] = "Semua Data Kehamilan";
        $data['menu'] = "kehamilan";
        $data['sub_menu'] = 'semua_kehamilan';
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata['id_user']);
        $data['data_kehamilan'] = $this->RiwayatHamil_model->getRiwayatHamil('all');

        // load view tambah user dengan template admin
        $this->load->view('template/admin/header_admin_view', $data);
        $this->load->view('template/admin/sidebar_admin_view');
        $this->load->view('admin/data_kehamilan_admin_view');
        $this->load->view('template/admin/control_admin_view');
        $this->load->view('template/admin/footer_admin_view');
    }

    public function editDataKehamilan($id_riwayat_hamil)
    {
        $this->load->model('RiwayatHamil_model');

        $data['title'] = "Edit Data Kehamilan";
        $data['menu'] = "kehamilan";
        $data['sub_menu'] = 'semua_kehamilan';
        $data['sub_menu_action'] = 'edit_kehamilan';
        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata['id_user']);
        $data['data_kehamilan'] = $this->RiwayatHamil_model->getRiwayatHamil('id_riwayat_hamil', $id_riwayat_hamil);

        // load view tambah user dengan template admin
        $this->load->view('template/admin/header_admin_view', $data);
        $this->load->view('template/admin/sidebar_admin_view');
        $this->load->view('admin/edit_kehamilan_admin_view');
        $this->load->view('template/admin/control_admin_view');
        $this->load->view('template/admin/footer_admin_view');
    }

    // update master data riwayat kehamilan
    public function updateRiwayatKehamilan()
    {
        $this->load->model('RiwayatHamil_model');

        if ($this->input->post('submit_button') == 'UPDATE DATA KEHAMILAN') {
            $id_riwayat_hamil = $this->input->post('id_riwayat_hamil');

            $data_riwayat_hamil = [
                'id_user' => $this->input->post('id_user'),
                'usia_kehamilan' => $this->input->post('usia_kehamilan', true),
                'jarak_persalinan' => $this->input->post('jarak_persalinan', true),
                'riwayat_penyakit_user' => $this->input->post('riwayat_penyakit_user', true),
                'kadar_hb' => $this->input->post('kadar_hb', true),
                'lila' => $this->input->post('lila', true),
                'jml_anggota_keluarga' => $this->input->post('jml_anggota_keluarga', true),
                'tb_suami' => $this->input->post('tb_suami', true),
                'bb_suami' => $this->input->post('bb_suami', true),
                'tb_istri' => $this->input->post('tb_istri', true),
                'bb_istri' => $this->input->post('bb_istri', true),
                'pendidikan_suami' => $this->input->post('pendidikan_suami', true),
                'pendidikan_istri' => $this->input->post('pendidikan_istri', true),
                'pekerjaan_suami' => $this->input->post('pekerjaan_suami', true),
                'pekerjaan_istri' => $this->input->post('pekerjaan_istri', true),
                'pendapatan_suami' => $this->input->post('pendapatan_suami', true),
                'pendapatan_istri' => $this->input->post('pendapatan_istri', true),
                'updated_at' => time(),
            ];

            if ($this->RiwayatHamil_model->updateRiwayatHamil('id_riwayat_hamil', $id_riwayat_hamil, $data_riwayat_hamil)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil mengupdate data riwayat hamil</div>');

                redirect('admin/datakehamilan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal mengupdate data riwayat hamil</div>');

                redirect('admin/datakehamilan');
            }
        }
    }

    public function deleteDataKehamilan($id_riwayat_hamil)
    {
        $this->load->model('RiwayatHamil_model');

        if ($this->RiwayatHamil_model->deleteRiwayatHamil('id_riwayat_hamil', $id_riwayat_hamil)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus data kehamilan</div>');

            redirect('admin/datakehamilan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus data kehamilan</div>');

            redirect('admin/datakehamilan');
        }
    }

    // endpoint all data remaja
    public function dataBayiBalita()
    {
        $this->load->model('BayiBalita_model');

        $data['title'] = "Semua Data Bayi Balita";
        $data['menu'] = "bayi_balita";
        $data['sub_menu'] = 'semua_bayi_balita';
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata['id_user']);
        $data['data_bayi_balita'] = $this->BayiBalita_model->getBayiBalita('all');

        // load view tambah user dengan template admin
        $this->load->view('template/admin/header_admin_view', $data);
        $this->load->view('template/admin/sidebar_admin_view');
        $this->load->view('admin/data_bayi_balita_admin_view');
        $this->load->view('template/admin/control_admin_view');
        $this->load->view('template/admin/footer_admin_view');
    }

    public function editDataBayiBalita($id_bayi_balita)
    {
        $this->load->model('BayiBalita_model');

        $data['title'] = "Edit Data Bayi Balita";
        $data['menu'] = "bayi_balita";
        $data['sub_menu'] = 'semua_bayi_balita';
        $data['sub_menu_action'] = 'edit_bayi_balita';
        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata['id_user']);
        $data['data_bayi_balita'] = $this->BayiBalita_model->getBayiBalita('id_bayi_balita', $id_bayi_balita);

        // load view tambah user dengan template admin
        $this->load->view('template/admin/header_admin_view', $data);
        $this->load->view('template/admin/sidebar_admin_view');
        $this->load->view('admin/edit_bayi_balita_admin_view');
        $this->load->view('template/admin/control_admin_view');
        $this->load->view('template/admin/footer_admin_view');
    }

    public function updateBayiBalita()
    {
        $this->load->model('BayiBalita_model');

        if ($this->input->post('submit_button') == 'UPDATE DATA BAYI BALITA') {
            $id_bayi_balita = $this->input->post('id_bayi_balita');

            // penyakit penyerta
            if ($this->input->post('penyakit_penyerta') == 'Lainnya') {
                $penyakitPenyerta = $this->input->post('penyakit_penyerta_lainnya');
            } else {
                $penyakitPenyerta = $this->input->post('penyakit_penyerta');
            }

            // riwayat penyakit
            if ($this->input->post('riwayat_penyakit') == 'Lainnya') {
                $riwayatPenyakit = $this->input->post('riwayat_penyakit_lainnya');
            } else {
                $riwayatPenyakit = $this->input->post('riwayat_penyakit');
            }

            // riwayat penyakit
            if ($this->input->post('asi_eksklusif') == 'YA') {
                $lamaAsi = $this->input->post('lama_asi');
            } else {
                $lamaAsi = null;
            }

            $data_bayi_balita = [
                'id_user' => $this->input->post('id_user'),
                'usia_bayi' => $this->input->post('usia_bayi', true),
                'bb_bayi' => $this->input->post('bb_bayi', true),
                'tb_bayi' => $this->input->post('tb_bayi', true),
                'tb_ayah' => $this->input->post('tb_ayah', true),
                'tb_ibu' => $this->input->post('tb_ibu', true),
                'bb_bayi_lahir' => $this->input->post('bb_bayi_lahir', true),
                'tb_bayi_lahir' => $this->input->post('tb_bayi_lahir', true),
                'usia_kandungan_lahir' => $this->input->post('usia_kandungan_lahir', true),
                'asi_eksklusif' => $this->input->post('asi_eksklusif', true),
                'mp_asi' => $this->input->post('mp_asi', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'lama_asi' => $lamaAsi,
                'penyakit_penyerta' => $penyakitPenyerta,
                'riwayat_penyakit' => $riwayatPenyakit,
                'updated_at' => time(),
            ];

            if ($this->BayiBalita_model->updateBayiBalita('id_bayi_balita', $id_bayi_balita, $data_bayi_balita)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil mengupdate data bayi balita</div>');

                redirect('admin/databayibalita');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal mengupdate data bayi balita</div>');

                redirect('admin/databayibalita');
            }
        }
    }

    public function deleteDataBayiBalita($id_bayi_balita)
    {
        $this->load->model('BayiBalita_model');

        if ($this->BayiBalita_model->deletBayiBalita('id_bayi_balita', $id_bayi_balita)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus data bayi balita</div>');

            redirect('admin/databayibalita');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus data bayi balita</div>');

            redirect('admin/databayibalita');
        }
    }

    // endpoint stunting info
    public function stunting($action = null, $id_tag = null)
    {
        // load library form validation
        $this->load->library('form_validation');
        $this->load->model('Stunting_model');

        $data['title'] = "Info Stunting";
        $data['menu'] = "pengaturan";
        $data['sub_menu'] = "info_stunting";
        $data['sub_menu_action'] = "get_stunting";

        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata('id_user'));

        if ($action == 'delete') {
            if ($this->Stunting_model->deleteStunting($id_tag)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus info stunting</div>');
                redirect('admin/stunting');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus info stunting</div>');
                redirect('admin/stunting');
            }
        }

        if ($this->input->post('update_stunting')) {
            $id_stunting = $this->input->post('id_stunting');

            $data_stunting = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'updated_at' => time(),
            ];

            if ($this->Stunting_model->updateStunting($id_stunting, $data_stunting)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil update info stunting</div>');
                redirect('admin/stunting');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal update info stunting</div>');
                redirect('admin/stunting');
            }
        }

        $data['stunting'] = $this->Stunting_model->getAllStuntingInfo();

        // validation forms                
        $this->form_validation->set_rules('title', 'title', 'required|trim');
        $this->form_validation->set_rules('description', 'description', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // load view tag dengan template admin
            $this->load->view('template/admin/header_admin_view', $data);
            $this->load->view('template/admin/sidebar_admin_view');
            $this->load->view('admin/stunting_admin_view');
            $this->load->view('template/admin/control_admin_view');
            $this->load->view('template/admin/footer_admin_view');
        } else {
            $data_stunting = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'created_at' => time(),
            ];

            if ($this->Stunting_model->insertStunting($data_stunting)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menambah info stunting</div>');
                redirect('admin/stunting');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menambah info stunting</div>');
                redirect('admin/stunting');
            }
        }
    }

    // endpoint untuk informasi website
    public function informasiWebsite()
    {
        $this->load->model('Site_model');

        // handle update site info
        if ($this->input->post('update_info')) {
            $data_info = [
                'title' => $this->input->post('title'),
                'short_title' => $this->input->post('short_title'),
                'short_title' => $this->input->post('short_title'),
                'description' => $this->input->post('description'),
                'keywords' => $this->input->post('keywords'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'twitter' => $this->input->post('twitter'),
                'facebook' => $this->input->post('facebook'),
                'instagram' => $this->input->post('instagram'),
                'linkedin' => $this->input->post('linkedin'),
                'updated_at' => time(),
            ];

            if ($this->Site_model->updateSiteInfo($data_info)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil update informasi website</div>');
                redirect('admin/informasiwebsite');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal update informasi website</div>');
                redirect('admin/informasiwebsite');
            }
        }

        $data['site'] = $this->Site_model->getSiteInfo();

        // handle update logo
        if ($this->input->post('update_logo')) {
            // var_dump($_FILES['logo']); die;

            // update logo atatu tidak
            if ($_FILES['logo']['error'] != 4) {
                $logo = $this->upload_image('logo', './assets/images/others/');
            } else {
                $logo = $data['site']['logo'];
            }

            $data_info = [
                'logo' => $logo
            ];

            if ($this->Site_model->updateSiteInfo($data_info)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil update logo</div>');
                redirect('admin/informasiwebsite');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal update logo</div>');
                redirect('admin/informasiwebsite');
            }
        }

        $data['title'] = "Informasi Website";
        $data['menu'] = "pengaturan";
        $data['sub_menu'] = "informasi_website";
        $data['sub_menu_action'] = "get_info";

        // user data
        $data['user'] = $this->User_model->getUserById($this->session->userdata('id_user'));

        // load view informasi website dengan template admin
        $this->load->view('template/admin/header_admin_view', $data);
        $this->load->view('template/admin/sidebar_admin_view');
        $this->load->view('admin/informasi_website_admin_view');
        $this->load->view('template/admin/control_admin_view');
        $this->load->view('template/admin/footer_admin_view');
    }

    // endpoint untuk page profil
    public function profil()
    {
        $data['title'] = "Profil";
        $data['menu'] = "pengaturan";
        $data['sub_menu'] = "profil";
        $data['sub_menu_action'] = null;

        $data['user'] = $this->Auth_model->getUser('id_user', $this->session->userdata['id_user']);

        // validation config
        if ($this->input->post('update_action') == 'profile') {
            // config edit profil
            $this->form_validation->set_rules('username', 'username', 'required|trim|max_length[50]');
            $this->form_validation->set_rules('alamat', 'alamat', 'required|trim|max_length[100]');
            $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim|max_length[10]');
            $this->form_validation->set_rules('telepon', 'telepon', 'required|trim|max_length[15]|numeric');
            $this->form_validation->set_rules('nik', 'nik', 'required|trim|max_length[20]|numeric');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[100]');
        } else {
            $this->form_validation->set_rules('password_lama', 'Password', 'required|trim|max_length[20]');
            $this->form_validation->set_rules('password_baru', 'Password', 'required|trim|max_length[20]|min_length[6]');
            $this->form_validation->set_rules('password_baru', 'Password', 'required|trim|max_length[20]|min_length[6]|matches[password_baru]');
        }

        if ($this->form_validation->run() == FALSE) {
            // load view PROFILE dengan template            
            $this->load->view('template/admin/header_admin_view', $data);
            $this->load->view('template/admin/sidebar_admin_view');
            $this->load->view('admin/profil_admin_view');
            $this->load->view('template/admin/control_admin_view');
            $this->load->view('template/admin/footer_admin_view');
        } else {
            // cek apakah ada aksi rubah profil
            if ($this->input->post('update_action') == 'profile') {
                // update thumbnail atatu tidak
                if ($_FILES['foto']['error'] != 4) {
                    $image = $this->upload_image('foto', './assets/img/');
                } else {
                    $image = $data['user']['foto'];
                }

                $data_user_update = [
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'alamat' => strtoupper(htmlspecialchars($this->input->post('alamat', true))),
                    'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                    'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                    'nik' => htmlspecialchars($this->input->post('nik', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'foto' => $image,
                    'diubah_pada' => time(),
                ];

                if ($this->Auth_model->updateUser('id_user', $data_user_update, $this->session->userdata('id_user'))) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil mengupdate profil</div>');

                    redirect('admin/profil');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal mengupdate profil</div>');

                    redirect('admin/profil');
                }
            } else {
                $password_lama = htmlspecialchars($this->input->post('password_lama', true));
                $password_baru = htmlspecialchars($this->input->post('password_baru', true));
                $password_baru_ver = htmlspecialchars($this->input->post('password_baru_ver', true));

                if (password_verify($password_lama, $data['user']['password'])) {
                    if ($password_baru !== $password_baru_ver) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Konfirmasi password tidak sesuai</div>');

                        redirect('admin/profil');
                    }

                    $password_baru_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $data_password = [
                        'password' => $password_baru_hash,
                        'diubah_pada' => time(),
                    ];

                    if ($this->Auth_model->updateUser('id_user', $data_password, $this->session->userdata('id_user'))) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil mengupdate password</div>');

                        redirect('admin/profil');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal mengupdate password</div>');

                        redirect('admin/profil');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password lama salah</div>');

                    redirect('admin/profil');
                }
            }
        }
    }

    // fungsi lainnya =======================================================================

    // fungsi untuk ajax
    public function ajax()
    {
        $ajax_menu = $this->input->post('ajax_menu');

        // ajax edit category
        if ($ajax_menu == 'edit_category') {
            $this->load->model('Category_model');

            $id_category = $this->input->post('id_category');

            $data['category'] = $this->Category_model->getCategoryById($id_category);

            $this->load->view('admin/ajax/edit_category_view', $data);
        }
        // ajax edit tag
        if ($ajax_menu == 'edit_tag') {
            $this->load->model('Tag_model');

            $id_tag = $this->input->post('id_tag');

            $data['tag'] = $this->Tag_model->getTagById($id_tag);

            $this->load->view('admin/ajax/edit_tag_view', $data);
        }
        // ajax edit stunting
        if ($ajax_menu == 'edit_stunting') {
            $this->load->model('Stunting_model');

            $id_stunting = $this->input->post('id_stunting');

            $data['stunting'] = $this->Stunting_model->getStunting($id_stunting);

            $this->load->view('admin/ajax/edit_stunting_view', $data);
        }
    }

    // fungsi untuk upload image
    private function upload_image($name, $address)
    {
        $this->load->library('upload');
        // ./assets/images/
        $config['upload_path'] = $address; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $config['max_size'] = 10000;

        $this->upload->initialize($config);

        if (!empty($_FILES[$name]['name'])) {

            if ($this->upload->do_upload($name)) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $address . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '80%';
                $config['width'] = 1024;
                $config['height'] = 800;
                $config['new_image'] = $address . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];

                return $gambar;
            } else {
                echo "gagal upload";
            }
        } else {
            return 'no-image.jpg';
        }
    }
}
