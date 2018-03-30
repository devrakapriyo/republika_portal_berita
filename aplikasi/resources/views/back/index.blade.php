@extends('layouts.app-back')
@section('title')
    Beranda
@endsection
@section('beranda')
    active
@endsection
@section('beranda-color')
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
                    <div class="card-header">Republika Dashboard</div>
                    <div class="card-body">
                        Assalamualaikum, {{auth('admin')->user()->nama_lengkap}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
