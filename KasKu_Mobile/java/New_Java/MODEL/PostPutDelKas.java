package com.example.kasku.MODEL;

import com.google.gson.annotations.SerializedName;

public class PostPutDelKas {
    @SerializedName("status") String status;
    @SerializedName("result") KasModel kasModel;
    @SerializedName("message") String message;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public KasModel getKasModel() {
        return kasModel;
    }

    public void setKasModel(KasModel kasModel) {
        this.kasModel = kasModel;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
