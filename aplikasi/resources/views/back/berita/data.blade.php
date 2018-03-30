@extends('layouts.app-back')
@section('title')
    Semua Berita
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
                    <div class="card-header">
                        <a href="{{url('admin/berita')}}" class="btn btn-success">Adakah Berita Baru Hari Ini?</a>
                        <a class="btn btn-default">Lihat Semua Berita?</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Tipe</th>
                                    <th>Kategori</th>
                                    <th>Lihat Isi Berita</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Berita::getBerita("semua", "semua", 10) as $no => $rows)
                                    <tr>
                                        <td>{{$no+1}}</td>
                                        <td>{{$rows->judul}}</td>
                                        <td>{{\App\BeritaTipe::getTipeId($rows->tipe_id)}}</td>
                                        <td>{{\App\BeritaKategori::getKategoriId($rows->kategori_id)}}</td>
                                        <td><a href="{{url('admin/berita/detail/'.$rows->seo)}}" class="btn btn-warning">Detail</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        {!! \App\Berita::getBerita("semua", "semua", 10)->render(); !!}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
