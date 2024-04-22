
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/fontawesome-free/css')}}/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/icheck-bootstrap')}}/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Admin/dist/css')}}/adminlte.min.css">
  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  

</head>
<body class="hold-transition login-page">
    @yield('content')

<!-- jQuery -->
<script src="{{asset('Admin/plugins/jquery')}}/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('Admin/plugins/bootstrap/js')}}/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('Admin/dist/js')}}/adminlte.min.js"></script>
</body>
</html>
