<?php

class Login_model extends CI_Model
{
    // insert riwayat login
    public function insertLoginHistory($data){
        return $this->db->insert('tb_login', $data);
    }

    // get latest login with LIMIT
    public function getLatestLoginWithLimit($limit){
        $this->db->select("tb_user.username, tb_user.foto, tb_user.level, tb_login.*, FROM_UNIXTIME(tb_login.created_at, '%Y %M %d %H:%i') AS login_time");
        $this->db->from('tb_login');
        $this->db->join('tb_user', 'tb_user.id_user = tb_login.id_user');
        $this->db->limit($limit);
        $this->db->order_by('tb_login.created_at', 'DESC');

        return $this->db->get()->result_object();
    }
}