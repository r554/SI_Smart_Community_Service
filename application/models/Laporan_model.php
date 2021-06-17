<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public function insertLaporan($data)
    {
        return $this->db->insert('tb_laporan', $data);
    }

    public function updateLaporan($tipe = 'id_laporan', $data, $param)
    {
        if ($tipe == 'id_laporan') {
            return $this->db->update('tb_laporan', $data, ['id_laporan' => $param]);
        }
    }

    public function getLaporan($tipe, $param = NULL, $limit = NULL)
    {
        if ($limit != NULL) {
            $this->db->limit($limit);
        }

        if ($tipe == 'id_user') {
            return $this->db->get_where('tb_laporan', ['id_user' => $param])->result_array();
        }

        if ($tipe == 'all') {
            $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah');
            $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
            $this->db->order_by('id_laporan', 'DESC');
            return $this->db->get('tb_laporan')->result_array();
        }

        if ($tipe == 'wilayah') {
            $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah');
            $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
            $this->db->like('tb_laporan.alamat', $param);
            $this->db->order_by('id_laporan', 'DESC');
            return $this->db->get('tb_laporan')->result_array();
        }

        if ($tipe == 'id_laporan') {
            //$this->db->select("tb_user.username, tb_laporan.*, tb_user.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.foto AS foto_laporan");
            $this->db->from('tb_laporan');
            $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
            $this->db->where('id_laporan', $param);
            return $this->db->get()->row_array();
        }

        if ($tipe == 'id_penerima') {
            $this->db->order_by('id_laporan', 'DESC');
            return $this->db->get_where('tb_laporan', ['id_penerima' => $param])->result_array();
        }
    }

    public function deleteLaporan($param)
    {
        return $this->db->delete('tb_laporan', ['id_laporan' => $param]);
    }
}
