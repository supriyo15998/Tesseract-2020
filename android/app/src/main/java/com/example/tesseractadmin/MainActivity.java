package com.example.tesseractadmin;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import android.Manifest;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;

public class MainActivity extends AppCompatActivity {
    Button button;
    public TextView textView;
    private int REQUEST_CAMERA_PERMISSION = 101;
    private int REQUEST_SCAN_CODE = 1001;
    boolean isGranted = false;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        button = findViewById(R.id.btn);
        textView = findViewById(R.id.result);

        if (ContextCompat.checkSelfPermission(this, Manifest.permission.CAMERA) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.CAMERA}, REQUEST_CAMERA_PERMISSION);
        } else {
            textView.setText("");
            button.setText("Scan QR Code");
            isGranted = true;
        }
//run
        if (!isGranted) {
            textView.setText("Please grant camera permission!");
            button.setText("Grant Permission");
        }

        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (!isGranted)
                    ActivityCompat.requestPermissions(MainActivity.this, new String[]{Manifest.permission.CAMERA}, REQUEST_CAMERA_PERMISSION);
                else
                    startActivityForResult(new Intent(getApplicationContext(), ScanCodeActivity.class), REQUEST_SCAN_CODE);
            }
        });
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        if (requestCode == REQUEST_CAMERA_PERMISSION) {
            if (grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                Log.d("MainActivity", "Permission Granted");
                textView.setText("");
                button.setText("Scan QR Code");
                isGranted = true;
            }
        } else {
            textView.setText("Please grant camera permission!");
            button.setText("Grant Permission");
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        if (requestCode == REQUEST_SCAN_CODE) {
            if (resultCode == RESULT_OK) {
                try {
                    JSONObject jsonObject = new JSONObject(data.getDataString());
                    textView.setText(jsonObject.getString("order"));
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
    }
}
