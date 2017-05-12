@extends("layouts.master")

@section("title")
  MPS - Equipment
@endsection

@push("EquipmentActive")
class="active"
@endpush

@section("content")
<div class="table-responsive">
  <h2>Equipment</h2>
  <table class="table table-bordered table-hover">
    <thead>
      <th>Model</th>
      <th>Serial</th>
      <th>Type</th>
    </thead>
    <tbody>
      <?php foreach ($allEquipment as $equipment): ?>
        <tr>
          <td id="id" hidden="true">{{ $equipment->id }}</td>
          <td>{{ $equipment->model }}</td>
          <td>{{ $equipment->serial }}</td>
          <td>{{ $equipment->type->name }}</td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<div class="rightalign">
  <a href="equipment/new"><button class="btn btn-primary">Add new item</button></a>
</div>
<br>
@endsection

@push("body")
<script>
$('.table > tbody > tr').click(function() {
  window.location.href = "/equipment/edit/" + $(this).find('#id').text();
});
</script>
@endpush
