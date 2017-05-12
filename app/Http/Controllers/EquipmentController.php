<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\Type;
use Session;

class EquipmentController extends Controller
{
  public function index() {
    $allEquipment = Equipment::all();

    return view("equipment.index")->with([
      "allEquipment" => $allEquipment
    ]);
  }

  /**
    * GET
    * /equipment/new
    */
  public function addNewEquipment() {
    return view("equipment.new")->with([
      "types" => Type::all(),
      "error" => ""
    ]);
  }

  /**
    * POST
    * /equipment/new
    * Process the form for adding a new equipment item
    */
    public function saveNewEquipment(Request $request) {
        $this->validate($request, [
            "modelNum"=> 'required|min:3|max:50',
            "serialNum" => 'required|min:3|max:50',
            "equipType" => 'required|not_in:0',
        ]);
        # Add new item to database
        $equipment = new Equipment();
        $equipment->model = $request->modelNum;
        $equipment->serial = $request->serialNum;
        $equipment->type_id = $request->equipType;
        $equipment->save();

        Session::flash("message", "Item " . $equipment->model . " - " . $equipment->serial . " created");

        return redirect("equipment");
    }

    /**
      * GET
      * /equipment/edit/{id}
      */
    public function editEquipmentItem($id) {

      $equipmentItem = Equipment::where("id", "=", $id)->first();

      return view("equipment.edit")->with([
        "types" => Type::all(),
        "equipmentItem" => $equipmentItem,
        "error" => ""
      ]);
    }

    /**
      * POST
      * /equipment/edit/{id}
      * Process the form for adding a new equipment item
      */
      public function saveEquipmentItem(Request $request, $id) {
          $this->validate($request, [
              "modelNum"=> 'required|min:3|max:50',
              "serialNum" => 'required|min:3|max:50',
              "equipType" => 'required|not_in:0',
          ]);
          # Add new item to database
          $equipment = Equipment::where("id", "=", $id)->first();
          $equipment->model = $request->modelNum;
          $equipment->serial = $request->serialNum;
          $equipment->type_id = $request->equipType;
          $equipment->save();

          Session::flash("message", "Item " . $equipment->model . " - " . $equipment->serial . " saved");

          return redirect("equipment");
      }

      /**
        * GET
        * /equipment/delete/{id}
        */
      public function deleteEquipmentItem($id) {

        $equipmentItem = Equipment::where("id", "=", $id)->first();

        Session::flash("message", "Item " . $equipmentItem->model . " - " . $equipmentItem->serial . " deleted");

        $equipmentItem->events()->detach();
        $equipmentItem->delete();

        return redirect("equipment");
      }
}
