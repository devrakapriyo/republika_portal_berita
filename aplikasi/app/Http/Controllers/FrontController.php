<?php

namespace App\Http\Controllers;

use App\Berita;
use App\BeritaKomentar;
use App\BeritaRespon;
use App\BeritaViewer;
use App\ModelFuction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function registerAction(Request $request)
    {
        $validasi = User::select('email')
            ->where('email', $request->email)
            ->where('role', "pengunjung")
            ->where('is_deleted', "N")
            ->first();
        if(!empty($validasi))
        {
            return response()->json([
                'status' => 400,
                'msg' => "Maaf Email Pengunjung Sudah Terdaftar",
                'response' => "/"
            ]);
        }
        $simpan = new User;
        $simpan->email = $request->email;
        $simpan->password = Hash::make($request->password);
        $simpan->nama_lengkap = $request->nama_lengkap;
        $simpan->jk = $request->jk;
        $simpan->role = "pengunjung";
        $simpan->save();

        if($simpan == true)
        {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                return response()->json([
                    'status' => 200,
                    'msg' => "Anda Berhasil Login",
                    'response' => "/"
                ]);
            }else{
                return response()->json([
                    'status' => 400,
                    'msg' => "Mohon Coba Cek Kembali",
                    'response' => "/"
                ]);
            }
        }else{
            return response()->json([
                'status' => 400,
                'msg' => "Mohon Coba Cek Kembali",
                'response' => "/"
            ]);
        }
    }

    public function beritaDetail($seo)
    {
        $detail = Berita::getDetail($seo);
        BeritaViewer::insertViewer($detail->id, ModelFuction::getIpAddress());
        return view('front.berita.detail', compact('detail'));
    }

    public function beritaKategori($id)
    {
        return view('front.berita.kategori', compact('id'));
    }

    public function beritaKomentarId(Request $request, $id)
    {
        $simpan = BeritaKomentar::insertKomentarUsers($id, Auth::User()->id, $request->teks);

        if($simpan == true)
        {
            return response()->json([
                'status' => 200,
                'msg' => "Pendapat Anda Berhasil Terkirim"
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'response' => "Mohon Coba Cek Kembali"
            ]);
        }
    }

    public function beritaRespon($id, $perasaan)
    {
        $simpan = BeritaRespon::insertResponUsers($id, Auth::User()->id, $perasaan);

        if($simpan == true)
        {
            return response()->json([
                'status' => 200,
                'msg' => "Perasaaanmu, Telah Kami Tampung"
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'msg' => "Anda Sudah Mengungkapan Perasaanmu Di Topik Berita Ini..."
            ]);
        }
    }

    public function beritaCari($kategori_id, $judul)
    {
        $berita = Berita::getCariKategoriBerita($kategori_id, $judul);
        return view('front.berita.cari', compact('berita', 'kategori_id', 'judul'));
    }
}
