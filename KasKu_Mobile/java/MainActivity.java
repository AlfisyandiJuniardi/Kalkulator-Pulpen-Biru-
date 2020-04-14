package com.example.kasku;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }

    public void mov_debit(View view){
        Intent dbt = new Intent(MainActivity.this, debit.class);
        startActivity(dbt);

    }

    public void mov_kredit(View view){
        Intent krt = new Intent(MainActivity.this, kredit.class);
        startActivity(krt);

    }

    public void mov_laporan(View view){
        Intent lprn = new Intent(MainActivity.this, laporan.class);
        startActivity(lprn);

    }

    public void mov_statistik(View view){
        Intent stk = new Intent(MainActivity.this, Statistik.class);
        startActivity(stk);

    }
}
