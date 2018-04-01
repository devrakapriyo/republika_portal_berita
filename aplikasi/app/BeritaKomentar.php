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
            foreach (BeritaKomentar::select('users_id')->where('berita_id', $id)->orderBy('id', 'desc')->get() as $items)
            {
                $data = User::select('nama_lengkap')->where('id', $items->users_id)->first()->nama_lengkap;
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
