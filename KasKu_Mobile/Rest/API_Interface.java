package com.ex.kasku.Rest;

import com.ex.kasku.Model.Get_Kasku;
import com.ex.kasku.Model.Pos_Put_Del_Kasku;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.HTTP;
import retrofit2.http.POST;

public interface API_Interface {
    @GET("Kasku_android")
    Call<Get_Kasku> get_Kasku();

    @FormUrlEncoded
    @POST("KasKu")
    Call<Pos_Put_Del_Kasku> post_Kasku(@Field("nominal") String nominal, @Field("jenis") String jenis,@Field("tanggal") String tanggal, @Field("catatan") String catatan );

    @FormUrlEncoded
    @POST("Kasku")
    Call<Pos_Put_Del_Kasku> put_Kasku(@Field("id") String id, @Field("nominal") String nominal, @Field("jenis") String jenis,@Field("tanggal") String tanggal, @Field("catatan") String catatan);

    @FormUrlEncoded
    @HTTP(method = "DELETE", path = "KasKu", hasBody=true)
    Call<Pos_Put_Del_Kasku> delete_Kasku(@Field("id") String id);
}
