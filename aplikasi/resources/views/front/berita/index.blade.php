@extends('layouts.app')
@section('title')
    Berita Terbaru
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach(\App\Berita::getBerita("semua", "semua", 1) as $items)
                    <div class="card">
                        <img src="{{url('img/berita/'.$items->gambar)}}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{url('berita/detail/'.$items->seo)}}" class="text-danger">{{$items->judul}}</a>
                            </h5>
                            <p class="card-text">
                                <small class="text-muted">
                                    {{\App\ModelFuction::formatDateTimeIndo($items->created_at)}} | dibuat oleh : {{\App\User::infoUser($items->created_by, 'nama_lengkap')->nama_lengkap}}
                                </small>
                            </p>
                            {!! \App\ModelFuction::getReadMore($items->teks, "berita/detail/".$items->seo, 200) !!}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="card border-light">
                    <div class="card-header h5">Berita populer</div>
                    <div class="card-body">
                        @foreach(\App\Berita::getBeritaPopuler() as $items)
                            <div class="list-group">
                                <a href="{{url('berita/detail/'.$items->seo)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 text-danger">{{$items->judul}}</h5>
                                    </div>
                                    {!! \App\ModelFuction::getReadMoreNoButton($items->teks, 110) !!}
                                </a>
                            </div><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><br>
        <p class="h5">Berita lainya</p>
        <div class="card-columns">
            @foreach(\App\Berita::getBerita("semua", "semua", 20) as $items)
                {{--<div class="col-md-12">--}}
                <div class="card">
                    <img class="card-img-top" src="{{url('img/berita/'.$items->gambar)}}" alt="{{$items->gambar}}">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{url('berita/detail/'.$items->seo)}}" class="text-danger">{{$items->judul}}</a>
                        </h5>
                        <p class="card-text">
                            {!! \App\ModelFuction::getReadMore($items->teks, "berita/detail/".$items->seo, 200) !!}
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                {{\App\ModelFuction::formatDateTimeIndo($items->created_at)}} | dibuat oleh : {{\App\User::infoUser($items->created_by, 'nama_lengkap')->nama_lengkap}}
                            </small>
                        </p>
                    </div>
                </div>
                {{--</div>--}}
            @endforeach
        </div>
        {!! \App\Berita::getBerita("semua", "semua", 20)->render() !!}
    </div>
@endsection