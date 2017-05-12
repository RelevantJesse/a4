@extends("layouts.master")

@section("title")
MPS - Edit Event
@endsection

@section("content")
<?php if(count($errors) > 0){ ?>
  <div class="col-md-12 centerdiv">
    <div class="alert alert-danger">
      <ul>
        <?php foreach ($errors->all() as $error): ?>
          <li>{{ $error }}</li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <?php } ?>

  <a href="/events"><- Back to Events</a>

  <div class="centerdiv">
    <h1>Edit Event</h1>
  </div>

  <div class="innerdiv">
    <small>* Required fields</small>

    <form method='POST' action='/event/edit/{{ $event->id }}'>
      {{ csrf_field() }}

      <div class="form-group row">
        <label for="date" class="col-2 col-form-label">Event Date/Time*</label>
        <div class="col-10">
          <input class="form-control" type="datetime-local" id="date" name="date" minlength="3" maxlength="50" required="true" value="{{ old("date") ? old("date") : strftime('%Y-%m-%dT%H:%M', strtotime($event->event_date)) }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="address" class="col-2 col-form-label">Address* (max 100 characters)</label>
        <div class="col-10">
          <input class="form-control" type="text" id="address" name="address" maxlength="100" required="true" value="{{ old("address") ? old("address") : $event->address }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="city" class="col-2 col-form-label">City* (max 50 characters)</label>
        <div class="col-10">
          <input class="form-control" type="text" id="city" name="city" maxlength="50" required="true" value="{{ old("city") ? old("city") : $event->city }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="state" class="col-2 col-form-label">State* (2 characters)</label>
        <div class="col-10">
          <input class="form-control" type="text" id="state" name="state" minlength="2" maxlength="2" required="true" value="{{ old("state") ? old("state") : $event->state }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="zip" class="col-2 col-form-label">Zip* (5 characters)</label>
        <div class="col-10">
          <input class="form-control" type="text" id="zip" name="zip" minlength="5" maxlength="5" required="true" value="{{ old("zip") ? old("zip") : $event->zip }}">
        </div>
      </div>

      <div class="table-responsive">
        <h2>Required Equipment</h2>
        <table class="table table-bordered table-hover" id="tblEquipment">
          <thead>
            <th>Type</th>
            <th>Model</th>
            <th>Serial</th>
          </thead>
          <tbody>
            <?php foreach ($requiredEquipment as $equipment): ?>
              <tr>
                <td id="id" hidden="true">{{ $event->id }}</td>
                <td hidden="true">{{ $equipment->id }}</td>
                <td>{{ $equipment->type->name }}</td>
                <td>{{ $equipment->model }}, {{ $event->state }} {{ $event->zip }}</td>
                <td>{{ $equipment->serial }}</td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <label class="col-md-12" for="types">Item</label>
      <div class="col-md-8 form-group row">

        <select class="form-control" id="ddlItem" name="item">
          <?php foreach ($remainingEquipment as $item): ?>
            <option value="{{ $item->id }}">{{ $item->type->name }} - {{ $item->model }} - {{ $item->serial }}</option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-2 form-group row">
      </div>
      <div class="col-md-3 form-group row">
        <button class="btn" onclick="addRow();return false;">Add Item</button>
      </div>

      <div class="col-md-12 form-group row">
      </div>

      <input type="text" id="requiredItems" name="requiredItems" hidden="true" value="{{ $requiredIds }}">

      <div class="form-group row">
        <button type="submit" class="btn btn-primary col-md-5">Save</button>
        <div class="col-md-1"></div>
        <button type="button" class="btn btn-danger col-md-5" onclick="location.href='/event/delete/{{ $event->id }}';">Delete</button>
      </div>
    </form>
  </div>
  @endsection

  @push("body")
  <script>
  function addRow() {
    var table = document.getElementById("tblEquipment");
    var res = $( "#ddlItem option:selected" ).text().split("-");
    var row = table.insertRow(tblEquipment.length);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = res[0];
    cell2.innerHTML = res[1];
    cell3.innerHTML = res[2];

    var txtItemIds = document.getElementById("requiredItems");
    txtItemIds.value = txtItemIds.value.concat($("#ddlItem option:selected").val(), ",");

    var ddlItem = document.getElementById("ddlItem");
    ddlItem.remove(ddlItem.selectedIndex);
  }

  $('.table > tbody > tr').click(function() {
    var table = document.getElementById("tblEquipment").deleteRow($(this).index() + 1);
  });
  </script>
  @endpush
