@extends("layouts.master")

@section("title")
  MPS - Add Equipment
@endsection

@section("content")
<?php if($message){ ?>
  <div class="alert alert-success" role="alert">
    <strong>Success!</strong> $message
  </div>
<?php } ?>
<?php if($error){ ?>
  <div class="alert alert-danger" role="alert">
    <strong>Error!</strong> $error
  </div>
<?php } ?>

<div class="centerdiv">
  <h1>Add new item</h1>
</div>

<div class="innerdiv">
  <small>* Required fields</small>

  <form method='POST' action='/equipment/new'>
    {{ csrf_field() }}

    <div class="form-group row">
      <label for="types">Item Type*</label>
      <select class="form-control" id="types" required="true">
        <option value="">-- Select Type --</option>
        <?php foreach ($types as $type): ?>
          <option value="{{ $type->id }}">{{ $type->name }}</option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group row">
      <label for="model" class="col-2 col-form-label">Model number*</label>
      <div class="col-10">
        <input class="form-control" type="text" id="model" maxlength="100" required="true">
      </div>
    </div>
    <div class="form-group row">
      <label for="serial" class="col-2 col-form-label">Serial number*</label>
      <div class="col-10">
        <input class="form-control" type="text" id="serial" maxlength="100" required="true">
      </div>
    </div>
    <div class="form-group row">
      <button type="submit" class="btn btn-primary btn-block">Add</button>
    </div>
  </form>
</div>
@endsection

@push("body")
@endpush
