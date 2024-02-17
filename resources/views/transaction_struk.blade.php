<!DOCTYPE html>
<html>
<head>
    <title>Invoice Transaksi #{{ $transaction->id_trans }}</title>
    <html>
        <head>
          <title>Petshop KFZ</title>
          <style>
            body {
              font-family: "Courier New", monospace;
              width: 400px;
              margin: 0 auto;
              padding: 20px;
              background-color: #f4f4f4;
            }
            .header {
              text-align: left;
              font-size: 24px;
              font-weight: bold;
              margin-bottom: 10px;
              color: #333;
              text-transform: uppercase;
            }
            .sub-header {
              text-align: center;
              font-size: 18px;
              font-weight: bold;
              margin-bottom: 20px;
              color: #333;
              text-transform: uppercase;
            }
            .transaction-info {
              font-size: 16px;
              margin-bottom: 20px;
              background-color: #fff;
              padding: 15px;
              border: 1px solid #ccc;
              border-radius: 5px;
              box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
              text-align: right; /* Align content to the right within transaction boxes */
            }
            .transaction-info p {
              margin: 5px 0;
              text-align: left; /* Align text to the left within transaction boxes */
            }
            .thank-you {
              text-align: center;
              font-size: 20px;
              margin-top: 20px;
              color: #333;
            }
        
          .p{
            margin-right: 20px;
          }
          </style>
        </head>
        <body>
          <div class="header"><center>
            Pethsop KFZ
          
</center></div>
<body>
    <div class="container">
        <div class="header">
            <div class="divider"></div>
            <p style="font-size: 18px;">Invoice Transaksi {{ $transaction->id_trans }}</p>
            <p style="font-size: 15px;">Tanggal: {{ date('d/m/Y H:i:s') }}</p>
        </div>
        <div class="content">
            <p style="font-size: 15px;">Nomor Unik: {{ $transaction->nomor_unik }}</p>
            <div class=""></div>
            <p style="font-size: 15px;">Nama Pelanggan: {{ $transaction->nama_pelanggan }}</p>
            <div class=""></div>
            <p style="font-size: 15px;">Nama Produk: {{ $transaction->nama_produk }}</p>
            <div class=""></div>
            <p style="font-size: 15px;">Harga Produk: Rp {{ number_format($transaction->harga_produk, 0, ',', '.') }}</p>
            <div class=""></div>
            <p style="font-size: 15px;">Uang Bayar: Rp {{ number_format($transaction->uang_bayar, 0, ',', '.') }}</p>
            <div class=""></div>
            <p style="font-size: 15px;">Uang Kembali: Rp {{ number_format($transaction->uang_kembali, 0, ',', '.') }}</p>
            <div class=""></div>
        </div>
        <div class="footer">
            <div class="divider"></div>
            <p style="font-size: 15px;">Terima Kasih Anda Telah Belanja Di Petshop KFZ</p>
            <p style="font-size: 15px;">Barang Yang Sudah Dibeli Tidak bisa dikembalikan!</p>
        </div>
    </div>
</body>
</html>