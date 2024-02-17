@extends('adminlte')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h2 class="h3 mb-4 text-gray-800">Transactions Page</h2>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Data Transactions</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('transaction.index') }}" class="btn btn-secondary">Kembali</a>
            <br><br>

            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nomor Unik</label>
                    <input name="nomor_unik" type="number" class="form-control" value="{{ random_int(1000000000,9999999999) }}" readonly>
                    @error('nomor_unik')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input name="nama_pelanggan" type="text" class="form-control" placeholder="Ex. Eben">
                    @error('nama_pelanggan')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama produk + Harga Produk</label>
                    <select name="id_produk" id="id_produk" class="form-control" required>
                        <option value="">-Pilih Produk-</option>
                        @foreach ($productsM as $product)
                            <option value="{{ $product->harga_produk }}">{{ $product->nama_produk }} - Rp.{{ number_format($product->harga_produk) }}</option>
                        @endforeach
                    </select>
                    @error('harga_produk')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Uang Bayar</label>
                    <input name="uang_bayar" id="uang_bayar" type="text" class="form-control" placeholder="Ex. 5000">
                    @error('uang_bayar')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Uang Kembali</label>
                    <input name="uang_kembali" id="uang_kembali" type="text" class="form-control" readonly>
                    @error('uang_kembali')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
</section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function hitungUangKembali() {
            var uangBayar = parseFloat(document.getElementById('uang_bayar').value) || 0;
            var hargaProduk = parseFloat(document.getElementById('id_produk').value) || 0;
            var uangKembali = uangBayar - hargaProduk;

            // Pastikan uang kembali tidak kurang dari 0
            uangKembali = Math.max(0, uangKembali);

            document.getElementById('uang_kembali').value = uangKembali.toFixed(0);
            document.getElementById('uang_kembali').value = uangKembali.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
        }

        // Panggil fungsi hitungUangKembali saat input diubah pada field uang_bayar
        document.getElementById('uang_bayar').addEventListener('input', hitungUangKembali);

        // Panggil fungsi hitungUangKembali secara otomatis saat halaman dimuat
        hitungUangKembali();
    });
</script>