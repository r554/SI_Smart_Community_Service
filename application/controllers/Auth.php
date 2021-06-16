<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        $this->load->model('Auth_model');
        $this->load->model('Token_model');
    }

    // login method/page
    public function index()
    {
        // untuk memverifikasi sesi login
        verifyAccess(true);

        $data['title'] = 'Login';

        // validation forms        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // load view login dengan template auth
            $this->load->view('template/auth/header_auth_view', $data);
            $this->load->view('auth/login_view');
            $this->load->view('template/auth/footer_auth_view');
        } else {
            // mengambil input form login
            $email = htmlspecialchars($this->input->post('email', true));
            $password = htmlspecialchars($this->input->post('password'));

            // get user by email
            $data_user = $this->Auth_model->getUser('email', $email);

            // jika ada user
            if ($data_user) {
                // cek apakah user aktif

                // cek password
                if (password_verify($password, $data_user['password'])) {
                    // cek role user
                    // lalu redirect ke aplikasi
                    if ($data_user['level'] == 1) {
                        // data untuk session
                        $session_data = [
                            'id_user' => $data_user['id_user'],
                            'email' => $data_user['email'],
                            'level' => $data_user['level'],
                        ];

                        // data untuk login history
                        $login_history = [
                            'id_user' => $data_user['id_user'],
                            // 'os' => getOS(),
                            // 'browser' => getBrowser(),
                            // 'ip' => getUserIP(),
                            'created_at' => time(),
                        ];

                        // menyimpan session login
                        $this->session->set_userdata($session_data);

                        // menyimpan riwayat login
                        $this->Auth_model->saveLoginLog($login_history);

                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Hanya admin yang dapat mengakses sistem ini.</div>');
                        redirect('login');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password salah.</div>');

                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email tidak terdaftar</div>');

                redirect('login');
            }
        }
    }

    public function forgotPassword()
    {
        // untuk memverifikasi sesi login
        verifyAccess(true);

        $data['title'] = 'Forgot Password';

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if (!$this->form_validation->run()) {
            $this->load->view('template/auth/header_auth_view', $data);
            $this->load->view('auth/forgotpassword_view');
            $this->load->view('template/auth/footer_auth_view');
        } else {
            $email = htmlspecialchars($this->input->post('email', true));

            // get data user
            $data_user = $this->Auth_model->getUser('email', $email);

            // cek apakah email terdaftar
            if (!$data_user) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email tidak terdaftar.</div>');

                redirect('forgotpassword');
            }

            $token = uniqid(true);

            // data untuk di insert
            $data_token = [
                'id_user' => $data_user['id_user'],
                'token' => $token,
                'dibuat_pada' => time(),
            ];

            // mendaftarkan token
            $this->Token_model->registerNewToken($data_token);

            // data untuk ditampilkan pada email
            $data['title'] = 'Recovery Password Akun PELAPORAN APP';
            $data['heading'] = 'Recovery Password Akun PELAPORAN APP';
            $data['body'] = 'Silahkan klik tombol dibawah untuk mereset password akun anda yang terdaftar dengan email: ' . $email . '.';
            $data['url'] = base_url() . 'recoverpassword?email=' . $email . '&token=' . $token;
            $data['button'] = 'Recover Password';

            // cek hika berhasil mengirim email aktivasi
            if ($this->_sendEmail($email, $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email untuk melakukan recovery password telah dikirim ke ' . $email . '.</div>');

                redirect('forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email tidak terdaftar.</div>');

                redirect('forgotpassword');
            }
        }
    }

    // endpoint untuk recover password
    public function recoverpassword()
    {
        // untuk memverifikasi sesi login
        verifyAccess(true);
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $data['title'] = "Recover Password";
        $data['email'] = $email;

        // validation forms        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('confpassword', 'Confirmation Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // get data user dan token
            $data_user = $this->Auth_model->getUser('email', $email);
            $data_token = $this->Token_model->getTokenByToken($token);

            // jika tidak ada email dan token valid maka tampil pesan error
            if (!$data_user) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email tidak terdaftar.</div>');

                redirect('login');
            }

            if (!$data_token) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Token tidak valid.</div>');

                redirect('login');
            }

            // load view recover password dengan template auth
            $this->load->view('template/auth/header_auth_view', $data);
            $this->load->view('auth/recoverpassword_view');
            $this->load->view('template/auth/footer_auth_view');
        } else {
            $email = htmlspecialchars($this->input->post('email', true));
            $password = password_hash(htmlspecialchars($this->input->post('password', true)), PASSWORD_DEFAULT);

            // data untuk update password user
            $data_user = [
                'password' => $password,
            ];

            // update password user
            if ($this->Auth_model->updateUser('email', $data_user, $email)) {
                // menghapus token
                $this->Token_model->deleteTokenByToken($token);

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil memperbarui password dari akun: ' . $email . '.</div>');

                redirect('login');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal memperbarui password. Terjadi kesalahan.</div>');

                redirect('login');
            }
        }
    }

    // fungsi untuk logout
    public function logout()
    {
        // unset session login
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Anda telah berhasil Log Out</div>');

        redirect('login');
    }

    // fungsi proses send email
    private function _sendEmail($email, $data)
    {
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'step-ap.online',
            'smtp_user'     => 'admin@step-ap.online',
            'smtp_pass'     => 'Stepapon@2020',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'smtp_crypto'   => 'ssl',
            'crlf'          => "\r\n",
            'newline'       => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('admin-no-reply@pelaporan.com', 'PELAPORAN APP');
        $this->email->to($email);

        $message = $this->load->view('email/email_view.php', $data, true);

        $this->email->subject($data['heading']);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            return false;
        }
    }
}
