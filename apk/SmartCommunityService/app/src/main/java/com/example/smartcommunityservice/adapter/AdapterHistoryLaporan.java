package com.example.smartcommunityservice.adapter;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.RecyclerView;

import com.example.smartcommunityservice.model.LaporanItem;
import com.example.smartcommunityservice.model.ModelHistoryLaporan;
import com.example.smartcommunityservice.R;
import com.example.smartcommunityservice.DetailLaporanActivity;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;
import java.util.List;

public class AdapterHistoryLaporan extends RecyclerView.Adapter<AdapterHistoryLaporan.HolderLaporan> {
    private ArrayList<ModelHistoryLaporan> mLaporanList;
    private OnItemClickListener mListener;


    public interface OnItemClickListener {
        void onItemClick(int position);
    }

    public void setOnItemCliclListener(OnItemClickListener listener) {
        mListener = listener;
    }

    public AdapterHistoryLaporan(ArrayList<ModelHistoryLaporan> laporaList) {
        mLaporanList = laporaList;
    }

    @NonNull
    @Override
    public HolderLaporan onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_item_history, parent, false);
        HolderLaporan HolderLaporan = new HolderLaporan(view, mListener);
        return HolderLaporan;
    }

    @Override
    public void onBindViewHolder(@NonNull final HolderLaporan holder, int position) {
        ModelHistoryLaporan currentItem = mLaporanList.get(position);

        Picasso.get().load(currentItem.getFoto()).into(holder.foto);
        holder.textJudul.setText(currentItem.getJudul());
        holder.textDescription.setText(currentItem.getDescription());
        holder.textDate.setText(currentItem.getTanggal());
    }

    @Override
    public int getItemCount() {
        return mLaporanList.size();
    }

    public class HolderLaporan extends RecyclerView.ViewHolder{
        public TextView textJudul;
        public TextView textDescription;
        public TextView textDate;
        public CardView cardLaporan;
        ImageView foto;
        public HolderLaporan(@NonNull View itemView, final AdapterHistoryLaporan.OnItemClickListener listener){
            super(itemView);

            textJudul = itemView.findViewById(R.id.laporan_title);
            textDescription = itemView.findViewById(R.id.laporan_description);
            textDate = itemView.findViewById(R.id.laporan_date);
            cardLaporan = itemView.findViewById(R.id.card_laporan);
            foto = itemView.findViewById(R.id.LaporanImage);

            cardLaporan.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    if (listener != null) {
                        int position = getAdapterPosition();
                        if (position != RecyclerView.NO_POSITION) {
                            listener.onItemClick(position);
                        }
                    }
                }
            });

        }
    }
}
