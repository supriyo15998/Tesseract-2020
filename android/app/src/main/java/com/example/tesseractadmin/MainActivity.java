package com.example.tesseractadmin;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import android.Manifest;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Color;
import android.net.Uri;
import android.os.Bundle;
import android.text.SpannableString;
import android.text.Spanned;
import android.text.method.LinkMovementMethod;
import android.text.style.ClickableSpan;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.tesseractadmin.models.GlobalResponse;
import com.example.tesseractadmin.models.Order;
import com.example.tesseractadmin.remote.APIService;
import com.example.tesseractadmin.remote.ApiUtils;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {
    Button button;
    public TextView textView;
    private int REQUEST_CAMERA_PERMISSION = 101;
    private int REQUEST_SCAN_CODE = 1001;
    boolean isGranted = false;
    private APIService apiService;
    private Order order;
    private ProgressDialog progressDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        apiService = ApiUtils.getAPIService();

        button = findViewById(R.id.btn);
        textView = findViewById(R.id.result);

        progressDialog = new ProgressDialog(this);
        progressDialog.setCancelable(false);
        progressDialog.setTitle("Please wait");
        progressDialog.setMessage("Loading...");

        if (ContextCompat.checkSelfPermission(this, Manifest.permission.CAMERA) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.CAMERA}, REQUEST_CAMERA_PERMISSION);
        } else {
            textView.setText("");
            button.setText("Scan QR Code");
            isGranted = true;
        }

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

        TextView buglabsPromotion = findViewById(R.id.buglabsPromotion);
        SpannableString ss = new SpannableString("Made with ♥ by TheBugLabs.\nFacing issues? Contact Us now!");
        ss.setSpan(new ClickableSpan() {
            @Override
            public void onClick(@NonNull View view) {
                startActivity(new Intent(Intent.ACTION_VIEW).setData(Uri.parse("https://www.thebuglabs.com")));
            }
        },15, 25, Spanned.SPAN_EXCLUSIVE_EXCLUSIVE);
        ss.setSpan(new ClickableSpan() {
            @Override
            public void onClick(@NonNull View view) {
                AlertDialog.Builder dialogBuilder = new AlertDialog.Builder(MainActivity.this);
                final AlertDialog alertDialog = dialogBuilder.create();
                LayoutInflater inflater = MainActivity.this.getLayoutInflater();
                View alertView = inflater.inflate(R.layout.phone_numbers, null);
                alertDialog.setView(alertView);
                alertDialog.setTitle("Contact Us");
                alertDialog.setMessage("Having trouble in scanning? Worry not call us now!");

                alertDialog.setButton(DialogInterface.BUTTON_NEGATIVE, "Cancel", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        alertDialog.dismiss();
                    }
                });

                alertDialog.show();
            }
        }, 42, 52, Spanned.SPAN_EXCLUSIVE_EXCLUSIVE);
        buglabsPromotion.setText(ss);
        buglabsPromotion.setMovementMethod(LinkMovementMethod.getInstance());
        buglabsPromotion.setHighlightColor(Color.TRANSPARENT);
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
                    fetchOrder(Integer.parseInt(jsonObject.getString("order")));
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
    }

    private void fetchOrder(int orderId) {

        progressDialog.show();

        apiService.getOrderDetails(orderId).enqueue(new Callback<GlobalResponse>() {
            @Override
            public void onResponse(Call<GlobalResponse> call, Response<GlobalResponse> response) {
                progressDialog.dismiss();
                if (response.isSuccessful()) {
                    order = response.body().getSuccess().getOrder();
                    if (order.isTeam())
                        textView.setText("Welcome " + response.body().getSuccess().getOrder().getTeam().getName());
                    else
                        textView.setText("Welcome " + response.body().getSuccess().getOrder().getParticipantId());

                    startActivity(new Intent(MainActivity.this, OrderActivity.class).putExtra("order", order));
                } else {
                    Toast.makeText(getApplicationContext(), "Something went wrong!", Toast.LENGTH_LONG).show();
                }
            }

            @Override
            public void onFailure(Call<GlobalResponse> call, Throwable t) {
                progressDialog.dismiss();
                Toast.makeText(getApplicationContext(), "Something went wrong!", Toast.LENGTH_LONG).show();
                Log.e("MainActivity", t.getMessage());
                t.printStackTrace();
            }
        });
    }
}
