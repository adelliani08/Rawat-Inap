<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEM INFORMASI RAWAT INAP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("admin_lte/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("admin_lte/dist/css/adminlte.min.css")}}">
  @yield("extra_head")

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav skin-blue">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-lightblue navbar-dark navbar-static-top justify-content-center">
      <!-- Left navbar links -->
      <div class="col-11 row">
        <ul class="navbar-nav">

          <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link text-white">PELAYANAN KESEHATAN</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          @if (Auth::check())
          <li class="nav-item">

            <a href="{{route("user.show")}}" class="d-block nav-link"><i class="fa fa-user"></i>
              {{Auth::user()->username}}</a>

          </li>
          <li class="nav-item">

                <a href="{{route("logout")}}" class="d-block nav-link"><i class="fa fa-power-off"></i>
                  Logout</a>
              
          </li>
          @endif
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        @yield("main_content")
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset("admin_lte/plugins/jquery/jquery.min.js")}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset("admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset("admin_lte/dist/js/adminlte.min.js")}}"></script>
  @yield("extra-script")
</body>

</html>