package com.example.tesseractadmin.remote;

import com.example.tesseractadmin.models.GlobalResponse;

import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.Headers;
import retrofit2.http.Path;


public interface APIService {
    @Headers("Accept: application/json")
    @GET("orders/{orderId}/details")
    Call<GlobalResponse> getOrderDetails(@Path("orderId") int orderId);
}
