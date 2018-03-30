<div class="card">
    <div class="card-header">
        <a class="btn btn-default">Adakah Berita Baru Hari Ini?</a>
        <a href="{{url('admin/berita/data')}}" class="btn btn-success">Lihat Semua Berita?</a>
    </div>
    <div class="card-body">
        <form id="simpan-utama">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="form-group">
                <label>Tipe Berita</label>
                <select class="form-control" name="tipe_id" required>
                    <option value="">PILIH TIPE</option>
                    @foreach(\App\BeritaTipe::select('tipe', 'id')->where('is_deleted', "N")->get() as $items)
                        <option value="{{$items->id}}">{{$items->tipe}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Kategori Berita</label>
                <select class="form-control" name="kategori_id" required>
                    <option value="">PILIH KATEGORI</option>
                    @foreach(\App\BeritaKategori::select('kategori', 'id')->where('is_deleted', "N")->get() as $items)
                        <option value="{{$items->id}}">{{$items->kategori}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Gambar Thumbnail</label>
                <input type="file" class="form-control" name="gambar" required>
            </div>
            <div class="form-group">
                <label>Isi Berita</label>
                <textarea rows="8" name="teks"></textarea>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-primary">Simpan Berita Baru</button>
            </div>
        </form>
    </div>
</div>