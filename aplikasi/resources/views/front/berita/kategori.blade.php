@extends('layouts.app')
@section('title')
    {{\App\BeritaKategori::getKategoriId($id)}}
@endsection
@section($id)
    active
@endsection
@section("color-".$id)
    text-dark
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(!empty(\App\Berita::getDataKategori($id)))
                    <p class="h5 text-capitalize">{{\App\BeritaKategori::getKategoriId($id)}}</p>
                    <div class="card-columns">
                        @foreach(\App\Berita::getBeritaKategori($id, 25) as $items)
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
                    {!! \App\Berita::getBeritaKategori($id, 25)->render() !!}
                @else
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                Mohon Maaf...
                            </h5>
                            <p class="card-text text-capitalize">berita {{\App\BeritaKategori::getKategoriId($id)}} belum tersedia</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
