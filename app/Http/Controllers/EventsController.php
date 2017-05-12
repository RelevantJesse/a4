<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Type;
use App\Equipment;
use Session;

class EventsController extends Controller
{
  public function index() {
    $allEvents = Event::all();

    return view("events.index")->with([
      "allEvents" => $allEvents
    ]);
  }

  /**
  * GET
  * /equipment/new
  */
  public function addNewEvent() {
    return view("events.new")->with([
      "types" => Type::all(),
      "equipment" => Equipment::orderBy("type_id", "ASC")->orderBy("model", "ASC")->orderBy("serial", "ASC")->get(),
      "error" => ""
    ]);
  }

  /**
  * POST
  * /equipment/new
  * Process the form for adding a new equipment item
  */
  public function saveNewEvent(Request $request) {
    $this->validate($request, [
      "date"=> 'required|date',
      "address" => 'required|max:100',
      "city" => 'required|max:50',
      "state" => 'required|alpha|min:2|max:2',
      "zip" => 'required|digits:5',
      "requiredItems" => 'required',
    ]);

    # Add new item to database
    $event = new Event();
    $event->address = $request->address;
    $event->city = $request->city;
    $event->state = $request->state;
    $event->zip = $request->zip;
    $event->event_date = $request->date;
    $event->contact_id = 1;
    $event->save();
    $event->equipment()->sync(explode(",", rtrim($request->requiredItems, ",")));

    Session::flash("message", "Event created");

    return redirect("events");
  }

  /**
  * GET
  * /event/edit/{id}
  */
  public function editEvent($id) {
    $event = Event::where("id", "=", $id)->first();
    $requiredEquipment = $event->equipment;
    $remainingEquipment = Equipment::whereNotIn("id", $requiredEquipment->pluck("id"))->get();
    $requiredIds = implode(",", $requiredEquipment->pluck("id")->toarray());

    return view("events.edit")->with([
      "requiredEquipment" => $requiredEquipment,
      "remainingEquipment" => $remainingEquipment,
      "requiredIds" => strlen($requiredIds) > 0 ? $requiredIds . "," : "",
      "event" => $event,
      "error" => ""
    ]);
  }

  /**
  * POST
  * /event/edit/{id}
  * Process the form for adding a new equipment item
  */
  public function saveEvent(Request $request, $id) {
    $this->validate($request, [
      "date"=> 'required|date',
      "address" => 'required|max:100',
      "city" => 'required|max:50',
      "state" => 'required|min:2|max:2',
      "zip" => 'required|digits:5',
      "requiredItems" => 'required',
    ]);

    $event = Event::where("id", "=", $id)->first();
    $event->address = $request->address;
    $event->city = $request->city;
    $event->state = $request->state;
    $event->zip = $request->zip;
    $event->event_date = $request->date;
    $event->contact_id = 1;
    $event->save();
    $event->equipment()->sync(explode(",", rtrim($request->requiredItems, ",")));

    Session::flash("message", "Event saved");

    return redirect("events");
  }

  /**
  * GET
  * /equipment/delete/{id}
  */
  public function deleteEvent($id) {

    $event = Event::where("id", "=", $id)->first();

    Session::flash("message", "Event deleted");

    $event->equipment()->detach();
    $event->delete();

    return redirect("events");
  }
}
