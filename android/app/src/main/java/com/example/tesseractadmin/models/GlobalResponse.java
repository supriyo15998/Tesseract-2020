package com.example.tesseractadmin.models;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class GlobalResponse {
    @SerializedName("success")
    @Expose
    private Success success;
    @SerializedName("error")
    @Expose
    private Error error;

    public Success getSuccess() {
        return success;
    }

    public void setSuccess(Success success) {
        this.success = success;
    }

    public Error getError() {
        return error;
    }

    public void setError(Error error) {
        this.error = error;
    }
}
