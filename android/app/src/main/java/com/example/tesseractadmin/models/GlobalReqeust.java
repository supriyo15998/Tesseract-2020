package com.example.tesseractadmin.models;

import com.google.gson.annotations.SerializedName;

import java.util.List;

public class GlobalReqeust {
    @SerializedName("paidEvents")
    private List<Integer> paidEvents;

    public List<Integer> getPaidEvents() {
        return paidEvents;
    }

    public void setPaidEvents(List<Integer> paidEvents) {
        this.paidEvents = paidEvents;
    }
}
