@extends('layouts.app-back')
@section('title')
    {{$detail->judul}}
@endsection
@section('berita')
    active
@endsection
@section('berita-color')
    text-white
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include('back.lib.menu')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{\App\BeritaTipe::getTipeId($detail->tipe_id)}} / {{\App\BeritaKategori::getKategoriId($detail->kategori_id)}} / {{$detail->judul}}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" class="btn btn-light">
                                Melihat <span class="badge badge-light">{{\App\BeritaViewer::countInfoViewer($detail->id)}}</span>
                                <span class="sr-only">unread messages</span>
                            </button>
                            <button type="button" class="btn btn-info" title="{!! \App\BeritaKomentar::getInfoKomentar($detail->id) !!}">
                                Berkomentar <span class="badge badge-light">{{\App\BeritaKomentar::countInfoKomentar($detail->id)}}</span>
                                <span class="sr-only">unread messages</span>
                            </button>
                            <button type="button" class="btn btn-success" title="{!! \App\BeritaRespon::getInfoRespon($detail->id) !!}">
                                Merespon <span class="badge badge-light">{{\App\BeritaRespon::countInfoRespon($detail->id)}}</span>
                                <span class="sr-only">unread messages</span>
                            </button>
                        </div>
                        <img src="{{url('img/berita/'.$detail->gambar)}}" class="form-control"><br>
                        <small class="label label-info">tanggal rilis : {{$detail->created_at}} | dibuat oleh : {{\App\User::infoUser($detail->created_by, 'nama_lengkap')->nama_lengkap}}</small><br>
                        {!! $detail->teks !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
