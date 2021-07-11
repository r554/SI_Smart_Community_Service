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
class History extends CI_Controller
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
    public function index_get(){
        $table = $this->get('table');
        $id_user = $this->get('id_user');
        $status = $this->get('status');

        $data = $this->Laporan_model->indexPengguna($table,$id_user,$status);
        if ($data) {
            $this->response([
                'status' => TRUE,
                'data' => $data,
            ],200);
        }else {
            $this->response([
                'status' => FALSE,
                'message' => 'Tidak Ada History'
            ], 401);
        }
    }
}
?>