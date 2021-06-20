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

        if ($tipe == 'id_dinas') {
            return $this->db->get_where('tb_laporan', ['id_dinas' => $param])->result_array();
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

    // ================================== Pengaduan Masuk ========================================

    public function getPengaduanMasuk()
    {
        $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah');
        $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
        $this->db->order_by('id_laporan', 'DESC');
        // return $this->db->get('tb_laporan')->result_array();
        return $this->db->get_where('tb_laporan', ['status' => 1])->result_array();
    }

    // ================================== Pengaduan Masuk ========================================



    // ================================== Memvalidasi Pengaduan ========================================
    public function getValidasiPengaduan()
    {
        $search = array('2', '3', '4');
        $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah');
        $this->db->from('tb_laporan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
        $this->db->order_by('id_laporan', 'DESC');
        $this->db->where_in('status', $search);
        return $query = $this->db->get()->result_array();
        // return $this->db->get('tb_laporan')->result_array();
        // return $this->db->get_where('tb_laporan', ['status' => $search])->result_array();

        // $search = array('sidoarjo', 'surabaya', 'malang');
        // $this->db->select('*');
        // $this->db->from('tb_siswa');
        // $this->db->where_in('tempat_lahir', $search);
        // $query = $this->db->get();
    }
    // ================================== Memvalidasi Pengaduan ========================================


    // ================================== Pengaduan Diproses ========================================
    public function getPengaduanDiproses()
    {
        $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah');
        $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
        $this->db->order_by('id_laporan', 'DESC');
        // return $this->db->get('tb_laporan')->result_array();
        return $this->db->get_where('tb_laporan', ['status' => 5])->result_array();
    }
    // ================================== Pengaduan Diproses ========================================


    // ================================== Pengaduan Dibatalkan ========================================
    public function getPengaduanDibatalkan()
    {
        $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah');
        $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
        $this->db->order_by('id_laporan', 'DESC');
        // return $this->db->get('tb_laporan')->result_array();
        return $this->db->get_where('tb_laporan', ['status' => 7])->result_array();
    }
    // ================================== Pengaduan Dibatalkan ========================================


    // ================================== Pengaduan Selesai ========================================
    public function getPengaduanSelesai()
    {
        $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah');
        $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
        $this->db->order_by('id_laporan', 'DESC');
        // return $this->db->get('tb_laporan')->result_array();
        return $this->db->get_where('tb_laporan', ['status' => 6])->result_array();
    }

    public function getLaporanDetailPengaduan($id)
    {
        $this->db->select('*');
        $this->db->from('tb_detail_laporan');
        // return $this->db->get('tb_laporan')->result_array();
        $this->db->where('tb_detail_laporan.id_laporan', $id);
        return $query = $this->db->get()->result_array();
        // return $this->db->get_where('tb_detail_laporan', ['id_laporan' => $id])->result_array();
    }
    // ================================== Pengaduan Selesai ========================================






    // ================================== SESI DINAS ========================================
    public function getPengaduanMasukByDinas($id_dinas)
    {
        $search = array('2', '3', '4');
        $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah');
        $this->db->from('tb_laporan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
        $this->db->order_by('id_laporan', 'DESC');
        $this->db->where('tb_laporan.id_dinas', $id_dinas);
        $this->db->where_in('status', $search);
        return $query = $this->db->get()->result_array();
    }

    public function getTindakLanjutByDinas($id_dinas)
    {

        $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah');
        $this->db->from('tb_laporan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
        $this->db->order_by('id_laporan', 'DESC');
        $this->db->where('tb_laporan.id_dinas', $id_dinas);
        $this->db->where('status', 5);
        return $query = $this->db->get()->result_array();
    }

    public function insert_laporan_selesai($data)
    {
        return $this->db->insert('tb_detail_laporan', $data);
    }

    public function getPengaduanSelesaiByDinas($id_dinas)
    {

        $this->db->select('tb_user.*, tb_laporan.*, tb_laporan.alamat AS alamat_laporan, tb_laporan.foto AS foto_laporan, tb_laporan.dibuat_pada AS laporan_dibuat, tb_laporan.diubah_pada AS laporan_diubah');
        $this->db->from('tb_laporan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_laporan.id_user');
        $this->db->order_by('id_laporan', 'DESC');
        $this->db->where('tb_laporan.id_dinas', $id_dinas);
        $this->db->where('status', 6);
        return $query = $this->db->get()->result_array();
    }
    // ================================== SESI DINAS ========================================



    // ================================== SESI LAPORAN ========================================

    function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(tanggal) AS tahun FROM tb_laporan GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal) ASC");
        return $query->result();
    }

    function filterbytanggal($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * from tb_laporan where tanggal BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal ASC");
        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT * from tb_laporan where YEAR(tanggal) = '$tahun1' and MONTH(tanggal) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tanggal ASC");
        return $query->result();
    }

    function filterbytahun($tahun2)
    {
        $query = $this->db->query("SELECT * from tb_laporan where YEAR(tanggal) = '$tahun2' ORDER BY tanggal ASC");
        return $query->result();
    }
    // ================================== SESI LAPORAN ========================================

}
