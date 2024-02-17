@extends('adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Log page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Log</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
  
    <!-- Main content -->
    <section class="content">
  
    <!-- Default box -->
    <div class="card elevation-2">
        <div class="card-header">
        <h3 class="card-title">Log List</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('log.index') }}" method="get" class="form-inline">
                <div class="form-group mx-2">
                    <label for="start_date" class="mr-2">Tanggal Awal :</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="form-group mx-2">
                    <label for="end_date" class="mr-2">Tanggal Akhir :</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
                <a href="{{ route('log.index') }}" class="btn btn-danger">
                    <i class="fas fa-undo"></i>
                </a>
            </form>
            <table id="mytable" class="display">
                <thead>
                    <tr>
                        <th>Nama User</th>
                        <th>Aktivitas</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($query as $query)
                <tr>
                    <td>{{ $query->name }}</td>
                    <td>{{ $query->activity }}</td>
                    <td>{{ $query->created_at }}</td>
                </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <!-- /.card -->
  
</section>
<!-- /.content -->
@endsection