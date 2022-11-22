package com.example.myviewandviews;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        if (getSupportActionBar() != null) {
            getSupportActionBar().setTitle("Laptop Gaming (Gapai Ranking)");
        }

        Button buy = findViewById(R.id.buy);
        buy.setOnClickListener(v -> {
            startActivity(new Intent(this, BuyActivity.class));
        });

        Button contact = findViewById(R.id.contact);
        contact.setOnClickListener(v -> {
            Intent intent = new Intent(Intent.ACTION_DIAL);
            intent.setData(android.net.Uri.parse("tel:+6281270360350"));
            startActivity(intent);
        });
    }
}
