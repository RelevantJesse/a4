<!DOCTYPE html>
<html>
<head>

  <title>
    @yield("title", "Mountain Production Services")
  </title>

  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
  <link href='{{ asset('css/main.css') }}' rel='stylesheet'>

  @stack("head")
</head>
<body>
  <section>
    <div class="maindiv">
      <img src="{{asset('images/MPSBanner.jpg')}}" width="100%" height="500px">


      <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li @stack("EquipmentActive")><a href="/equipment">Equipment</a></li>
        <li @stack("EventsActive")><a href="/events">Events</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

      <br><br>
      <?php if(Session::get("message")){ ?>
        <div class="alert alert-success" role="alert">
          <strong>Success!</strong> {{ Session::get("message") }}
        </div>
      <?php } ?>
      @yield("content")
    </div>
  </section>

  <script src="{{ asset('scripts/jquery-3.1.1.min.js') }}"></script>
  @stack("body")
</body>
</html>
