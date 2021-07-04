<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::put('change','HomeController@change')->name('change.password');

Route::resource('ustadz','UstadzController');
Route::resource('anggota','AnggotaController');
Route::resource('gaji','GajiController');
Route::resource('acara','AcaraController');
Route::resource('kategori','KategoriAcaraController');
Route::resource('katsum','KatsumController');
Route::resource('acara_detail','DetailAcaraController');
Route::resource('pengeluaran','PengeluaranController');
Route::resource('pemasukan','PemasukanController');

Route::get('saran','KatsumController@saran');

 //pengeluaran
 Route::get('laporan/pengeluaran','LaporanController@indexPengeluaran')->name('laporan.pengeluaran.index');
 Route::post('laporan/pengeluaran','LaporanController@storePengeluaran')->name('laporan.pengeluaran.store');
 //pemasukan
 Route::get('laporan/pemasukan','LaporanController@indexPemasukan')->name('laporan.pemasukan.index');
 Route::post('laporan/pemasukan','LaporanController@storePemasukan')->name('laporan.pemasukan.store');
 //keuangan
 Route::get('laporan/keuangan','LaporanController@indexKeuangan')->name('laporan.keuangan.index');
 Route::post('laporan/keuangan','LaporanController@storeKeuangan')->name('laporan.keuangan.store');



 //  UI user
 Route::get('user/home','HomeUserController@home');
 Route::get('user/about','HomeUserController@about');
 Route::get('user/contact','HomeUserController@contact');
 Route::post('user/contact_post','HomeUserController@storeContact');
 Route::get('user/agent','HomeUserController@agent');
 Route::get('user/schedule','HomeUserController@schedule');
