<?php

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
Route::group(['middleware' => 'web'], function() {
    // Auth pengunjung
    Route::get('/login', function ()
    {
        return view('front.login');
    });
    Route::post('/login-action', 'LoginController@loginAction');
    Route::get('/logout', 'FrontController@logout');
    Route::get('/register', function ()
    {
        return view('front.register');
    });
    Route::post('/register-action', 'FrontController@registerAction');

    // Auth Admin
    Route::get('/login-admin', function ()
    {
        return view('back.login');
    });
    Route::post('/login-admin-action', 'LoginController@loginAdminAction');

    // Berita
    Route::get('/', function ()
    {
        return view('front.berita.index');
    });
    Route::get('/berita/detail/{seo}', 'FrontController@beritaDetail');
    Route::get('/berita/kategori/{id}', 'FrontController@beritaKategori');
    Route::post('/berita/komentar/{id}', 'FrontController@beritaKomentarId');
    Route::get('/berita/respon/{id}/{perasaan}', 'FrontController@beritaRespon');
    Route::get('/berita/cari/{kategori_id}/{judul}', 'FrontController@beritaCari');
});