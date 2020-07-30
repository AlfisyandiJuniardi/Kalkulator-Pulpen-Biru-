package com.example.kasku.Rest;

import com.example.kasku.MODEL.GetKas;
import com.example.kasku.MODEL.PostPutDelKas;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.HTTP;
import retrofit2.http.POST;
import retrofit2.http.PUT;

public interface ApiInterface {
    @GET("kasku.php")
    Call<GetKas> getKas();

    @FormUrlEncoded
    @POST("kasku")
    Call<PostPutDelKas> postKas(@Field("jenis") String jenis,
                                @Field("nominal") String nominal,
                                @Field("tanggal") String tanggal,
                                @Field("catatan") String catatan);

    @FormUrlEncoded
    @PUT("kasku")
    Call<PostPutDelKas> putKas(@Field("id") String id,
                               @Field("jenis") String jenis,
                               @Field("nominal") String nominal,
                               @Field("tanggal") String tanggal,
                               @Field("catatan") String catatan);

    @FormUrlEncoded
    @HTTP(method = "DELETE", path = "kasku", hasBody = true)
    Call<PostPutDelKas> deleteKas(@Field("id") String id);
}
