<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
      <link rel='icon' href="https://scontent.fhan5-6.fna.fbcdn.net/v/t1.6435-9/118523325_100106701835979_8315065556983610281_n.jpg?_nc_cat=105&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=zM7FbwfWUtoAX-WKfDR&_nc_ht=scontent.fhan5-6.fna&oh=5b90faa60937540f36071c42a47d9d2a&oe=618F054F"  />
        <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.css')}}">
        <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
    @yield('css')
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      @include('partials.header')
      @include('partials.sidebar')
      @yield('content')
      @include('partials.footer')
    </div>

    <script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminLTE/dist/js/adminlte.min.js')}}"></script>
    @yield('js')
  </body>
</html>
