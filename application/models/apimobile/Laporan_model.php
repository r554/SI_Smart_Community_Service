<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {    
    
public function indexPengguna($table ,$id_user,$status){
        return $this->db->query("SELECT p.* , u.id_user, u.username FROM tb_laporan p , tb_user u WHERE p.id_user = u.id_user AND p.Status =$status  AND  p.id_user = '$id_user' GROUP BY p.id_user")->result_array();
    }
    
    
    public function getDetail_Surat($id ,$column , $tb_surat){
        return $this->db->query("SELECT s.* , t.rt , w.rw FROM $tb_surat s, tb_rt t, tb_rw w WHERE $column = '$id' AND s.Id_rw = w.Id_rw AND s.Id_rt = t.Id_rt AND t.Id_rw = w.Id_rw")->row();
    }

    public function insertLaporan($data) {
        return $this->db->insert('tb_laporan', $data);
    }

    public function updateLaporan($tipe = 'id_laporan', $data, $param) {
        if ($tipe == 'id_laporan') {
            return $this->db->update('tb_laporan', $data, ['id_laporan' => $param]);
        }
    }

    
    public function getLaporan($tipe, $param = NULL, $limit = NULL){
        if ($limit != NULL) {
            $this->db->limit($limit);            
        }

        if ($tipe == 'id_user') {
            return $this->db->get_where('tb_laporan', ['id_user' => $param])->result_array();
        }
        
        if ($tipe == 'all'){
            $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah , tb_laporan.status AS status');
            $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
            $this->db->order_by('id_laporan', 'DESC');
            return $this->db->get('tb_laporan')->result_array();
        }
        if ($tipe == 'wilayah'){
            $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah, tb_laporan.status AS status');
            $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
            $this->db->like('tb_laporan.alamat', $param);
            $this->db->order_by('id_laporan', 'DESC');
            return $this->db->get('tb_laporan')->result_array();
        }


        if ($tipe == 'id_laporan'){
            $this->db->select("tb_user.username, tb_laporan.*, tb_user.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.foto AS foto_laporan, tb_laporan.status AS status");
            $this->db->from('tb_laporan');
            $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
            $this->db->where('id_laporan', $param);
            return $this->db->get()->row_array();
        }

        if ($tipe == 'id_penerima'){
            $this->db->order_by('id_laporan', 'DESC');
            return $this->db->get_where('tb_laporan', ['id_penerima' => $param])->result_array();
        }
    }

    public function deleteLaporan($param){
        return $this->db->delete('tb_laporan', ['id_laporan' => $param]);
    }


}