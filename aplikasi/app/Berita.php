<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "tb_berita";
    protected $fillable = [
        'seo',
        'judul',
        'tipe_id',
        'kategori_id',
        'teks',
        'gambar',
        'viewer',
        'created_by',
        'created_at',
        'updated_at',
    ];

    public static function getBerita($kategori, $tipe, $limit)
    {
        if($kategori == "semua" && $tipe == "semua")
        {
            return Berita::orderBy('created_at', 'desc')
                ->paginate($limit);
        }else{
            return Berita::where('kategori_id', $kategori)
                ->where('tipe_id', $tipe)
                ->orderBy('created_at', 'desc')
                ->paginate($limit);
        }
    }

    public static function getBeritaPopuler()
    {
        return Berita::orderBy('viewer', 'desc')
            ->get();
    }

    public static function getDetail($seo)
    {
        return Berita::where('seo', $seo)
            ->first();
    }

    public static function getDataKategori($id)
    {
        return Berita::select('id')
            ->where('kategori_id', $id)
            ->first();
    }

    public static function getBeritaKategori($kategori_id, $limit)
    {
        return Berita::where('kategori_id', $kategori_id)
            ->where('is_deleted', "N")
            ->orderBy('created_at', 'desc')
            ->paginate($limit);
    }
}
