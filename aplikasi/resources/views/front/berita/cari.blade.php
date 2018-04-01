@extends('layouts.app')
@section('title')
    {{$judul}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @forelse($berita as $items)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{url('berita/detail/'.$items->seo)}}" class="text-danger">{{$items->judul}}</a>
                            </h5>
                            <p class="card-text">
                                <small class="text-muted">
                                    {{\App\ModelFuction::formatDateTimeIndo($items->created_at)}} | dibuat oleh : {{\App\User::infoUser($items->created_by, 'nama_lengkap')->nama_lengkap}}
                                </small>
                            </p>
                            <p class="card-text">
                                {!! \App\ModelFuction::getReadMore($items->teks, "berita/detail/".$items->seo, 200) !!}
                            </p>
                        </div>
                    </div><br>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                Opps sepertinya...
                            </h5>
                            <p class="card-text text-capitalize">{{$judul}} dengan kategori {{\App\BeritaKategori::getKategoriId($kategori_id)}} tidak ditemukan...</p>
                        </div>
                    </div>
                @endforelse
                {!! $berita->render() !!}
            </div>
        </div>
    </div>
@endsection
