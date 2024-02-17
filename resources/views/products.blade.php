        @extends('adminlte')
        @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
                    <h3 class="card-title">Products List</h3>
                </div>
                <div class="card-body">
                    @if($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                    @endif
                    @if (Auth::user()->role == 'admin')
                    <a href="{{ route('products.create') }}" class="btn btn-success shadow">Tambah Produk <i class="nav-icon fas fa-plus text-home"></i></a>
                    @endif
                    @if (Auth::user()->role !== 'kasir')
                    <a href="{{ url('products/pdf') }}" class="btn btn-warning shadow"><i class="nav-icon fas fa-file-pdf text-home"></i> Unduh PDF</a>
                    <br><br>
                    @endif
                    <table id="mytable" class="display">
                        <thead>
                            <tr>
                                <th>Nama Products</th>
                                <th>Harga Products</th>
                                <th>Kategori Products</th>
                                <th>stock products</th>
                                @if (Auth::user()->role == 'owner')
                                <th>Tanggal Masuk</th>
                                @endif
                                @if (Auth::user()->role == 'admin')
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($productsM as $products)
                            <tr>
                                <td>{{ $products->nama_produk }}</td>
                                <td>Rp.{{ number_format ($products->harga_produk)}}</td>
                                <td>Makanan {{ $products->kategori }}</td>
                                <td>{{ $products->stock_produk }}</td>
                                @if (Auth::user()->role == 'owner')
                                <td>{{ $products->created_at }}</td>
                                @endif
                                @if (Auth::user()->role == 'admin')
                                <td>
                                    <form action="{{ route('products.destroy', $products->id) }}" method="POST">
                                        <a href="{{ route('products.edit', $products->id) }}" class="btn btn-sm btn-warning shadow"><i class="nav-icon fas fa-pen text-home"></i>  Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger shadow" onclick="return confirm('Konfirmasi Hapus Data !?');"><i class="nav-icon fas fa-trash text-home"></i>  Hapus</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
            <!-- /.card -->
        
        </section>
        <!-- /.content -->
        @endsection