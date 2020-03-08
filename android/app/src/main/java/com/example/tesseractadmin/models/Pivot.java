package com.example.tesseractadmin.models;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import java.io.Serializable;

public class Pivot implements Serializable {
    @SerializedName("order_id")
    @Expose
    private Integer orderId;
    @SerializedName("event_id")
    @Expose
    private Integer eventId;
    @SerializedName("paid")
    @Expose
    private Integer paid;
    @SerializedName("played")
    @Expose
    private Integer played;

    public Integer getOrderId() {
        return orderId;
    }

    public void setOrderId(Integer orderId) {
        this.orderId = orderId;
    }

    public Integer getEventId() {
        return eventId;
    }

    public void setEventId(Integer eventId) {
        this.eventId = eventId;
    }

    public Integer getPaid() {
        return paid;
    }

    public void setPaid(Integer paid) {
        this.paid = paid;
    }

    public boolean isPaid() { return paid == 1; }

    public boolean isPlayed() { return played == 1; }

    public Integer getPlayed() {
        return played;
    }

    public void setPlayed(Integer played) {
        this.played = played;
    }
}
