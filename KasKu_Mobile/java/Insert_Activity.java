package com.ex.kasku;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.ex.kasku.Model.Pos_Put_Del_Kasku;
import com.ex.kasku.Rest.API_Interface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Insert_Activity extends AppCompatActivity {

    EditText edtId, edtNominal, edtJenis, edtTanggal, edtCatatan;
    Button btnInsert, btnBack;
    API_Interface mAPI_Interface;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.insert_activity);

        edtId = (EditText) findViewById(R.id.edtId);
        edtNominal = (EditText) findViewById(R.id.edtNominal);
        edtJenis = (EditText) findViewById(R.id.edtJenis);
        edtTanggal = (EditText) findViewById(R.id.edtTanggal);
        edtCatatan = (EditText) findViewById(R.id.edtCatatan);

        btnInsert.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Call<Pos_Put_Del_Kasku> postKasKucall = mAPI_Interface.post_Kasku(edtNominal.getText().toString(), edtJenis.getText().toString(),edtTanggal.getText().toString(),edtCatatan.getText().toString());
                postKasKucall.enqueue(new Callback<Pos_Put_Del_Kasku>() {
                    @Override
                    public void onResponse(Call<Pos_Put_Del_Kasku> call, Response<Pos_Put_Del_Kasku> response) {
                        MainActivity.ma.refresh();
                        finish();
                    }

                    @Override
                    public void onFailure(Call<Pos_Put_Del_Kasku> call, Throwable t) {
                        Toast.makeText(getApplicationContext(),"Error", Toast.LENGTH_LONG).show();
                    }
                });
            }
        });

        btnBack = (Button) findViewById(R.id.btnBackGo);
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                MainActivity.ma.refresh();
                finish();
            }
        });
    }
}
