package com.example.myviewandviews;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;

public class BuyActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_buy);

        // hide action bar
        if (getSupportActionBar() != null) {
            getSupportActionBar().hide();
        }

        Button button = findViewById(R.id.button);
        button.setOnClickListener(v -> {
            startActivity(new Intent(this, MainActivity.class));
        });
    }
}