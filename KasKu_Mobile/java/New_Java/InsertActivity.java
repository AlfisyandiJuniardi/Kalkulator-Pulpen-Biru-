package com.example.kasku;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.kasku.MODEL.PostPutDelKas;
import com.example.kasku.Rest.ApiClient;
import com.example.kasku.Rest.ApiInterface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class InsertActivity extends AppCompatActivity {
    EditText edtjenis, edtnominal, edtcatatan;
    Button btnin, btnbck;
    ApiInterface apiInterface;

    @Override
    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.inertactivity);

//        edtjenis = (EditText) findViewById(R.id.edtjenis);
//        edtnominal = (EditText) findViewById(R.id.edtnominal);
//        edtcatatan = (EditText) findViewById(R.id.edtcatatan);
//        apiInterface = ApiClient.getClient().create(ApiInterface.class);
//        btnin = (Button) findViewById(R.id.btnInsertig);
//        btnin.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                Call<PostPutDelKas> postKasCall = apiInterface.postKas(edtjenis.getText().toString(), edtnominal.getText().toString(), edtcatatan.getText().toString());
//                postKasCall.enqueue(new Callback<PostPutDelKas>() {
//                    @Override
//                    public void onResponse(Call<PostPutDelKas> call, Response<PostPutDelKas> response) {
//                        MainActivity.ma.refresh();
//                        finish();
//                    }
//
//                    @Override
//                    public void onFailure(Call<PostPutDelKas> call, Throwable t) {
//                        Toast.makeText(getApplicationContext(),"Error", Toast.LENGTH_LONG).show();
//                    }
//                });
//            }
//        });
//
//        btnbck = (Button) findViewById(R.id.btnback);
//        btnin.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                MainActivity.ma.refresh();
//                finish();
//            }
//        });
    }
}
