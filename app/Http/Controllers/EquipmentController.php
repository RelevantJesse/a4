<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\Type;

class EquipmentController extends Controller
{
  public function index() {
    $allEquipment = Equipment::all();

    return view("equipment.index")->with([
      "allEquipment" => $allEquipment
    ]);
  }

  public function addNewEquipment() {
    $error = "";
    $message = "";

    return view("equipment.new")->with([
      "types" => Type::all(),
      "error" => $error,
      "message" => $message
    ]);
  }
}
