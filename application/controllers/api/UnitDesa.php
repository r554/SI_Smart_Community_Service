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
class UnitDesa extends CI_Controller
{
    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();

        $this->load->model('Auth_model');

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

public function index_get()
  {
    $data = $this->db->query("SELECT * FROM unit_desa")->result_array();
    if ($data) {
      $response = [
        'status' => true,
        'data' => $data,
      ];
      $this->response($response, 200);
    } else {
      $response = [
        'status' => true,
        'pesan' => 'Unit Desa Tidak Tersedia',
      ];
      $this->response($response, 400);
    }
  }
  public function index_post()
  {
    $id = $this->input->post('id_unit');
    $data = $this->db->query("SELECT * FROM unit_desa WHERE id_unit= '$id'")->row_array();
    if ($data) {
      $response = [
        'status' => true,
        'data' => $data,
      ];
      $this->response($response, 200);
    } else {
      $response = [
        'status' => true,
        'pesan' => 'Unit Desa Tidak Tersedia',
      ];
      $this->response($response, 400);
    }
  }
    
}
