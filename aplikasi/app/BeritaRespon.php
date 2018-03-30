<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaRespon extends Model
{
    protected $table = "tb_berita_respon";

    public static function countInfoRespon($id)
    {
        return BeritaRespon::select('id')
            ->where('berita_id', $id)
            ->count();
    }

    public static function getInfoRespon($id)
    {
        $count = BeritaRespon::select('id')
            ->where('berita_id', $id)
            ->count();
        if($count > 0)
        {
            $data = [];
            foreach (BeritaRespon::select('nama_lengkap', 'respon')->join('users', 'tb_berita_respon.users_id', '=', 'users.id')->where('berita_id', $id)->orderBy('tb_berita_respon.id', 'desc')->get() as $items)
            {
                $data = $items->nama_lengkap." : ".$items->respon;
            }

            return $data;
        }else{
            return "Belum Ada Respon";
        }
    }

    public static function insertResponUsers($berita_id, $users_id, $respon)
    {
        $validasi = BeritaRespon::select('id')
            ->where('berita_id', $berita_id)
            ->where('users_id', $users_id)
            ->first();

        if($validasi == true)
        {
            return false;
        }

        $simpan = new BeritaRespon;
        $simpan->berita_id = $berita_id;
        $simpan->users_id = $users_id;
        $simpan->respon = $respon;
        $simpan->save();

        return $simpan;
    }
}
