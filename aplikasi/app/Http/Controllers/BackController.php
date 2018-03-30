<?php

namespace App\Http\Controllers;

use App\Berita;
use App\BeritaKategori;
use App\BeritaTipe;
use App\ModelFuction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BackController extends Controller
{
    public function beritaSimpan(Request $request, $value)
    {
        $date_time = date("Y-m-d H:i:s");
        $auth_user = auth('admin')->user();
        $simpan = false;

        if($value == "utama")
        {
            $validasi_utama = Berita::select('judul')
                ->where('judul', $request->judul)
                ->where('tipe_id', $request->tipe_id)
                ->where('kategori_id', $request->kategori_id)
                ->where('is_deleted', "N")
                ->first();
            if($validasi_utama == true)
            {
                return response()->json([
                    'status' => 400,
                    'msg' => "Maaf Berita Sudah Ada"
                ]);
            }

            $file = $request->file('gambar');
            $model['seo'] = ModelFuction::getSeoUrl($request->judul);
            $model['judul'] = $request->judul;
            $model['tipe_id'] = $request->tipe_id;
            $model['kategori_id'] = $request->kategori_id;
            $model['gambar'] = ModelFuction::uploadFile($file, $request->judul, 'img/berita/');
            $model['teks'] = $request->teks;
            $model['created_by'] = $auth_user->id;
            $model['created_at'] = $date_time;
            $model['updated_at'] = $date_time;
            $simpan = Berita::create($model);
        }else if($value == "tipe")
        {
            $validasi_tipe = BeritaTipe::select('tipe')
                ->where('tipe', $request->tipe)
                ->where('is_deleted', "N")
                ->first();
            if($validasi_tipe == true)
            {
                return response()->json([
                    'status' => 400,
                    'msg' => "Maaf Tipe Sudah Ada"
                ]);
            }

            $model['tipe'] = $request->tipe;
            $model['created_at'] = $date_time;
            $model['updated_at'] = $date_time;
            $simpan = BeritaTipe::create($model);
        }else if($value == "kategori")
        {
            $validasi_kategori = BeritaKategori::select('kategori')
                ->where('kategori', $request->kategori)
                ->where('is_deleted', "N")
                ->first();
            if($validasi_kategori == true)
            {
                return response()->json([
                    'status' => 400,
                    'msg' => "Maaf Kategori Sudah Ada"
                ]);
            }

            $model['kategori'] = $request->kategori;
            $model['created_at'] = $date_time;
            $model['updated_at'] = $date_time;
            $simpan = BeritaKategori::create($model);
        }

        if($simpan == true)
        {
            return response()->json([
                'status' => 200,
                'msg' => "Berita ".$value." Berhasil Terimpan..."
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'msg' => "Mohon Coba Cek Kembali"
            ]);
        }
    }

    public function adminSimpan(Request $request)
    {
        $validasi = User::select('email')
            ->where('email', $request->email)
            ->where('role', "admin")
            ->where('is_deleted', "N")
            ->first();
        if($validasi == true)
        {
            return response()->json([
                'status' => 400,
                'msg' => "Maaf Email Admin Sudah Terdaftar"
            ]);
        }

        $date_time = date("Y-m-d H:i:s");
        $model['nama_lengkap'] = $request->nama_lengkap;
        $model['jk'] = $request->jk;
        $model['email'] = $request->email;
        $model['password'] = Hash::make($request->password);
        $model['role'] = "admin";
        $model['created_at'] = $date_time;
        $model['updated_at'] = $date_time;
        $simpan = User::create($model);

        if($simpan == true)
        {
            return response()->json([
                'status' => 200,
                'msg' => "User Admin Berhasil Terimpan..."
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'msg' => "Mohon Coba Cek Kembali"
            ]);
        }
    }
}
