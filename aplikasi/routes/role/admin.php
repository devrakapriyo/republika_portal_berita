<?php
/**
 * Created by PhpStorm.
 * User: rakapriyo
 * Date: 29/03/18
 * Time: 22.19
 */
Route::group(['prefix' => 'admin/', 'middleware' => 'admin'], function() {
    Route::get('/', function ()
    {
        return view('back.index');
    });
    Route::get('/logout', function ()
    {
        auth('admin')->logout();
        return redirect('/');
    });

    Route::get('/biodata', function ()
    {
        return view('back.biodata.data');
    });

    Route::get('/berita', function ()
    {
        return view('back.berita.input');
    });
    Route::post('berita/simpan/{value}', 'BackController@beritaSimpan');
    Route::get('/berita/data', function ()
    {
        return view('back.berita.data');
    });
    Route::get('/berita/detail/{seo}', function ($seo)
    {
        $detail = \App\Berita::getDetail($seo);
        return view('back.berita.detail', compact('detail'));
    });

    Route::get('/admin', function ()
    {
        return view('back.admin.input');
    });
    Route::post('admin/simpan', 'BackController@adminSimpan');
    Route::get('/admin/data', function ()
    {
        return view('back.admin.data');
    });
});