package com.example.kasku.MODEL;

import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;

public class GetKas {
    @SerializedName("status") String status;
    @SerializedName("result")
    ArrayList<KasModel> listDataKas;
    @SerializedName("message") String message;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public ArrayList<KasModel> getListDataKas() {
        return listDataKas;
    }

    public void setListDataKas(ArrayList<KasModel> listDataKas) {
        this.listDataKas = listDataKas;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
