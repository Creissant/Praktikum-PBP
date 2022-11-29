package com.example.pertemuan12;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.Toast;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;
import java.util.List;

public class ListMhsActivity extends AppCompatActivity {
    List<Mahasiswa> fetchData;
    RecyclerView recyclerView;
    MyAdapter myAdapter;
    DatabaseReference databaseReference;

    ImageButton btnBack;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_mhs);

        recyclerView = findViewById(R.id.recyclerview);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        fetchData = new ArrayList<>();

        //inisialisasi objek untuk ke firebase
        databaseReference = FirebaseDatabase.getInstance().getReference("mhs");
        databaseReference.addListenerForSingleValueEvent(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                //iterasi mengambil mahasiswa
                for (DataSnapshot ds : dataSnapshot.getChildren()){
                    //Mengambil value setiap child dari 'mahasiswa' (nim,nama,jurusan,angkatan)
                    String nim = ds.child("nim").getValue().toString();
                    String nama = ds.child("nama").getValue().toString();
                    Mahasiswa data = new Mahasiswa(nim,nama);
                    fetchData.add(data);

                }
                myAdapter = new MyAdapter(fetchData);
                recyclerView.setAdapter(myAdapter);

                //Pindah activity apabila item pada list di click
                myAdapter.setOnItemClickListener(new MyAdapter.OnItemClickListener() {
                    @Override
                    public void onItemClick(int position) {
                        String nim = fetchData.get(position).getNim();
                        startActivity(new Intent(ListMhsActivity.this,EditMhsActivity.class).putExtra("nim",nim));
                    }
                });

            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {
                Toast.makeText(ListMhsActivity.this, "Maaf Terjadi kesalahan... coba beberapa saat lagi!", Toast.LENGTH_SHORT).show();
            }
        });
        btnBack = findViewById(R.id.btn_back);
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
    }

}

