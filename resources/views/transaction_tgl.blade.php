<h1>Transactions List Date</h1>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>No Unik</th>
            <th>Nama Pelaggan</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Uang Bayar</th>
            <th>Uang Kembali</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaction as $transaction)
        <tr>
            <td>{{ $transaction->nomor_unik }}</td>
            <td>{{ $transaction->nama_pelanggan }}</td>
            <td>{{ $transaction->nama_produk }}</td>
            <td>Rp.{{ number_format ($transaction->harga_produk) }}</td>
            <td>Rp.{{ number_format ($transaction->uang_bayar) }}</td>
            <td>Rp.{{ number_format ($transaction->uang_kembali) }}</td>
            <td>{{ $transaction->createtrans }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<br>
<h4 style="margin-bottom: 5px;"><u>Fariz Fadli Rafiudin., S.I.Kom</u></h4>
<p style="margin-top: 5px;">CEO PT.Petshop KFZ</p>
<br>