package com.example.pertemuan12;

import static android.content.ContentValues.TAG;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // onClick and get id, use switch case and intent
        findViewById(R.id.add_mhs).setOnClickListener(v -> {
            Intent intent = new Intent(MainActivity.this, TambahMhsActivity.class);
            startActivity(intent);
        });

        findViewById(R.id.list_mhs).setOnClickListener(v -> {
            Intent intent = new Intent(MainActivity.this, ListMhsActivity.class);
            startActivity(intent);
        });
    }
}