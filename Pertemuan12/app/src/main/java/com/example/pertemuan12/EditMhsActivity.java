package com.example.pertemuan12;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;

import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

public class EditMhsActivity extends AppCompatActivity {

    EditText etNIM,etNama,etJurusan,etAngkatan;
    Button btnSimpan,btnHapus;
    ImageButton btnBack;
    String temp_nim,temp_nama,temp_jurusan,temp_angkatan;

    DatabaseReference databaseReference;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_mhs);

        //Mengambil data ('nim') yang dikirim dari activity sebelumnya
        Intent intent = getIntent();
        String nim = intent.getStringExtra("nim");

        //inisialisasi variable dengan id yang ada di layout
        etNIM = findViewById(R.id.et_nim);
        etNama = findViewById(R.id.et_nama);
        etJurusan = findViewById(R.id.et_jurusan);
        etAngkatan = findViewById(R.id.et_angkatan);

        btnSimpan = findViewById(R.id.btn_simpan);
        btnHapus = findViewById(R.id.btn_hapus);
        btnBack = findViewById(R.id.btn_back);

        databaseReference = FirebaseDatabase.getInstance().getReference().child("mhs").child(nim);
        databaseReference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                temp_nim = dataSnapshot.child("nim").getValue().toString();
                temp_nama = dataSnapshot.child("nama").getValue().toString();
                temp_jurusan = dataSnapshot.child("jurusan").getValue().toString();
                temp_angkatan = dataSnapshot.child("angkatan").getValue().toString();

                etNIM.setText(temp_nim);
                etNama.setText(temp_nama);
                etJurusan.setText(temp_jurusan);
                etAngkatan.setText(temp_angkatan);

            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });

        btnSimpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                updateData();
                finish();
            }
        });

        btnHapus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                hapusData();
                finish();
            }
        });

        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

    }

    private void hapusData() {
        databaseReference.removeValue();
    }

    private void updateData() {
        String nim = etNIM.getText().toString();
        String nama = etNama.getText().toString();
        String jurusan = etJurusan.getText().toString();
        String angkatan = etAngkatan.getText().toString();

        if(!nim.equals(temp_nim) || !nama.equals(temp_nama) || !jurusan.equals(temp_jurusan)|| !angkatan.equals(temp_angkatan)){
            Mahasiswa mahasiswa = new Mahasiswa(nim,nama,jurusan,angkatan);
            databaseReference.setValue(mahasiswa).addOnSuccessListener(new OnSuccessListener<Void>() {
                @Override
                public void onSuccess(Void aVoid) {
                    Toast.makeText(EditMhsActivity.this, "Data berhasil diubah", Toast.LENGTH_SHORT).show();

                    etNIM.setText("");
                    etNama.setText("");
                    etJurusan.setText("");
                    etAngkatan.setText("");

                }
            }).addOnFailureListener(new OnFailureListener() {
                @Override
                public void onFailure(@NonNull Exception e) {
                    Toast.makeText(EditMhsActivity.this, "Data gagal diubah", Toast.LENGTH_SHORT).show();
                }
            });
        } else{
            Toast.makeText(this, "Data Tidak berubah", Toast.LENGTH_SHORT).show();
        }
    }
}
