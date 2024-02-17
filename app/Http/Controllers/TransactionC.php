<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\TransactionM;
use App\Models\ProductsM;
use App\Models\LogM;
use PDF;

class TransactionC extends Controller
{
    public function index(Request $request)
    {
    $LogM = LogM::create([
        'id_user' => Auth::user()->id,
        'activity' => 'User Melihat Halaman Transaksi'
    ]);

        $query = transactionM::select('transactions.*', 'products.*', 'transactions.id AS id_trans', 'transactions.created_at as createtrans')
        ->join('products', 'products.id', '=', 'transactions.id_produk')
        ->orderBy('transactions.id', 'desc');
    if ($request->filled('start_date') && $request->filled('end_date')) {
    // Jika kedua tanggal diisi, cari transaksi antara rentang tanggal
        $query->whereDate('transactions.created_at', '>=', $request->start_date)
              ->whereDate('transactions.created_at', '<=', $request->end_date);
    } elseif ($request->filled('start_date')) {
    // Jika hanya tanggal awal diisi, cari transaksi pada tanggal awal
         $query->whereDate('transactions.created_at', '=', $request->start_date);
     } elseif ($request->filled('end_date')) {
    //   Jika hanya tanggal akhir diisi, cari transaksi pada tanggal akhir
        $query->whereDate('transactions.created_at', '=', $request->end_date);
    }

    $transactionM = $query->get();

    $subtittle = "Daftar Transaksi";
    return view('transaction', compact('subtittle' ,'transactionM'));

    }

    public function create()
    {
    $LogM = LogM::create([
        'id_user' => Auth::user()->id,
        'activity' => 'User Di halaman Tambah Transaksi'
    ]);

    $subtittle = "Tambah Data Transaksi";
    $productsM = productsM::all();
    return view('transaction_create', compact('productsM', 'subtittle'));
    }

    public function store(Request $request)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melakukan Proses Tambah Transaksi' . $request->nama_pelanggan
        ]);

        $productsM = ProductsM::findOrFail($request->id_produk);

        $request->validate([
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'id_produk' => 'required',
            'uang_bayar' => 'required',
        ]);

        $transaction = new TransactionM;
        $transaction->nomor_unik = $request->input('nomor_unik');
        $transaction->nama_pelanggan = $request->input('nama_pelanggan');
        $transaction->id_produk = $request->input('id_produk');
        $transaction->uang_bayar = $request->input('uang_bayar');
        $transaction->uang_kembali = $request->input('uang_bayar') - $productsM->harga_produk;
        $transaction->created_at = Carbon::now();
        $transaction->save();

        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil di tambahkan');
    }

    public function edit($id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Di halaman Edit Data Transaksi'
        ]);

        $subtittle = "Edit Data Transactions";
        $transaction = TransactionM::find($id);
        $productsM = productsM::all();

        return view('transaction_edit', compact('subtittle', 'productsM', 'transaction'));
    }

    public function delete(Request $request, $id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melakukan Penghapusan Data Transaksi' . $request->nama_pelanggan
        ]);

        TransactionM::where('id', $id)->delete();
        return redirect()->route('transaction.index')->with('success', 'Data Transaksi Berhasil Dihapus');
    }

    public function update(Request $request, $id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melakukan Proses Update Data Transaksi' . $request->nama_pelanggan
        ]);

        $productsM = productsM::where("id", $request->input('id_produk'))->first();

        $request->validate([
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'id_produk' => 'required',
            'uang_bayar' => 'required',
        ]);

        $transaction = TransactionM::find($id);
        $transaction->nomor_unik = $request->input('nomor_unik');
        $transaction->nama_pelanggan = $request->input('nama_pelanggan');
        $transaction->id_produk = $request->input('id_produk');
        $transaction->uang_bayar = $request->input('uang_bayar');
        $transaction->uang_kembali = $request->input('uang_bayar') - $productsM->harga_produk;
        $transaction->save();
        // transactionM::create($request->post());
        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil di perbaharui');
    }

    public function pdf()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Mengunduh PDF Transaksi'
        ]);

        $transactionM = TransactionM::select('transactions.*', 'products.*', 'transactions.id AS id_trans', 'transactions.created_at as createtrans')->join('products', 'products.id',  '=', 'transactions.id_produk')->get();
        $pdf = PDF::loadview('transaction_pdf', ['transactionM' => $transactionM]);
        return $pdf->stream('transaction.pdf');
    }
    
    
    public function pdf2($id)
    {
        $LogM = LogM::create([
            'id_user'=> Auth::user()->id,
            'activity'=> 'User Mencetak PDF Struk'
        ]);
        // Ambil data transaksi dan produk berdasarkan ID
        $transaction = transactionM::select('transactions.*', 'products.*', 'transactions.id AS id_trans')->join('products', 'products.id', '=', 'transactions.id_produk')->where('transactions.id', $id)->first();
    
        if ($transaction) {
        // Jika data ditemukan, buat PDF
            $pdf = PDF::loadView('transaction_struk', ['transaction' => $transaction]);
            return $pdf->stream('transaction.struk' . $id . '.pdf');
        } else {
        // Jika data tidak ditemukan, Anda dapat mengembalikan respons yang sesuai, misalnya, halaman 404.
            return response('Data transaksi tidak ditemukan', 404);
        }
    }

    public function all()
    {
        $subtittle = "tanggal";
        return view('transaction_date', compact('subtittle'));
    }

    public function pertanggal(Request $request)
    {
    //Gunakan tanggal yang diterima sesuai kebutuhan
    // Gunakan tanggal yang diterima sesuai kebutuhan
         $tgl_awal = $request->input('tgl_awal');
         $tgl_akhir = $request->input('tgl_akhir');

    //   Jika tanggal awal dan tanggal akhir sama, atur rentang tanggal agar mencakup seluruh hari tersebut
    if ($tgl_awal == $tgl_akhir) {
        $tgl_awal = Carbon::parse($tgl_awal)->startOfDay();
        $tgl_akhir = Carbon::parse($tgl_akhir)->endOfDay();
    }

    // Lakukan pengolahan data sesuai rentang tanggal yang diinginkan
    $transaction = transactionM::select('transactions.*', 'products.*', 'transactions.id AS id_tran', 'transactions.created_at AS createtrans')
        ->join('products', 'products.id', '=', 'transactions.id_produk')
        ->whereBetween('transactions.created_at', [$tgl_awal, $tgl_akhir])
        ->get();

        $pdf = PDF::loadview('transaction_tgl', ['transaction' => $transaction]);
        return $pdf->stream('stgl.pdf');
    }
}  