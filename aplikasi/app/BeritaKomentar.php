<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaKomentar extends Model
{
    protected $table = "tb_berita_komentar";

    public static function countInfoKomentar($id)
    {
        return BeritaKomentar::select('id')
            ->where('berita_id', $id)
            ->count();
    }

    public static function getInfoKomentar($id)
    {
        $count = BeritaKomentar::select('id')
            ->where('berita_id', $id)
            ->count();
        if($count > 0)
        {
            $data = [];
            foreach (BeritaKomentar::select('nama_lengkap')->join('users', 'tb_berita_komentar.users_id', '=', 'users.id')->where('berita_id', $id)->orderBy('tb_berita_komentar.id', 'desc')->get() as $items)
            {
                $data = $items->nama_lengkap;
            }

            return $data;
        }else{
            return "Belum Ada Komentar";
        }
    }

    public static function insertKomentarUsers($berita_id, $users_id, $teks)
    {
        $simpan = new BeritaKomentar;
        $simpan->berita_id = $berita_id;
        $simpan->users_id = $users_id;
        $simpan->teks = $teks;
        $simpan->save();

        return $simpan;
    }

    public static function getDataKomentarId($id)
    {
        return BeritaKomentar::where('berita_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
