<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\productsM;
use App\Models\LogM;
use PDF;


class ProductR extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melihat Halaman Produk'
        ]);

        $subtittle = "Products List";
        $productsM = productsM::all();
        return view('products', compact('productsM', 'subtittle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $LogM = LogM::create([
          'id_user' => Auth::user()->id,
          'activity' => 'User Di halaman Tambah Produk'
        ]);

        $subtittle = "Add Products Page";
        return view('products_create', compact('subtittle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $LogM = LogM::create([
          'id_user' => Auth::user()->id,
          'activity' => 'User Melakukan Proses Tambah Produk' . $request->nama_produk
        ]);

        $request->validate([
            'nama_produk' => 'required',
            'stock_produk' => 'required',
            'harga_produk' => 'required',
        ]);

        productsM::create($request->post());
        return redirect()->route('products.index')->with('success', 'Products Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $LogM = LogM::create([
          'id_user' => Auth::user()->id,
          'activity' => 'User DI Halaman Edit Data Produk'
        ]);

        $products = productsM::find($id);
        $subtittle = "Edit Products Page";
        return view('products_edit', compact('products', 'subtittle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $LogM = LogM::create([
          'id_user' => Auth::user()->id,
          'activity' => 'User Melakukan Proses Update Data Produk' . $request->nama_produk
          ]);

        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required',
        ]);
        $data = request()->except(['_token', '_method', 'submit']);

        productsM::where('id',$id)->update($data);
        return redirect()->route('products.index')->with('success', 'Products Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $LogM = LogM::create([
         'id_user' => Auth::user()->id,
         'activity' => 'User Melakukan Penghapusan Data Produk'
        ]);

        productsM::where('id',$id)->delete();
        return redirect()->route('products.index')->with('success', 'Products Berhasil Dihapus');
    }
    
    public function pdf()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Mengunduh PDF Transaksi'
        ]);

        $productsM = productsM::all();
        $pdf = PDF::loadview('products_pdf', ['productsM' => $productsM]);
        return $pdf->stream('products.pdf');
    }
}