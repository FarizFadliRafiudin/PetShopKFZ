<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductR;
use App\Http\Controllers\UsersR;
use App\Http\Controllers\LoginC;
use App\Http\Controllers\LogC;
use App\Http\Controllers\dashboardC;
use App\Http\Controllers\TransactionC;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    $subtittle = "Home Page";
    return view('dashboard', compact('subtittle'));
})->middleware('auth');
Route::get('dashboard', [dashboardC::class, 'index'])->name('dashboard.index')->middleware('auth');

#pdf
Route::get('products/pdf', [productR::class, 'pdf'])->middleware('userAkses:admin,owner');
Route::get('users/pdf', [UsersR::class, 'pdf'])->middleware('userAkses:admin');
Route::get('transaction/pdf', [TransactionC::class, 'pdf'])->middleware('userAkses:kasir,owner');
Route::get('transaction/pdf2/{id}',  [TransactionC::class, 'pdf2'])->middleware('userAkses:kasir');
Route::get('pertanggal/{tgl_awal}/{tgl_akhir}', [TransactionC::class, 'pertanggal'])->name('transaction.pertanggal')->middleware();
Route::get('transaction/all', [TransactionC::class, 'all'])->name('transaction.all')->middleware('userAkses:owner');
Route::get('/struk/{id}', [TransactionC::class, 'pdf'])->name('transaction.pdf')->middleware('userAkses:kasir'); //PDF STRUK TRANSACTIONS

#products
Route::resource('products', productR::class);

#transaction
// Route::resource('transaction',TransactionR::class);
Route::get('transaction', [TransactionC::class, 'index'])->name('transaction.index')->middleware('userAkses:kasir,admin,owner');
Route::get('transaction/create', [TransactionC::class, 'create'])->name('transaction.create')->middleware('userAkses:kasir');
Route::post('transaction/store', [TransactionC::class, 'store'])->name('transaction.store')->middleware('userAkses:kasir');
Route::get('transaction/edit/{id}', [TransactionC::class, 'edit'])->name('transaction.edit')->middleware('userAkses:admin');
Route::put('transaction/update/{id}', [TransactionC::class, 'update'])->name('transaction.update')->middleware('userAkses:admin');
Route::delete('transaction/delete/{id}', [TransactionC::class, 'delete'])->name('transaction.delete')->middleware('userAkses:admin');

#users
Route::resource('users', UsersR::class);
Route::get('users/create', [UsersR::class, 'create'])->name('users.create');
Route::get('users/changepassword/{id}', [UsersR::class, 'changepassword'])->name('users.changepassword');
Route::put('users/change/{id}', [UsersR::class, 'change'])->name('users.change');


#Login 
Route::get('login', [LoginC::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginC::class, 'login_action'])->name('login.action')->middleware('guest');

#logout
Route::get('logout', [LoginC::class, 'logout'])->name('logout')->middleware('auth');

#Log
Route::get('log', [LogC::class, 'index'])->name('log.index')->middleware('userAkses:admin,owner');