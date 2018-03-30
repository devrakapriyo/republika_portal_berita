@extends('layouts.app-back')
@section('title')
    Buat Berita
@endsection
@section('berita')
    active
@endsection
@section('berita-color')
    text-white
@endsection
@section('css')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('back.lib.menu')
        </div>
        <div class="col-md-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="utama-tab" data-toggle="tab" href="#utama" role="tab" aria-controls="utama" aria-selected="true">Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tipe-tab" data-toggle="tab" href="#tipe" role="tab" aria-controls="tipe" aria-selected="false">Berita Tipe Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="kategori-tab" data-toggle="tab" href="#kategori" role="tab" aria-controls="kategori" aria-selected="false">Berita Kategori Baru</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="utama" role="tabpanel" aria-labelledby="utama-tab">
                    @include('back.lib.berita-tab-utama')
                </div>
                <div class="tab-pane fade" id="tipe" role="tabpanel" aria-labelledby="tipe-tab">
                    @include('back.lib.berita-tab-tipe')
                </div>
                <div class="tab-pane fade" id="kategori" role="tabpanel" aria-labelledby="kategori-tab">
                    @include('back.lib.berita-tab-kategori')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#simpan-utama").on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{url('admin/berita/simpan/utama')}}",
                    type: "post",
                    contentType: false,
                    processData: false,
                    data: formData,
                    beforeSend: function(){
                        swal({ title:"Mohon Tunggu", text:"Proses Sedang Berlangsung", showConfirmButton: false});
                    },
                    success: function (d) {
                        if(d.status == 200){
                            swal({ title:"Alhamdulillah", text:d.msg, type:"success"},
                                function(isConfirm){
                                    if (isConfirm) {
                                        document.location.href = "{{url('admin/berita/data')}}"
                                    }
                                });
                        }else if(d.status == 400){
                            swal("Astagfirullah...", d.msg, "error");
                        }

                    },
                    error: function(d){
                        swal("Mohon Maaf...", "Terjadi Kesalahan Pada Sistem!", "error");
                    }
                });
            });

            $("#simpan-tipe").on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{url('admin/berita/simpan/tipe')}}",
                    type: "post",
                    contentType: false,
                    processData: false,
                    data: formData,
                    beforeSend: function(){
                        swal({ title:"Mohon Tunggu", text:"Proses Sedang Berlangsung", showConfirmButton: false});
                    },
                    success: function (d) {
                        if(d.status == 200){
                            swal({ title:"Alhamdulillah", text:d.msg, type:"success"},
                                function(isConfirm){
                                    if (isConfirm) {
                                        document.location.href = "{{url('admin/berita')}}"
                                    }
                                });
                        }else if(d.status == 400){
                            swal("Astagfirullah...", d.msg, "error");
                        }

                    },
                    error: function(d){
                        swal("Mohon Maaf...", "Terjadi Kesalahan Pada Sistem!", "error");
                    }
                });
            });

            $("#simpan-kategori").on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{url('admin/berita/simpan/kategori')}}",
                    type: "post",
                    contentType: false,
                    processData: false,
                    data: formData,
                    beforeSend: function(){
                        swal({ title:"Mohon Tunggu", text:"Proses Sedang Berlangsung", showConfirmButton: false});
                    },
                    success: function (d) {
                        if(d.status == 200){
                            swal({ title:"Alhamdulillah", text:d.msg, type:"success"},
                                function(isConfirm){
                                    if (isConfirm) {
                                        document.location.href = "{{url('admin/berita')}}"
                                    }
                                });
                        }else if(d.status == 400){
                            swal("Astagfirullah...", d.msg, "error");
                        }

                    },
                    error: function(d){
                        swal("Mohon Maaf...", "Terjadi Kesalahan Pada Sistem!", "error");
                    }
                });
            });
        });
    </script>
@endsection
