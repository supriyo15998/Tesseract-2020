package com.example.tesseractadmin;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
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
import android.view.Gravity;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.LinearLayout;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TableLayout;
import android.widget.TableRow;
import android.widget.TextView;
import android.widget.Toast;

import com.example.tesseractadmin.models.Event;
import com.example.tesseractadmin.models.GlobalReqeust;
import com.example.tesseractadmin.models.GlobalResponse;
import com.example.tesseractadmin.models.Member;
import com.example.tesseractadmin.models.Order;
import com.example.tesseractadmin.remote.APIService;
import com.example.tesseractadmin.remote.ApiUtils;
import com.google.gson.Gson;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class OrderActivity extends AppCompatActivity {


    private Order order;
    private TableLayout membersTable, eventsTable;
    int i = 1;
    private int playedEvent = 0;
    private APIService apiService;
    private ProgressDialog progressDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order);

        Intent intent = getIntent();
        order = (Order) intent.getSerializableExtra("order");

        apiService = ApiUtils.getAPIService();

        progressDialog = new ProgressDialog(this);
        progressDialog.setTitle("Please wait");
        progressDialog.setMessage("Requesting...");
        progressDialog.setCancelable(false);

        membersTable = findViewById(R.id.membersTable);
        eventsTable = findViewById(R.id.eventsTable);


        getSupportActionBar().setTitle("Order " + order.getId());
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);


        if(order.isTeam())
            populateTeam();
        else
            populateSolo();

        populateEvents();

        findViewById(R.id.markPaid).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                final List<Integer> paidEvents = new ArrayList<>();

                final AlertDialog.Builder builder = new AlertDialog.Builder(OrderActivity.this);
                builder.setTitle("Choose events: ");

                LinearLayout linearLayout = new LinearLayout(OrderActivity.this);
                linearLayout.setOrientation(LinearLayout.VERTICAL);

                int j = 0;

                for (final Event event : order.getEvents()) {
                    if (!event.getPivot().isPaid()) {
                        CheckBox checkBox = new CheckBox(OrderActivity.this);
                        checkBox.setLayoutParams(new LinearLayout.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT, ViewGroup.LayoutParams.WRAP_CONTENT));
                        checkBox.setText(event.getName());
                        checkBox.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                            @Override
                            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {
                                if (b) {
                                    paidEvents.add(event.getId());
                                } else {
                                    paidEvents.remove(event.getId());
                                }
                            }
                        });
                        linearLayout.addView(checkBox);
                    } else {
                        j++;
                    }
                }

                if (j==order.getEvents().size()) {
                    TextView textView = new TextView(OrderActivity.this);
                    SpannableString ss = new SpannableString("All events have been marked as paid!\nPlease contact Faraz Ali/Supriyo Das if there's any issue!");
                    ss.setSpan(new ClickableSpan() {
                        @Override
                        public void onClick(@NonNull View view) {
                            startActivity(new Intent(Intent.ACTION_DIAL).setData(Uri.parse("tel:+917044728852")));
                        }
                    }, 52, 61, Spanned.SPAN_EXCLUSIVE_EXCLUSIVE);
                    ss.setSpan(new ClickableSpan() {
                        @Override
                        public void onClick(@NonNull View view) {
                            startActivity(new Intent(Intent.ACTION_DIAL).setData(Uri.parse("tel:+918013206937")));
                        }
                    }, 62, 73, Spanned.SPAN_EXCLUSIVE_EXCLUSIVE);
                    textView.setText(ss);
                    textView.setMovementMethod(LinkMovementMethod.getInstance());
                    textView.setHighlightColor(Color.TRANSPARENT);
                    LinearLayout.LayoutParams layoutParams = new LinearLayout.LayoutParams(ViewGroup.LayoutParams.WRAP_CONTENT, ViewGroup.LayoutParams.WRAP_CONTENT);
                    layoutParams.setMargins(20, 10, 10, 10);
                    textView.setLayoutParams(layoutParams);
                    textView.setTextSize(18);
                    textView.setTextColor(getResources().getColor(android.R.color.black));
                    linearLayout.addView(textView);
                } else {
                    builder.setPositiveButton("Continue", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialogInterface, int i) {

                            progressDialog.show();

                            GlobalReqeust globalReqeust = new GlobalReqeust();
                            globalReqeust.setPaidEvents(paidEvents);
                            apiService.markPaid(order.getId(), globalReqeust).enqueue(new Callback<GlobalResponse>() {
                                @Override
                                public void onResponse(Call<GlobalResponse> call, Response<GlobalResponse> response) {
                                    progressDialog.dismiss();
                                    if (response.isSuccessful()) {
                                        Toast.makeText(OrderActivity.this, "Order updated successfully!", Toast.LENGTH_LONG).show();
                                        order = response.body().getSuccess().getOrder();
                                        populateEvents();
                                    } else {
                                        Toast.makeText(OrderActivity.this, "Something went wrong!", Toast.LENGTH_LONG).show();
                                    }
                                }

                                @Override
                                public void onFailure(Call<GlobalResponse> call, Throwable t) {
                                    progressDialog.dismiss();
                                    Toast.makeText(OrderActivity.this, "Something went wrong!", Toast.LENGTH_LONG).show();
                                    Log.e("OrderActivity", t.getMessage());
                                    t.printStackTrace();
                                }
                            });
                        }
                    });
                }

                builder.setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        dialogInterface.dismiss();
                    }
                });
                builder.setView(linearLayout);
                AlertDialog dialog = builder.create();
                dialog.show();
            }
        });

        findViewById(R.id.markPlayed).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                final AlertDialog.Builder builder = new AlertDialog.Builder(OrderActivity.this);
                builder.setTitle("Choose event: ");

                LinearLayout linearLayout = new LinearLayout(OrderActivity.this);
                linearLayout.setOrientation(LinearLayout.VERTICAL);

                RadioGroup radioGroup = new RadioGroup(OrderActivity.this);
                radioGroup.setLayoutParams(new LinearLayout.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT, ViewGroup.LayoutParams.WRAP_CONTENT));

                int j = 0;

                for (final Event event : order.getEvents()) {
                    if (!event.getPivot().isPlayed()) {
                        RadioButton radioButton = new RadioButton(OrderActivity.this);
                        radioButton.setText(event.getName());
                        radioButton.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                            @Override
                            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {
                                if (b) {
                                    playedEvent = order.getId();
                                }
                            }
                        });

                        radioGroup.addView(radioButton);
                    } else {
                        j++;
                    }
                }

                if (j==order.getEvents().size()) {
                    TextView textView = new TextView(OrderActivity.this);
                    SpannableString ss = new SpannableString("All events have been marked as played!\nPlease contact Faraz Ali/Supriyo Das if there's any issue!");
                    ss.setSpan(new ClickableSpan() {
                        @Override
                        public void onClick(@NonNull View view) {
                            startActivity(new Intent(Intent.ACTION_DIAL).setData(Uri.parse("tel:+917044728852")));
                        }
                    }, 52, 61, Spanned.SPAN_EXCLUSIVE_EXCLUSIVE);
                    ss.setSpan(new ClickableSpan() {
                        @Override
                        public void onClick(@NonNull View view) {
                            startActivity(new Intent(Intent.ACTION_DIAL).setData(Uri.parse("tel:+918013206937")));
                        }
                    }, 62, 73, Spanned.SPAN_EXCLUSIVE_EXCLUSIVE);
                    textView.setText(ss);
                    textView.setMovementMethod(LinkMovementMethod.getInstance());
                    textView.setHighlightColor(Color.TRANSPARENT);
                    LinearLayout.LayoutParams layoutParams = new LinearLayout.LayoutParams(ViewGroup.LayoutParams.WRAP_CONTENT, ViewGroup.LayoutParams.WRAP_CONTENT);
                    layoutParams.setMargins(20, 10, 10, 10);
                    textView.setLayoutParams(layoutParams);
                    textView.setTextSize(18);
                    textView.setTextColor(getResources().getColor(android.R.color.black));
                    linearLayout.addView(textView);
                } else {
                    linearLayout.addView(radioGroup);
                    builder.setPositiveButton("Continue", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialogInterface, int i) {
                            progressDialog.show();
                            apiService.markPlayed(order.getId(), playedEvent).enqueue(new Callback<GlobalResponse>() {
                                @Override
                                public void onResponse(Call<GlobalResponse> call, Response<GlobalResponse> response) {
                                    progressDialog.dismiss();
                                    Log.e("OrderActivity", response.code()+"");
                                    if (response.isSuccessful()) {
                                        Toast.makeText(OrderActivity.this, "Order updated successfully!", Toast.LENGTH_LONG).show();
                                        order = response.body().getSuccess().getOrder();
                                        populateEvents();
                                    } else {
                                        Toast.makeText(OrderActivity.this, "Something went wrong!", Toast.LENGTH_LONG).show();
                                    }
                                }

                                @Override
                                public void onFailure(Call<GlobalResponse> call, Throwable t) {
                                    progressDialog.dismiss();
                                    Toast.makeText(OrderActivity.this, "Something went wrong!", Toast.LENGTH_LONG).show();
                                    Log.e("OrderActivity", t.getMessage());
                                    t.printStackTrace();
                                }
                            });
                        }
                    });
                }

                builder.setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        dialogInterface.dismiss();
                    }
                });
                builder.setView(linearLayout);
                AlertDialog dialog = builder.create();
                dialog.show();
            }
        });
    }

    private void populateTeam() {
        for (Member member : order.getTeam().getMembers()) {
            TableRow tr = new TableRow(this);
            tr.setId(i);

            TableRow.LayoutParams param = new TableRow.LayoutParams(
                    TableRow.LayoutParams.WRAP_CONTENT,
                    TableRow.LayoutParams.WRAP_CONTENT,
                    1
            );
            param.setMargins(5, 5, 5, 5);

            TextView t1 = new TextView(this);
            t1.setId(i+222);
            t1.setLayoutParams(param);
            t1.setGravity(Gravity.CENTER);
            t1.setText(member.getName());
            t1.setTextSize(17);

            TextView t2 = new TextView(this);
            t2.setId(i+333);
            t2.setLayoutParams(param);
            t2.setGravity(Gravity.CENTER);
            t2.setText(member.getCollegeId());
            t2.setTextSize(17);

            TextView t3 = new TextView(this);
            t3.setId(i+444);
            t3.setLayoutParams(param);
            t3.setGravity(Gravity.CENTER);
            t3.setText(member.getCollege());
            t3.setTextSize(17);

            TextView t = new TextView(this);
            t.setId(i+111);
            t.setLayoutParams(param);
            t.setGravity(Gravity.CENTER);
            t.setText(member.getYear());
            t.setTextSize(17);

            if (member.getId() .equals(order.getTeam().getLeader().getId())) {
                tr.setBackgroundColor(getResources().getColor(R.color.colorAccent));
                t.setTextColor(getResources().getColor(android.R.color.white));
                t1.setTextColor(getResources().getColor(android.R.color.white));
                t2.setTextColor(getResources().getColor(android.R.color.white));
                t3.setTextColor(getResources().getColor(android.R.color.white));
            }

            tr.addView(t1);
            tr.addView(t2);
            tr.addView(t3);
            tr.addView(t);

            membersTable.addView(tr);
            i++;
        }

        TextView teamName = findViewById(R.id.teamName);
        teamName.setText(order.getTeam().getName());
        teamName.setVisibility(View.VISIBLE);
    }

    private void populateSolo() {
        Member member = order.getParticipant();
        TableRow tr = new TableRow(this);
        tr.setId(i);

        TableRow.LayoutParams param = new TableRow.LayoutParams(
                TableRow.LayoutParams.WRAP_CONTENT,
                TableRow.LayoutParams.WRAP_CONTENT,
                1
        );
        param.setMargins(5, 5, 5, 5);

        TextView t1 = new TextView(this);
        t1.setId(i+222);
        t1.setLayoutParams(param);
        t1.setGravity(Gravity.CENTER);
        t1.setText(member.getName());
        t1.setTextSize(17);

        TextView t2 = new TextView(this);
        t2.setId(i+333);
        t2.setLayoutParams(param);
        t2.setGravity(Gravity.CENTER);
        t2.setText(member.getCollegeId());
        t2.setTextSize(17);

        TextView t3 = new TextView(this);
        t3.setId(i+444);
        t3.setLayoutParams(param);
        t3.setGravity(Gravity.CENTER);
        t3.setText(member.getCollege());
        t3.setTextSize(17);

        TextView t = new TextView(this);
        t.setId(i+111);
        t.setLayoutParams(param);
        t.setGravity(Gravity.CENTER);
        t.setText(member.getYear());
        t.setTextSize(17);

        tr.addView(t1);
        tr.addView(t2);
        tr.addView(t3);
        tr.addView(t);

        membersTable.addView(tr);
    }

    private void populateEvents() {

        eventsTable.removeAllViews();

        for (Event event : order.getEvents()) {
            TableRow tr = new TableRow(this);
            tr.setId(i);

            TableRow.LayoutParams param = new TableRow.LayoutParams(
                    TableRow.LayoutParams.WRAP_CONTENT,
                    TableRow.LayoutParams.WRAP_CONTENT,
                    1
            );
            param.setMargins(5, 5, 5, 5);

            TextView t1 = new TextView(this);
            t1.setId(i+222);
            t1.setLayoutParams(param);
            t1.setGravity(Gravity.CENTER);
            t1.setText(event.getName());
            t1.setTextSize(17);

            TextView t2 = new TextView(this);
            t2.setId(i+333);
            t2.setLayoutParams(param);
            t2.setGravity(Gravity.CENTER);
            t2.setText(String.valueOf(event.getPrice()));
            t2.setTextSize(17);

            TextView t3 = new TextView(this);
            t3.setId(i+444);
            t3.setLayoutParams(param);
            t3.setGravity(Gravity.CENTER);
            String isPaid = event.getPivot().isPaid() ? "Paid" : "Not Paid";
            t3.setBackgroundColor(event.getPivot().isPaid() ? getResources().getColor(R.color.success) : getResources().getColor(R.color.danger));
            t3.setTextColor(getResources().getColor(android.R.color.white));
            t3.setText(isPaid);
            t3.setTextSize(17);

            TextView t = new TextView(this);
            t.setId(i+111);
            t.setLayoutParams(param);
            t.setGravity(Gravity.CENTER);
            String isPlayed = event.getPivot().isPlayed() ? "Played" : "Not Played";
            t.setBackgroundColor(event.getPivot().isPlayed() ? getResources().getColor(R.color.success) : getResources().getColor(R.color.danger));
            t.setTextColor(getResources().getColor(android.R.color.white));
            t.setText(isPlayed);
            t.setTextSize(17);

            tr.addView(t1);
            tr.addView(t2);
            tr.addView(t3);
            tr.addView(t);

            eventsTable.addView(tr);
            i++;
        }
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        if (item.getItemId()==android.R.id.home) {
            finish();
        }

        return false;
    }
}
