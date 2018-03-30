@extends('layouts.app')
@section('title')
    Berita Terbaru
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach(\App\Berita::getBerita("semua", "semua", 1) as $items)
                    <div class="card">
                        <div class="card-header"><a href="{{url('berita/detail/'.$items->seo)}}">{{$items->judul}}</a></div>
                        <div class="card-body">
                            <img src="{{url('img/berita/'.$items->gambar)}}" class="form-control"><br>
                            {!! \App\ModelFuction::getReadMore($items->teks, "berita/detail/".$items->seo, 200) !!}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Berita Populer</div>
                    <div class="card-body">
                        @foreach(\App\Berita::getBerita("semua", "semua", 3) as $items)
                            <div class="list-group">
                                <a href="{{url('berita/detail/'.$items->seo)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 text-info">{{$items->judul}}</h5>
                                    </div>
                                    {!! \App\ModelFuction::getReadMoreNoButton($items->teks, 100) !!}
                                </a>
                            </div><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach(\App\Berita::getBeritaPopuler() as $items)
                    <div class="card">
                        <div class="card-header"><a href="{{url('berita/detail/'.$items->seo)}}">{{$items->judul}}</a></div>
                        <div class="card-body">
                            <small class="label label-info">tanggal rilis : {{$items->created_at}} | dibuat oleh : {{\App\User::infoUser($items->created_by, 'nama_lengkap')->nama_lengkap}}</small><br>
                            {!! \App\ModelFuction::getReadMore($items->teks, "berita/detail/".$items->seo, 200) !!}
                        </div>
                    </div><br>
                @endforeach
            </div>
        </div>
    </div>
@endsection