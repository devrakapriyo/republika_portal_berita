<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaTipe extends Model
{
    protected $table = "tb_berita_tipe";
    protected $fillable = [
        'tipe',
        'created_at',
        'updated_at',
    ];

    public static function getTipeId($id)
    {
        return BeritaTipe::select('tipe')
            ->where('id', $id)
            ->first()
            ->tipe;
    }
}
