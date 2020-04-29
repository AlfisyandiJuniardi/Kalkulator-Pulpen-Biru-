package com.ex.kasku.Model;

import com.google.gson.annotations.SerializedName;

public class Pos_Put_Del_Kasku {
    @SerializedName("status")
    String status;

    @SerializedName("result")
    KasKu mKasKu;

    @SerializedName("message")
    String message;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public KasKu getmKasKu() {
        return mKasKu;
    }

    public void setmKasKu(KasKu mKasKu) {
        this.mKasKu = mKasKu;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
