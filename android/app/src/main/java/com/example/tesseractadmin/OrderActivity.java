package com.example.tesseractadmin;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.Gravity;
import android.view.MenuItem;
import android.widget.TableLayout;
import android.widget.TableRow;
import android.widget.TextView;

import com.example.tesseractadmin.models.Event;
import com.example.tesseractadmin.models.Member;
import com.example.tesseractadmin.models.Order;

import java.util.List;

public class OrderActivity extends AppCompatActivity {


    private Order order;
    private TableLayout membersTable, eventsTable;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order);

        Intent intent = getIntent();
        order = (Order) intent.getSerializableExtra("order");

        membersTable = findViewById(R.id.membersTable);
        eventsTable = findViewById(R.id.eventsTable);

        getSupportActionBar().setTitle("Order " + order.getId());
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);

        int i = 1;

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
            String isPaid = event.getPivot().getPaid() == 1 ? "Paid" : "Not Paid";
            t3.setBackgroundColor(event.getPivot().getPaid() == 1 ? getResources().getColor(R.color.success) : getResources().getColor(R.color.danger));
            t3.setTextColor(getResources().getColor(android.R.color.white));
            t3.setText(isPaid);
            t3.setTextSize(17);

            TextView t = new TextView(this);
            t.setId(i+111);
            t.setLayoutParams(param);
            t.setGravity(Gravity.CENTER);
            String isPlayed = event.getPivot().getPlayed() == 1 ? "Played" : "Not Played";
            t.setBackgroundColor(event.getPivot().getPlayed() == 1 ? getResources().getColor(R.color.success) : getResources().getColor(R.color.danger));
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

        TextView teamName = findViewById(R.id.teamName);
        teamName.setText(order.getTeam().getName());
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        if (item.getItemId()==android.R.id.home) {
            finish();
        }

        return false;
    }
}
