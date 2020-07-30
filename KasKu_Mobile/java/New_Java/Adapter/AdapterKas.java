package com.example.kasku.Adapter;

import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.kasku.EditActivity;
import com.example.kasku.MODEL.GetKas;
import com.example.kasku.MODEL.KasModel;
import com.example.kasku.R;

import java.util.ArrayList;
import java.util.List;

public class AdapterKas extends RecyclerView.Adapter<AdapterKas.MyViewHolder> {
    ArrayList<KasModel> kasModel;
    private ArrayList<KasModel> kas = new ArrayList<>();

    public AdapterKas(ArrayList<KasModel> kasModel) {
        this.kasModel = kasModel;
    }


    @NonNull
    @Override
    public MyViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int viewType) {
        View view = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.kas_list, viewGroup, false);
        return new MyViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull MyViewHolder holder, int position) {
        holder.mid.setText(kasModel.get(position).getId());
        holder.mjenis.setText(kasModel.get(position).getJenis());
        holder.mnominal.setText(kasModel.get(position).getNominal());
        holder.tgl.setText(kasModel.get(position).getTanggal());
        holder.mcatatan.setText(kasModel.get(position).getCatatan());
//        holder.itemView.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                Intent intent = new Intent(v.getContext(), EditActivity.class);
//                intent.putExtra("id", kasModel.get(position).getId());
//                intent.putExtra("jenis", kasModel.get(position).getJenis());
//                intent.putExtra("nominal", kasModel.get(position).getNominal());
//                intent.putExtra("Catatan", kasModel.get(position).getCatatan());
//                v.getContext().startActivity(intent);
//            }
//        });

    }

    @Override
    public int getItemCount() {
        return kasModel.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        TextView mid, mjenis, mnominal, mcatatan, tgl;

        public MyViewHolder(@NonNull View itemView) {
            super(itemView);

            mid = itemView.findViewById(R.id.list_id);
            mjenis = itemView.findViewById(R.id.list_jenis);
            mnominal = itemView.findViewById(R.id.list_nominal);
            tgl = itemView.findViewById(R.id.list_tanggal);
            mcatatan = itemView.findViewById(R.id.list_catatan);
        }
    }
}
