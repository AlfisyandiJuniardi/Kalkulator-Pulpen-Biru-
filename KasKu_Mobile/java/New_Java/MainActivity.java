package com.example.kasku;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.Toast;

import com.example.kasku.Adapter.AdapterKas;
import com.example.kasku.MODEL.GetKas;
import com.example.kasku.MODEL.KasModel;
import com.example.kasku.Rest.ApiClient;
import com.example.kasku.Rest.ApiInterface;

import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    ApiInterface apiInterface;
    private RecyclerView recyclerView;
    private RecyclerView.Adapter madapter;
    private RecyclerView.LayoutManager mLayoutManager;
    public static MainActivity ma;
    private ArrayList<KasModel> list;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        recyclerView = findViewById(R.id.recyclerview);

        recyclerView.setHasFixedSize(true);
        showRecyclerview();

        mLayoutManager = new LinearLayoutManager(this);
        recyclerView.setLayoutManager(mLayoutManager);
        apiInterface = ApiClient.getClient().create(ApiInterface.class);
        ma=this;


        Button edit = findViewById(R.id.btnEditmain);
        Button insert = findViewById(R.id.btnInsertmain);

        edit.setOnClickListener(this);
        insert.setOnClickListener(this);

        refresh();

    }

    @Override
    public void onClick(View view){
        switch (view.getId()){
            case R.id.btnInsertmain:
                Intent ins = new Intent(MainActivity.this, InsertActivity.class);
                startActivity(ins);
                break;
            case R.id.btnEditmain:
                Intent edt = new Intent(MainActivity.this, EditActivity.class);
                startActivity(edt);
                break;
        }
    }

    private void showRecyclerview(){
        ArrayList<KasModel> arrayList = new ArrayList<>();
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        AdapterKas adapterKas = new AdapterKas(arrayList);
        recyclerView.setAdapter(adapterKas);

    }

    public void  refresh(){
        try {
            Toast.makeText(this,"failed to connect to database", Toast.LENGTH_LONG).show();
        }catch (Exception e){
            final Call<GetKas> kasCall = apiInterface.getKas();
            kasCall.enqueue(new Callback<GetKas>() {
                @Override
                public void onResponse(Call<GetKas> call, Response<GetKas> response) {

                    ArrayList<KasModel> kasModel = response.body().getListDataKas();
                    //ArrayList<KasModel> kas = response.body().setListDataKas();
                    // Log.d("Retrofit Get", "Jumlah Data Kas : " + String.valueOf(kasModel));
                    madapter = new AdapterKas(kasModel);
                    recyclerView.setAdapter(madapter);
                }

                @Override
                public void onFailure(Call<GetKas> call, Throwable t) {
                    Log.e("Retrofit Get", t.toString());
                }
            });
        }
    }
}
