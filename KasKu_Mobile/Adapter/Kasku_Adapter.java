package com.ex.kasku.Adapter;

import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.ex.kasku.Edit_Activity;
import com.ex.kasku.Model.KasKu;
import com.ex.kasku.R;

import java.util.List;

public class Kasku_Adapter extends RecyclerView.Adapter<Kasku_Adapter.MyViewHolder>{
    List<KasKu> mKasKuList;

    public Kasku_Adapter(List<KasKu> KasKuList){
        mKasKuList=KasKuList;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.kasku_list, parent, false);
        MyViewHolder mViewHolder = new MyViewHolder(mView);
        return mViewHolder;
    }

    @Override
    public void onBindViewHolder(MyViewHolder holder, final int position) {
        holder.mTextViewId.setText("Id = " + mKasKuList.get(position).getId());
        holder.mTextViewNominal.setText("Nominal = " + mKasKuList.get(position).getNominal());
        holder.mTextViewJenis.setText("Jenis = " + mKasKuList.get(position).getJenis());
        holder.mTextViewTanggal.setText("Tanggal = " + mKasKuList.get(position).getTanggal());
        holder.mTextViewCatatan.setText("Catatan = " + mKasKuList.get(position).getCatatan());
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent mIntent = new Intent(v.getContext(), Edit_Activity.class);
                mIntent.putExtra("Id", mKasKuList.get(position).getId());
                mIntent.putExtra("Nominal", mKasKuList.get(position).getNominal());
                mIntent.putExtra("Jenis", mKasKuList.get(position).getJenis());
                mIntent.putExtra("Tanggal", mKasKuList.get(position).getTanggal());
                mIntent.putExtra("Catatan", mKasKuList.get(position).getCatatan());
            }
        });

    }

    @Override
    public int getItemCount () {
        return mKasKuList.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView mTextViewId, mTextViewNominal, mTextViewJenis, mTextViewTanggal, mTextViewCatatan;

        public MyViewHolder(View itemView) {
            super(itemView);
            mTextViewId = (TextView) itemView.findViewById(R.id.tvId);
            mTextViewNominal = (TextView) itemView.findViewById(R.id.tvNominal);
            mTextViewJenis = (TextView) itemView.findViewById(R.id.tvJenis);
            mTextViewTanggal = (TextView) itemView.findViewById(R.id.tvTanggal);
            mTextViewCatatan = (TextView) itemView.findViewById(R.id.tvCatatan);

        }
    }
}
