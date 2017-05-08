<!DOCTYPE html>
<html>
<head>

  <title>
    @yield("Title", "Mountain Production Services")
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
      <br><br>
      @yield("content")
    </div>
  </section>

  <script src="scripts/jquery-3.1.1.min.js"></script>
  @stack("body")
</body>
</html>
