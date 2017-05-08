@extends("layouts.master")

@section("title")
  MPS - Equipment
@endsection

@section("content")
<?php foreach ($allEquipment as $equipment): ?>
  <div>
    {{ $equipment->model }}
  </div>
<?php endforeach; ?>

<a href="equipment/new">Create New</a>
@endsection

@push("body")
@endpush
