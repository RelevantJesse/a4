@extends("layouts.master")

@section("title")
  MPS - Edit Equipment Item
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

<a href="/equipment"><- Back to Equipment</a>

<div class="centerdiv">
  <h1>Edit item</h1>
</div>

<div class="innerdiv">
  <small>* Required fields</small>

  <form method='POST' action='/equipment/edit/{{ $equipmentItem->id }}'>
    {{ csrf_field() }}

    <div class="form-group row">
      <label for="types">Item Type*</label>
      <select class="form-control" id="types" name="equipType" required="true">
        <?php foreach ($types as $type): ?>
          <option value="{{ $type->id }}" {{ $equipmentItem->type_id == $type->id ? "selected" : "" }}>{{ $type->name }}</option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group row">
      <label for="model" class="col-2 col-form-label">Model number* (3-50 characters)</label>
      <div class="col-10">
        <input class="form-control" type="text" id="model" name="modelNum" minlength="3" maxlength="50" required="true" value="{{ $equipmentItem->model }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="serial" class="col-2 col-form-label">Serial number* (3-50 characters)</label>
      <div class="col-10">
        <input class="form-control" type="text" id="serial" name="serialNum" minlength="3" maxlength="50" required="true" value="{{ $equipmentItem->serial }}">
      </div>
    </div>
    <div class="form-group row">
      <button type="submit" class="btn btn-primary col-md-5">Save</button>
      <div class="col-md-1"></div>
      <button type="button" class="btn btn-danger col-md-5" onclick="location.href='/equipment/delete/{{ $equipmentItem->id }}';">Delete</button>
    </div>
  </form>
</div>
@endsection

@push("body")
@endpush
