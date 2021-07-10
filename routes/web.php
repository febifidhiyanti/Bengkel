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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => ['auth','checkRole:admin']], function(){

    //kirim email
    // Route::get('/admin/kirim-email', 'BerandaController@index');
    
    // Beranda
    Route::get('/admin/profile', 'ProfileController@profile');
    Route::post('/admin/profile/update', 'ProfileController@updateprofile');

    // Pegawai
    Route::post('/upload/proses/pegawai', 'PegawaiController@proses_upload');
    Route::get('/admin/pegawai/laporan', 'PegawaiController@laporan_pegawai');
    Route::get('/admin/pegawai/laporan/cetak', 'PegawaiController@cetak_pegawai');
    Route::resource('/admin/pegawai','PegawaiController');
    // Route::get('/admin/pegawai/laporan/cetak/{tglawal}/{tglakhir}', 'PegawaiController@cetak_pegawai_pertanggal');

    //informasi
    Route::get('/admin/informasi', 'InformasiController@index');
    Route::get('/admin/informasi/laporan', 'InformasiController@laporan');
    Route::get('/admin/informasi/laporan/cetak', 'InformasiController@cetak_informasi');
    Route::get('/admin/informasi/laporan/cetak/{tglawal}/{tglakhir}', 'InformasiController@cetak_informasi_pertanggal');
    Route::post('/upload/proses', 'InformasiController@proses_upload');
    Route::resource('/admin/informasi','InformasiController');
    Route::get('/informasi/edit/{id_informasi}','InformasiController@edit');
    Route::post('/informasi/update','InformasiController@update');

    //data-perbaikan
    Route::get('/admin/data_perbaikan','PengajuanPerbaikanController@data_perbaikan');
    Route::patch('/admin/data_perbaikan/update/{id_pengajuan}', 'PengajuanPerbaikanController@updatedataperbaikan');
    Route::post('/admin/data_perbaikan/upload/proses', 'PengajuanPerbaikanController@upload_perbaikan');
    Route::delete('/admin/data_perbaikan/{id_pengajuan}','PengajuanPerbaikanController@destroy');
    Route::get('/admin/data-pengajuan/laporan', 'PengajuanPerbaikanController@laporan');
    Route::get('/admin/data-pengajuan/laporan/cetak', 'PengajuanPerbaikanController@cetak_pengajuan');
    Route::get('/admin/data-pengajuan/laporan/cetak/{tglawal}/{tglakhir}', 'PengajuanPerbaikanController@cetak_pengajuan_pertanggal');
    
    //data-antar
    Route::get('/admin/data_antar','PengajuanPerbaikanController@data_antar');
    Route::patch('/admin/data_antar/update/{id_pengajuan}', 'PengajuanPerbaikanController@updatedataantar');
    
    //Perbaikan
    Route::get('/admin/perbaikan', 'PerbaikanController@index');
    Route::post('/upload', 'PerbaikanController@upload');
    Route::resource('/admin/perbaikan','PerbaikanController');
    Route::get('/perbaikan/edit/{id_perbaikan }','PerbaikanController@edit');
    Route::delete('/admin/perbaikan/{id_perbaikan}','PerbaikanController@destroy');
    Route::get('/admin/perbaikan/perbaikan/laporan', 'PerbaikanController@laporan');
    Route::get('/admin/perbaikan/laporan/cetak', 'PerbaikanController@cetak_perbaikan');
    // Route::get('/admin/perbaikan/laporan/cetak/{tglawal}/{tglakhir}', 'PerbaikanController@cetak_informasi_pertanggal');
    
    Route::get('/admin/pengajuan/', 'PerbaikanController@AdminPengajuan');
    Route::delete('/admin/pengajuan/{id_detail_pengajuan}','PerbaikanController@deletepengajuan');

  });

  Route::group(['middleware' => ['auth','checkRole:pelanggan']], function(){

    //perbaikan-pelayanan
    Route::get('/layanan/detail/perbaikan', 'PengajuanPerbaikanController@check_out'); 
    Route::get('/perbaikan', 'PengajuanPerbaikanController@pengajuan')->name('perbaikan');
    Route::post('/perbaikan/{id_perbaikan}','PengajuanPerbaikanController@pesan');
    Route::get('/perbaikan/hapus/{id_perbaikan}','PengajuanPerbaikanController@hapus');
    Route::delete('/layanan/detail/perbaikan/{id_detail_pengajuan}', 'PengajuanPerbaikanController@delete');
    Route::get('konfirmasi-check-out', 'PengajuanPerbaikanController@konfirmasi');

    //profile
    Route::get('profile', 'ProfileController@index');
    Route::post('profile/update', 'ProfileController@update');

    //history
    Route::get('history', 'HistoryController@index');
    Route::get('history/{id_pengajuan} ', 'HistoryController@detail');

  });

  Route::group(['middleware' => ['auth','checkRole:pelanggan,admin']], function(){

    //profile
    Route::get('profile', 'ProfileController@index');
    Route::post('profile/update', 'ProfileController@update');

      
    Route::get('video_chat', 'VideoChatController@index')->name('video_chat');
    Route::post('auth/video_chat', 'VideoChatController@auth');
    Route::get('chat', 'ChatController@index')->name('chat');
    Route::get('messages', 'ChatController@getMessages');
    Route::post('messages', 'ChatController@broadcastMessage');
    // Route::get('chatting', 'ChatController@chat');
    // Route::get('/message', 'ChatController@message')->name('message');
    // Route::post('/message', 'ChatController@save')->name('message.save');
  });

  Route::group(['middleware' => ['auth','checkRole:admin kas']], function(){
    
    //pembayaran
    Route::get('/admin/pembayaran','PengajuanPerbaikanController@pembayaran');
    Route::patch('/admin/pembayaran/update/{id_pengajuan}', 'PengajuanPerbaikanController@updatepembayaran');
    
  });

  Route::group(['middleware' => ['auth','checkRole:super admin']], function(){
   
    //admin
    Route::resource('/admin/admin','AdminController');
    //pelanggan
    Route::resource('/admin/pelanggan','PelangganController');
     
  });

  // USER
  Route::get('/home','HomeController@index')->name('home');
  
  //Informasi
  Route::get('/informasi', 'InformasiController@index1');

  Route::get('/', function () {
    return view('home');
  });

  // USER
  Route::get('/chats', 'FormChatController@formchat');
  Route::post('/push', 'FormChatController@push');


// Route::get('/kirimemail','MalasngodingController@index');
// Route::group(['middleware' => ['auth','checkRole:pelanggan,admin,admin kas,super admin']], function(){

//   Route::get('/home','HomeController@index')->name('home');

// });

Route::group(['middleware' => ['auth','checkRole:pelanggan,admin,admin kas,super admin']], function(){

    // Beranda
    Route::get('/admin', 'BerandaController@index')->name('admin');
    Route::get('/admin/profile', 'ProfileController@profile');
    Route::post('/admin/profile/update', 'ProfileController@updateprofile');
    
    //profile
    Route::get('profile', 'ProfileController@index');
    Route::post('profile/update', 'ProfileController@update');

    Route::get('/admin/pelanggan/laporan', 'PelangganController@laporan_pelanggan');
    Route::get('/admin/pelanggan/laporan/cetak', 'PelangganController@cetak_pelanggan');
    
    Route::get('/admin/pegawai/laporan', 'PegawaiController@laporan_pegawai');
    Route::get('/admin/pegawai/laporan/cetak', 'PegawaiController@cetak_pegawai');

    Route::get('/admin/informasi/laporan', 'InformasiController@laporan');
    Route::get('/admin/informasi/laporan/cetak', 'InformasiController@cetak_informasi');
    Route::get('/admin/informasi/laporan/cetak/{tglawal}/{tglakhir}', 'InformasiController@cetak_informasi_pertanggal');
    Route::post('/upload/proses', 'InformasiController@proses_upload');

    Route::get('/admin/data-pengajuan/laporan', 'PengajuanPerbaikanController@laporan');
    Route::get('/admin/data-pengajuan/laporan/cetak', 'PengajuanPerbaikanController@cetak_pengajuan');
    Route::get('/admin/data-pengajuan/laporan/cetak/{tglawal}/{tglakhir}', 'PengajuanPerbaikanController@cetak_pengajuan_pertanggal');

    Route::get('/admin/perbaikan/perbaikan/laporan', 'PerbaikanController@laporan');
    Route::get('/admin/perbaikan/laporan/cetak', 'PerbaikanController@cetak_perbaikan');   

});

    