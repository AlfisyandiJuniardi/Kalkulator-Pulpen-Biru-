package com.ex.kasku;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.ex.kasku.Model.Pos_Put_Del_Kasku;
import com.ex.kasku.Rest.API_Interface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Edit_Activity extends AppCompatActivity {

    EditText edtId, edtNominal, edtJenis, edtTanggal, edtCatatan;
    Button btnUpdate, btnDelete, btnBack;
    API_Interface mAPI_Interface;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.edit_activity);

        edtId = (EditText) findViewById(R.id.edtId);
        edtNominal = (EditText) findViewById(R.id.edtNominal);
        edtJenis = (EditText) findViewById(R.id.edtJenis);
        edtTanggal = (EditText) findViewById(R.id.edtTanggal);
        edtCatatan = (EditText) findViewById(R.id.edtCatatan);

        Intent mIntent = getIntent();

        edtId.setText(mIntent.getStringExtra("id"));
        edtId.setTag(edtId.getKeyListener());
        edtId.setKeyListener(null);

        edtNominal.setText(mIntent.getStringExtra("Nominal"));
        edtJenis.setText(mIntent.getStringExtra("Jenis"));
        edtTanggal.setText(mIntent.getStringExtra("Tanggal"));
        edtCatatan.setText(mIntent.getStringExtra("Catatan"));

        btnUpdate = (Button) findViewById(R.id.btnUpdate2);
        btnUpdate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Call<Pos_Put_Del_Kasku> updateKasKuCall = mAPI_Interface.put_Kasku(edtId.getText().toString(),edtNominal.getText().toString(), edtJenis.getText().toString(),edtTanggal.getText().toString(),edtCatatan.getText().toString());
                updateKasKuCall.enqueue(new Callback<Pos_Put_Del_Kasku>() {
                    @Override
                    public void onResponse(Call<Pos_Put_Del_Kasku> call, Response<Pos_Put_Del_Kasku> response) {
                        MainActivity.ma.refresh();
                        finish();
                    }

                    @Override
                    public void onFailure(Call<Pos_Put_Del_Kasku> call, Throwable t) {
                        Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
                    }
                });
            }
        });
        btnDelete = (Button) findViewById(R.id.btnDelete2);
        btnDelete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (edtId.getText().toString().trim().isEmpty()==false){
                    Call<Pos_Put_Del_Kasku> deleteKasKu = mAPI_Interface.delete_Kasku(edtId.getText().toString());
                    deleteKasKu.enqueue(new Callback<Pos_Put_Del_Kasku>() {
                        @Override
                        public void onResponse(Call<Pos_Put_Del_Kasku> call, Response<Pos_Put_Del_Kasku> response) {
                            MainActivity.ma.refresh();
                            finish();
                        }

                        @Override
                        public void onFailure(Call<Pos_Put_Del_Kasku> call, Throwable t) {
                            Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
                        }
                    });
                } else {
                    Toast.makeText(getApplicationContext(),"Error", Toast.LENGTH_LONG).show();
                }
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
