package com.ex.kasku.Model;

import com.google.gson.annotations.SerializedName;

public class KasKu {
    @SerializedName("id")
    private String id;
    @SerializedName("jenis")
    private String jenis;
    @SerializedName("nominal")
    private String nominal;
    @SerializedName("tanggal")
    private String tanggal;
    @SerializedName("catatan")
    private String catatan;

    public KasKu(){

    }

    public KasKu(String id, String nominal, String tanggal, String catatan){
        this.id = id;
        this.nominal = nominal;
        this.tanggal = tanggal;
        this.catatan = catatan;
    }

    public String getId() {
        return id;
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

    public String getTanggal() {
        return tanggal;
    }

    public void setTanggal(String tanggal) {
        this.tanggal = tanggal;
    }

    public String getCatatan() {
        return catatan;
    }

    public void setCatatan(String catatan) {
        this.catatan = catatan;
    }
}
