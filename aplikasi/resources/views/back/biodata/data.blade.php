@extends('layouts.app-back')
@section('title')
    Biodata
@endsection
@section('biodata')
    active
@endsection
@section('biodata-color')
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
                    <div class="card-header">Biodata Anda</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{auth('admin')->user()->nama_lengkap}}">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" value="{{auth('admin')->user()->jk == "L" ? "Laki-laki" : "Perempuan"}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{auth('admin')->user()->email}}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
