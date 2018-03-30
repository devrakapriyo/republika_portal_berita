<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaViewer extends Model
{
    protected $table = "tb_berita_viewer";

    public static function countInfoViewer($id)
    {
        return BeritaViewer::select('id')
            ->where('berita_id', $id)
            ->count();
    }

    public static function insertViewer($berita_id, $ip)
    {
        $validasi = BeritaViewer::select('id')
            ->where('berita_id', $berita_id)
            ->where('ip_viewer', $ip)
            ->first();

        if(empty($validasi))
        {
            $berita = Berita::where('id', $berita_id);

            $berita->update([
                'viewer' => $berita->first()->viewer + 1
            ]);

            $simpan = new BeritaViewer();
            $simpan->berita_id = $berita_id;
            $simpan->ip_viewer = $ip;
            $simpan->save();

            return $simpan;
        }
    }
}
