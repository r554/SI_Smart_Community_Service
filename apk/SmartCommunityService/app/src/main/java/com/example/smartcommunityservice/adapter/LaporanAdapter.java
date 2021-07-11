package com.example.smartcommunityservice.adapter;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.RecyclerView;

import com.example.smartcommunityservice.R;
import com.example.smartcommunityservice.model.LaporanItem;
import com.squareup.picasso.Picasso;
import java.util.ArrayList;

public class LaporanAdapter extends RecyclerView.Adapter<LaporanAdapter.LaporanViewHolder> {
    private ArrayList<LaporanItem> mLaporanList;
    private OnItemClickListener mListener;
    private int status;

    public interface OnItemClickListener {
        void onItemClick(int position);
    }

    public void setOnItemCliclListener(OnItemClickListener listener) {
        mListener = listener;
    }

    public LaporanAdapter(ArrayList<LaporanItem> laporaList) {
        mLaporanList = laporaList;
    }

    @NonNull
    @Override
    public LaporanViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.laporan_item, parent, false);
        LaporanViewHolder laporanViewHolder = new LaporanViewHolder(view, mListener);
        return laporanViewHolder;
    }

    @Override
    public void onBindViewHolder(@NonNull LaporanViewHolder holder, int position) {
        LaporanItem currentItem = mLaporanList.get(position);

        Picasso.get().load(currentItem.getFoto()).into(holder.foto);
        holder.textJudul.setText(currentItem.getJudul());
        holder.textDescription.setText(currentItem.getDescription());
        holder.textDate.setText(currentItem.getTanggal());
        if (currentItem.getStatus().equals("1")) {
            holder.statusMenunggu.setVisibility(View.VISIBLE);
        }else if (currentItem.getStatus().equals("2")) {
            holder.statusMenunggu.setVisibility(View.VISIBLE);
        } else if (currentItem.getStatus().equals("3")) {
            holder.statusMenunggu.setVisibility(View.VISIBLE);
        } else if (currentItem.getStatus().equals("4")) {
            holder.statusMenunggu.setVisibility(View.VISIBLE);
        } else if (currentItem.getStatus().equals("5")) {
            holder.statusProses.setVisibility(View.VISIBLE);
        }else if (currentItem.getStatus().equals("6")) {
            holder.statusSelesai.setVisibility(View.VISIBLE);
        }else if (currentItem.getStatus().equals("7")) {
            holder.statusTolak.setVisibility(View.VISIBLE);
        }
    }

    @Override
    public int getItemCount() {
        return mLaporanList.size();
    }

    public static class LaporanViewHolder extends RecyclerView.ViewHolder {
        public TextView textJudul;
        public TextView textDescription;
        public TextView textDate;
        public CardView cardLaporan ,statusMenunggu, statusProses,statusSelesai,statusTolak;
        ImageView foto;

        public LaporanViewHolder(@NonNull View itemView, final OnItemClickListener listener) {
            super(itemView);

            textJudul = itemView.findViewById(R.id.laporan_title);
            textDescription = itemView.findViewById(R.id.laporan_description);
            textDate = itemView.findViewById(R.id.laporan_date);
            cardLaporan = itemView.findViewById(R.id.card_laporan);
            statusMenunggu = itemView.findViewById(R.id.statusMenunngu);
            statusProses = itemView.findViewById(R.id.statusProses);
            statusSelesai = itemView.findViewById(R.id.statusSelesai);
            statusTolak = itemView.findViewById(R.id.statusTolak);
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
