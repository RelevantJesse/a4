@extends("layouts.master")

@section("title")
  MPS - Events
@endsection

@push("EventsActive")
class="active"
@endpush

@section("content")
<div class="table-responsive">
  <h2>Events</h2>
  <table class="table table-bordered table-hover">
    <thead>
      <th>Address</th>
      <th>City, State Zip</th>
      <th>Event Date</th>
    </thead>
    <tbody>
      <?php foreach ($allEvents as $event): ?>
        <tr>
          <td id="id" hidden="true">{{ $event->id }}</td>
          <td>{{ $event->address }}</td>
          <td>{{ $event->city }}, {{ $event->state }} {{ $event->zip }}</td>
          <td>{{ $event->event_date }}</td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<div class="rightalign">
  <a href="event/new"><button class="btn btn-primary">Add new event</button></a>
</div>
<br>
@endsection

@push("body")
<script>
$('.table > tbody > tr').click(function() {
  window.location.href = "/event/edit/" + $(this).find('#id').text();
});
</script>
@endpush
