<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect('functionary/list');
});

Route::get('/login', "Controller@login");
Route::get('/exit', "Controller@exit");
Route::get('/binds', "Controller@binds");

Route::group(["prefix" => "functionary"], function () {
    Route::get('/', function () {
        return redirect('functionary/list');
    });

    Route::get("/register", "CL_Functionary@register");
    Route::post("/register", "CL_Functionary@register");

    Route::get("/list", "CL_Functionary@list");

    Route::post("/search", "CL_Functionary@search");

    Route::get("/delete/{id}", "CL_Functionary@del");

    Route::get("/change/{id}", "CL_Functionary@change");
    Route::post("/change/{id}", "CL_Functionary@change");

    Route::get("/salary/{id}", "CL_Functionary@salary");
});


Route::group(["prefix" => "patient"], function () {
    Route::get('/', function () {
        return redirect('patient/list');
    });

    Route::get("/register", "CL_Patient@register");
    Route::post("/register", "CL_Patient@register");

    Route::get("/list", "CL_Patient@list");
});