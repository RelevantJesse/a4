<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;

class EquipmentController extends Controller
{
  public function index() {
    $allEquipment = Equipment::all();

    dump($allEquipment->toArray());
  }
}
