package com.example.tesseractadmin;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class StartActivity extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_start);
    }

    public void loginAttempt(View view)
    {
        EditText userID = findViewById(R.id.userId);
        EditText password = findViewById(R.id.password);
        Button btn = findViewById(R.id.btn);
        if (((userID.getText().toString().equals("admin@tesseractgnit.com")) || (userID.getText().toString().equals("admin@tesseractgnit.com "))) && (password.getText().toString().equals("admin@1234") ))
        {
            Log.d("correct","correct");
            startActivity(new Intent(StartActivity.this, MainActivity.class));
        }
        else
        {
            Toast.makeText(this, "Wrong User ID and password", Toast.LENGTH_SHORT).show();
        }
    }
}
