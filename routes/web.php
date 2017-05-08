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
    return view('welcome');
});

Route::get("/equipment", "EquipmentController@index");

Route::get("/equipment/new", "EquipmentController@addNewEquipment");
Route::post("/equipment/new", "EquipmentController@saveNewEquipment");
