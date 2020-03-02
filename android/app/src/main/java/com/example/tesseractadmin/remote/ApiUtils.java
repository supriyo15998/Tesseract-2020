package com.example.tesseractadmin.remote;

public class ApiUtils {
    private ApiUtils() {}

    private static final String BASE_URL = "https://api.tesseractgnit.com/api/";

    public static APIService getAPIService() {

        return RetrofitClient.getClient(BASE_URL).create(APIService.class);
    }
}
