@extends('adminlte')
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>dashboard Page</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard')}}">Home</a></li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
      
  <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-box"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Products</span>
                  <div class="count">{{ $totalproduk }}</div>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Transaction</span>
                  <div class="count">{{ $totaltransaksi }}</div>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
  
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
  
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Income</span>
                  <div class="count">Rp.{{number_format ($totaluangbayar) }}</div>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">employee</span>
                  <div class="count">{{ $totaluser }}</div>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
              <div class="card-body">
                <!-- /.d-flex -->
              </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <header
                style="background: linear-gradient(to right, rgb(0, 0, 128), rgb(45, 45, 45), rgb(128, 0, 32)); color: #fff; text-align: center; padding: 20px; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px; position: relative;">
                <h1 style="margin: 0; font-size: 36px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Selamat Datang - {{ Auth::User()->name }} | [{{ Auth::User()->role }}]
                </h1>
          </header>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
                <!-- /.d-flex -->
            </div>
            <!-- /.card -->
<style>
  body {
        margin: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f2f2f2;
        /* Set a light background color */
    }

    header {
        color: #fff;
        text-align: center;
        padding: 20px;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        position: relative;
    }

    header::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.2;
        z-index: -1;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }
</style>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection