package com.example.tesseractadmin;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.DialogInterface;
import android.content.Intent;
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
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class StartActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_start);

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
                AlertDialog.Builder dialogBuilder = new AlertDialog.Builder(StartActivity.this);
                final AlertDialog alertDialog = dialogBuilder.create();
                LayoutInflater inflater = StartActivity.this.getLayoutInflater();
                View alertView = inflater.inflate(R.layout.phone_numbers, null);
                alertDialog.setView(alertView);
                alertDialog.setTitle("Contact Us");
                alertDialog.setMessage("Having trouble in signing in? Worry not call us now!");

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

    public void loginAttempt(View view)
    {
        EditText userID = findViewById(R.id.userId);
        EditText password = findViewById(R.id.password);
        Button btn = findViewById(R.id.btn);
        if ((userID.getText().toString().trim().equalsIgnoreCase("admin@tesseractgnit.com")) && (password.getText().toString().equals("admin@1234") ))
        {
            Log.d("correct","correct");
            startActivity(new Intent(StartActivity.this, MainActivity.class));
            finish();
        }
        else
        {
            Toast.makeText(this, "Wrong User ID and password", Toast.LENGTH_SHORT).show();
        }
    }
}
