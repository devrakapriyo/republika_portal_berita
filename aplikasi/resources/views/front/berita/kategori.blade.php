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
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(!empty(\App\Berita::getDataKategori($id)))
                    @foreach(\App\Berita::getBeritaKategori($id, 10) as $items)
                        <div class="card">
                            <div class="card-header"><a href="{{url('berita/detail/'.$items->seo)}}">{{$items->judul}}</a></div>
                            <div class="card-body">
                                <small class="label label-info">tanggal rilis : {{$items->created_at}} | dibuat oleh : {{\App\User::infoUser($items->created_by, 'nama_lengkap')->nama_lengkap}}</small><br>
                                {!! \App\ModelFuction::getReadMore($items->teks, "berita/detail/".$items->seo, 200) !!}
                            </div>
                        </div>
                    @endforeach
                    {!! \App\Berita::getBeritaKategori($id, 10)->render() !!}
                @else
                    <div class="card">
                        <div class="card-header">Mohon Maaf...</div>
                        <div class="card-body">
                            <p class="text-capitalize text-danger">berita {{\App\BeritaKategori::getKategoriId($id)}} belum tersedia</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
