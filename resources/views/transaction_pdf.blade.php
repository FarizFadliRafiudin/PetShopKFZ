<h1>Transactions List</h1>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>Nomor Unik</th>
    <th>Nama Pelanggan</th>
    <th>Nama Produk</th>
    <th>Harga Produk</th>
    <th>Uang Bayar</th>
    <th>Uang Kembali</th>
    <th>Tanggal</th> 
</tr>
@foreach ($transactionM as $transaction)
<tr>
    <td>{{ $transaction->nomor_unik}}</td>
    <td>{{ $transaction->nama_pelanggan}}</td>
    <td>{{ $transaction->nama_produk}}</td>
    <td>Rp.{{ number_format ($transaction->harga_produk) }}</td>
    <td>Rp.{{ number_format ($transaction->uang_bayar) }}</td>
    <td>Rp.{{ number_format ($transaction->uang_kembali) }}</td>
    <td>{{ $transaction->createtrans}}</td>
</tr>
@endforeach
</table>