<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemberitahuan_model extends CI_Model
{

    // public function getUserByEmail($email){
    //     return $this->db->get_where('tb_user', ['email' => $email])->row_array();
    // }

    // public function insertUser($data) {
    //     return $this->db->insert('tb_user', $data);
    // }

    public function insertPemberitahuan($data)
    {
        return $this->db->insert('tb_pemberitahuan', $data);
    }

    public function updatePemberitahuan($tipe = 'id_pemberitahuan', $data, $param) {
        if ($tipe == 'id_pemberitahuan') {
            return $this->db->update('tb_pemberitahuan', $data, ['id_pemberitahuan' => $param]);            
        }

        if ($tipe == 'id_user') {
            return $this->db->update('tb_pemberitahuan', $data, ['id_user' => $param]);            
        }

        if ($tipe == 'id_penerima') {
            return $this->db->update('tb_pemberitahuan', $data, ['id_penerima' => $param]);            
        }
    }

    public function getPemberitahuan($tipe, $param = NULL)
    {
        $this->db->order_by('id_pemberitahuan', 'DESC');

        if ($tipe == 'all') {            
            return $this->db->get('tb_pemberitahuan')->result_array();
        }

        if ($tipe == 'all_for_web') {
            $this->db->select('tb_user.*, tb_pemberitahuan.*, tb_pemberitahuan.dibuat_pada AS laporan_dibuat, tb_pemberitahuan.diubah_pada AS laporan_diubah');
            $this->db->join('tb_user', 'tb_user.id_user = tb_pemberitahuan.id_user');
            return $this->db->get('tb_pemberitahuan')->result_array();
        }

        if ($tipe == 'id_pemberitahuan') {
            $this->db->select("tb_user.username, tb_pemberitahuan.*, tb_user.*, tb_pemberitahuan.dibuat_pada AS pemberitahuan_dibuat");
            $this->db->from('tb_pemberitahuan');
            $this->db->join('tb_user', 'tb_user.id_user = tb_pemberitahuan.id_user');
            $this->db->where('id_pemberitahuan', $param);
            return $this->db->get()->row_array();            
        }

        if ($tipe == 'id_penerima') {
            return $this->db->get_where('tb_pemberitahuan', ['id_penerima' => $param])->result_array();
        }

        if ($tipe == 'id_penerima_not_readed') {
            $this->db->where('dibaca', 2);
            return $this->db->get_where('tb_pemberitahuan', ['id_penerima' => $param])->result_array();
        }

        if ($tipe == 'id_user') {
            return $this->db->get_where('tb_pemberitahuan', ['id_user' => $param])->result_array();
        }
    }

    public function deletePemberitahuan($param)
    {
        return $this->db->delete('tb_pemberitahuan', ['id_pemberitahuan' => $param]);
    }
}
