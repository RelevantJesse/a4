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
Route::get("/events", "EventsController@index");

Route::get("/equipment/new", "EquipmentController@addNewEquipment");
Route::post("/equipment/new", "EquipmentController@saveNewEquipment");

Route::get("/event/new", "EventsController@addNewEvent");
Route::post("/event/new", "EventsController@saveNewEvent");

Route::get("/equipment/edit/{id}", "EquipmentController@editEquipmentItem");
Route::post("/equipment/edit/{id}", "EquipmentController@saveEquipmentItem");

Route::get("/event/edit/{id}", "EventsController@editEvent");
Route::post("/event/edit/{id}", "EventsController@saveEvent");

Route::get("/equipment/delete/{id}", "EquipmentController@deleteEquipmentItem");
Route::get("/event/delete/{id}", "EventsController@deleteEvent");
