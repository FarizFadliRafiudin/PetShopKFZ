@extends('adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Transactions page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Transactions</li>
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
            <h3 class="card-title">Transactions List</h3>
        </div>
        <div class="card-body">
            {{-- <form action="{{ route('transaction.index') }}" method="get">
                <div class="input-group">
                    <input type="text" type="search" name="search" class="form-control" placeholder="Masukan Nama Products" value="{{ $vcari }}">
                    <mr-1>
                    <button type="submit" class="btn btn-primary shadow">Cari</button>
                    <a href="{{ route('transaksi.index') }}">
                        <button type="button" class="btn btn-danger shadow">Reset</button>
                    </a>
                </div>
            </form>
            <br> --}}
            @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
            @endif
            @if (Auth::user()->role == 'kasir')
            <a href="{{ route('transaction.create') }}" class="btn btn-success shadow">Tambah Transactions <i class="nav-icon fas fa-plus text-home"></i></a>
            @endif
            @if (Auth::user()->role !== 'kasir')
            <a href="{{ url('transaction/pdf') }}" class="btn btn-warning shadow"><i class="nav-icon fas fa-file-pdf text-home"></i> Unduh PDF</a>
            <a href="{{ url('transaction/all') }}" class="btn btn-warning shadow"><i class="nav-icon fas fa-file-pdf text-home"></i> Unduh PDF Pertanggal</a>
            @endif
            <br><br>
            <form action="{{ route('transaction.index') }}" method="get" class="form-inline">
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
                <a href="{{ route('transaction.index') }}" class="btn btn-danger">
                    <i class="fas fa-undo"></i>
                </a>
            </form>
            <br>
            <table id="mytable" class="display table tb-bordered">
                <thead>
                    <tr>
                        <th>Nomor Unik</tah>
                        <th>Nama Pelanggan</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Uang Bayar</th>
                        <th>Uang Kembali</th>
                        <th>Tanggal</th> 
                        @if (Auth::user()->role !== 'owner')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                @if (count($transactionM) > 0)
                @foreach ($transactionM as $transaction)
                <tr>
                    <td>{{ $transaction->nomor_unik }}</td>
                    <td>{{ $transaction->nama_pelanggan }}</td>
                    <td>{{ $transaction->nama_produk }}</td>
                    <td>Rp.{{ number_format ($transaction->harga_produk) }}</td>
                    <td>Rp.{{ number_format ($transaction->uang_bayar) }}</td>
                    <td>Rp.{{ number_format ($transaction->uang_kembali) }}</td>
                    <td>{{ $transaction->createtrans}}</td>
                    @if (Auth::user()->role !== 'owner')
                    <td>
                        @if (Auth::user()->role == 'kasir')
                        <a href="{{ url('transaction/pdf2', $transaction->id_trans) }}" class="btn btn-sm btn-primary shadow"><i class="nav-icon fas fa-file-pdf text-home"></i>  Cetak Struk</a>
                        @endif
                        @if (Auth::user()->role == 'admin')
                        <form action="{{ route('transaction.delete', $transaction->id_trans) }}" method="POST">
                            <a href="{{ route('transaction.edit', $transaction->id_trans) }}" class="btn btn-sm btn-warning shadow"><i class="nav-icon fas fa-pen text-home"></i></a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger shadow" onclick="return confirm('Konfirmasi Hapus Data !?');"><i class="nav-icon fas fa-trash text-home"></i></button>
                        </form>
                        @endif
                    </td>
                    @endif
                </tr>
                @endforeach
                @else
                @endif
                </tbody>
            </table>
            <br>
        </div>
    </div>
    <!-- /.card -->
  
</section>
<!-- /.content -->
@endsection