package com.ex.kasku.Model;

import com.google.gson.annotations.SerializedName;

import java.util.List;

public class Get_Kasku {
    @SerializedName("status")
    String status;

    @SerializedName("result")
    List<KasKu> listDataKasKu;

    @SerializedName("message")
    String message;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public List<KasKu> getListDataKasKu() {
        return listDataKasKu;
    }

    public void setListDataKasKu(List<KasKu> listDataKasKu) {
        this.listDataKasKu = listDataKasKu;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
