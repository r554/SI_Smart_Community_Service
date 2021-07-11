<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function getUserByNIK($nik)
    {
        return $this->db->get_where('tb_user', ['nik' => $nik])->row_array();
    }

    public function insertUser($data)
    {
        return $this->db->insert('tb_user', $data);
    }

    public function insertLaporan($data)
    {
        return $this->db->insert('tb_user', $data);
    }

    public function getUser($tipe, $param = NULL, $limit = NULL)
    {
        $this->db->order_by('id_user', 'DESC');

        if ($limit != NULL) {
            $this->db->limit($limit);  
        }

        if ($tipe == 'all') {
            return $this->db->get('tb_user')->result_array();
        }

        if ($tipe == 'all_for_web') {
            $this->db->select('tb_user.*, tb_user.dibuat_pada AS user_dibuat, tb_user.diubah_pada AS user_diubah, COUNT(tb_laporan.id_laporan) AS total_laporan');
            $this->db->from('tb_user');
            $this->db->join('tb_laporan', 'tb_laporan.id_user = tb_user.id_user');            
            $this->db->group_by('tb_user.id_user');
            return $this->db->get()->result_array();
        }

        if ($tipe == 'id_user') {
            return $this->db->get_where('tb_user', ['id_user' => $param])->row_array();
        }
        
        if ($tipe == 'nik') {
            return $this->db->get_where('tb_user', ['nik' => $param])->row_array();
        }

        if ($tipe == 'level') {
            return $this->db->get_where('tb_user', ['level' => $param])->result_array();
        }
    }

    public function updateUser($tipe, $data, $param)
    {
        if ($tipe == 'id_user') {
            return $this->db->update('tb_user', $data, ['id_user' => $param]);
        }

        if ($tipe == 'nik') {
            return $this->db->update('tb_user', $data, ['nik' => $param]);
        }
    }

    public function deleteUser($param)
    {
        return $this->db->delete('tb_user', ['id_user' => $param]);
    }

    public function saveLoginLog($data)
    {
        return $this->db->insert('tb_login', $data);
    }
}
