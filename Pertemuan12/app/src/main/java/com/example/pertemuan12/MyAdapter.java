package com.example.pertemuan12;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

public class MyAdapter extends RecyclerView.Adapter {

    //List untuk menampung semua data mahasiswa dari firebase
    List<Mahasiswa> fetcgDataList;
    private OnItemClickListener mListener;

    public MyAdapter(List<Mahasiswa> fetcgDataList) {
        this.fetcgDataList = fetcgDataList;
    }

    @NonNull
    @Override
    public RecyclerView.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_mhs,parent,false);
        ViewHolderClass viewHolderClass = new ViewHolderClass(view,mListener);
        return viewHolderClass;
    }

    @Override
    public void onBindViewHolder(@NonNull RecyclerView.ViewHolder holder, int position) {
        ViewHolderClass viewHolderClass = (ViewHolderClass)holder;

        Mahasiswa mahasiswa = fetcgDataList.get(position);
        viewHolderClass.nim.setText(mahasiswa.getNim());
        viewHolderClass.nama.setText(mahasiswa.getNama());

    }

    @Override
    public int getItemCount() {
        return fetcgDataList.size();
    }

    public class ViewHolderClass extends RecyclerView.ViewHolder{
        TextView nim,nama,jurusan,angkatan;

        public ViewHolderClass(@NonNull View itemView, final OnItemClickListener listener) {
            super(itemView);
            nim=itemView.findViewById(R.id.tv_nim);
            nama=itemView.findViewById(R.id.tv_nama);

            //Dilakukan agar item pada list dapat berpindah ke activity lain
            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    if (listener != null){
                        int position = getAdapterPosition();
                        if (position != RecyclerView.NO_POSITION){
                            listener.onItemClick(position);
                        }
                    }
                }
            });
        }
    }

    public interface OnItemClickListener{
        void onItemClick(int position);
    }

    public void setOnItemClickListener(OnItemClickListener listener){
        mListener = listener;
    }
}


