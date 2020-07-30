package com.example.kasku.MODEL;

import com.google.gson.annotations.SerializedName;

public class KasModel {
    @SerializedName("id") String id;
    @SerializedName("jenis") String jenis;
    @SerializedName("nominal") String nominal;
    @SerializedName("tanggal") String tanggal;
    @SerializedName("catatan") String catatan;


    public KasModel(){}

    public KasModel(String id, String jenis, String nominal,String tanggal, String catatan) {
        this.id = id;
        this.jenis = jenis;
        this.nominal = nominal;
        this.tanggal = tanggal;
        this.catatan = catatan;
    }

    public String getId() {
        return id;
    }

    public String getTanggal() {
        return tanggal;
    }

    public void setTanggal(String tanggal) {
        this.tanggal = tanggal;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getJenis() {
        return jenis;
    }

    public void setJenis(String jenis) {
        this.jenis = jenis;
    }

    public String getNominal() {
        return nominal;
    }

    public void setNominal(String nominal) {
        this.nominal = nominal;
    }

    public String getCatatan() {
        return catatan;
    }

    public void setCatatan(String catatan) {
        this.catatan = catatan;
    }
}
