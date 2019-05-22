<?php

// all api routes

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/login", "AuthenticationController@login")->name("login");
Route::post("/register", "AuthenticationController@register")->name("register");
Route::post("/logout", "AuthenticationController@logout")->name("logout");

// these routes are protected and only accessible when authenticated
Route::middleware("jwt.auth")->get("/devices", "DeviceController@index")->name("devices.get");
Route::middleware("jwt.auth")->get("/devices/{id}", "DeviceController@show")->name("devices.show");
Route::middleware("jwt.auth")->post("/devices/{id}", "DeviceController@update")->name("devices.update");
