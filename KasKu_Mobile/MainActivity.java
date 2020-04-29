package com.ex.kasku;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;

import com.ex.kasku.Adapter.Kasku_Adapter;
import com.ex.kasku.Model.Get_Kasku;
import com.ex.kasku.Model.KasKu;
import com.ex.kasku.Rest.API_Client;
import com.ex.kasku.Rest.API_Interface;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {

    Button btnIns;
    API_Interface mApiInterface;
    private RecyclerView mRecycleView;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;
    public static MainActivity ma;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        btnIns = (Button) findViewById(R.id.btins);
        btnIns.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view){
                startActivity(new Intent(MainActivity.this, Insert_Activity.class));
            }
        });

        mRecycleView = (RecyclerView) findViewById(R.id.recycleview);
        mLayoutManager = new LinearLayoutManager(this);
        mRecycleView.setLayoutManager(mLayoutManager);
        mApiInterface = API_Client.getClient().create(API_Interface.class);
        ma=this;
        refresh();
    }

    public void refresh(){
        Call<Get_Kasku> KasKuCall = mApiInterface.get_Kasku();
        KasKuCall.enqueue(new Callback<Get_Kasku>() {
            @Override
            public void onResponse(Call<Get_Kasku> call, Response<Get_Kasku> response) {
                List<KasKu> KaskuList = response.body().getListDataKasKu();
                Log.d("Retrofit Get", "Jumlah data Kas : "+ String.valueOf(KaskuList.size()));
                mAdapter = new Kasku_Adapter(KaskuList);
                mRecycleView.setAdapter(mAdapter);
            }

            @Override
            public void onFailure(Call<Get_Kasku> call, Throwable t) {
                Log.e("Retrofit Get", t.toString());
            }
        });
    }

}
