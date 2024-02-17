<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PetShop KFZ | {{ $subtittle }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css')}}">
  <!-- datatables -->
  <link rel="stylesheet" href="{{ url('//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->  
      <a href="{{ url('dashboard') }}" class="brand-link">
      {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">PetShop KFZ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          <a href="#" class="d-block">Hi, {{ Auth::User()->name }} | [{{ Auth::User()->role }}]</a>
        </div>
      </div>

    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url ('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (Auth::user()->role == 'admin')
          <li class="nav-item">
            <a href="{{ url ('products')}}" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>products</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ url ('transaction')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>transaction</p>
            </a>
          </li>
          <li class="nav-item">@if (Auth::user()->role == 'admin')
            <a href="{{ url ('users')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>users</p>
            </a>
          </li>
          @endif
          <li class="nav-item">@if (Auth::user()->role != 'kasir')
            <a href="{{ url ('log')}}" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>log</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ url ('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p class="text-danger">logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="">Fariz Fadli Rafiudin</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ url('dist/js/demo.js') }}"></script> --}}

<!-- OPTIONAL SCRIPTS -->
<script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('dist/js/pages/dashboard3.js') }}"></script>
<!-- datables -->
<script src="{{ url('//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        let table = new DataTable('#mytable');
    </script>
</body>
</html>