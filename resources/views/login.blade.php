<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petshop KFZ | Log in</title>    
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
</head>
<style>
    /* CSS untuk mengatur gambar ke tengah halaman */
    .center-image {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 30; /* Mengisi tinggi layar sepenuhnya */
    }
    .center-image img {
        max-width: 50%; /* Ukuran gambar sedang (50% lebar) */
        height: auto; /* Biarkan tinggi mengikuti lebar asli */
    }
    .card-pink{
      color: rgb(247, 160, 175)
    }
</style>
<body class="hold-transition login-page dark-mode">
<div class="login-box dark-mode">
  <!-- /.login-logo -->
    <div class="card card-outline card-light elevation-5">
    <div class="card-header text-center">
        <a href="#" class="h1"><b>PetShop</b>KFZ</a>
    </div>
    <div class="center-image">
        <img src="data:image/jpeg;base64,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" alt="Petshop Logo" class="brand-image img-30 img-circle elevation-3" style="opacity: .8">
    </div>
    <div class="card-body">
        <p class="login-box-msg">Log In</p>

    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{ $err }}</p>
    @endforeach
    @endif

    <form action="{{ route('login.action') }}" method="post">
        @csrf
        <div class="input-group mb-3">
        <input name="username" value="{{ old('username') }}" type="username" class="form-control" placeholder="Username">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
        <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
            
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block shadow">Log in</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
        <!-- /.social-auth-links -->
        {{-- <p class="mb-0">
            <a href="{{url('register')}}" class="text-center">Register a new membership</a>
        </p> --}}
    </div>
    <!-- /.card-body -->
</div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
</body>
</html>