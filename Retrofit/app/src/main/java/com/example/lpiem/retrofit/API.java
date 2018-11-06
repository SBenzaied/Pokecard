package com.example.lpiem.retrofit;

import java.util.List;

import retrofit2.*;
import retrofit2.http.*;

public interface API {

    String url= "https://pokeapi.co/api/v2/";
    @GET("pokemon/")

    Call <Pokemon>getResults();




}
