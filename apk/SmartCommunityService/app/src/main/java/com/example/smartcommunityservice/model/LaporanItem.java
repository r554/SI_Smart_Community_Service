package com.example.smartcommunityservice.model;

import com.example.smartcommunityservice.helper.ApiHelper;

public class LaporanItem {
    private int idLaporan;
    private int idUser;
    private String id_dinas;
    private String judul;
    private String description;
    private String tanggal;
    private String alamat;
    private double lat;
    private double lng;
    private String status;
    private String foto;

    public LaporanItem(int idLaporan, int idUser, String id_dinas, String judul, String description, String tanggal, String alamat, double lat, double lng, String foto , String status
    ) {
        this.idLaporan = idLaporan;
        this.idUser = idUser;
        this.judul = judul;
        this.id_dinas = id_dinas;
        this.description = description;
        this.tanggal = tanggal;
        this.alamat = alamat;
        this.lat = lat;
        this.lng = lng;
        this.status = status;
        this.foto = foto;
    }

    public double getLat() {
        return lat;
    }

    public void setLat(double lat) {
        this.lat = lat;
    }

    public double getLng() {
        return lng;
    }

    public void setLng(double lng) {
        this.lng = lng;
    }

    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    public int getIdLaporan() {
        return idLaporan;
    }

    public void setIdLaporan(int idLaporan) {
        this.idLaporan = idLaporan;
    }

    public int getIdUser() {
        return idUser;
    }

    public void setIdUser(int idUser) {
        this.idUser = idUser;
    }

    public String getJudul() {
        return judul;
    }

    public void setJudul(String judul) {
        this.judul = judul;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getTanggal() {
        return tanggal;
    }

    public void setTanggal(String tanggal) {
        this.tanggal = tanggal;
    }


    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public String getFoto() {
//        return gambar;
        return ApiHelper.ASSETS_URL + foto;
    }
    public void setFoto(String foto) {
        this.foto = foto;
    }

    public String getNamaDinas() {
        return id_dinas;
    }

    public void setNamaDinas(String id_dinas) {
        this.id_dinas = id_dinas;
    }

}
