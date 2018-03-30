<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaKategori extends Model
{
    protected $table = "tb_berita_kategori";
    protected $fillable = [
        'kategori',
        'created_at',
        'updated_at',
    ];

    public static function getKategoriId($id)
    {
        return BeritaKategori::select('kategori')
            ->where('id', $id)
            ->first()
            ->kategori;
    }

    public static function getMenuKategori()
    {
        return BeritaKategori::select('kategori', 'id')
            ->where('is_deleted', 'N')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
