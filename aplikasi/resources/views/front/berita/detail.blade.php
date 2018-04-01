@extends('layouts.app')
@section('title')
    {{$detail->judul}}
@endsection
@section('css')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <img src="{{url('img/berita/'.$detail->gambar)}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$detail->judul}}
                        </h5>
                        <p class="card-text">
                            <small class="text-muted">
                                {{\App\ModelFuction::formatDateTimeIndo($detail->created_at)}} | dibuat oleh : {{\App\User::infoUser($detail->created_by, 'nama_lengkap')->nama_lengkap}}
                            </small>
                        </p>
                        {!! $detail->teks !!}
                    </div>
                    @if(Auth::check() == true)
                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <div class="form-group">
                                        <label>Bagaimana perasaan mu sekarang?</label>
                                    </div>
                                    <div class="form-group">
                                        <a onclick="respon('{{$detail->id}}', 'senang')" class="btn btn-success text-white">senang</a>
                                        <a onclick="respon('{{$detail->id}}', 'sedih')" class="btn btn-warning text-white">sedih</a>
                                        <a onclick="respon('{{$detail->id}}', 'marah')" class="btn btn-danger text-white">marah</a>
                                    </div>
                                </div><br>
                                <form id="simpan">
                                    <div class="form-group">
                                        <label>Berikan pendapatmu</label>
                                        <textarea rows="5" name="teks"></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-primary">kirimkan pendapatmu...</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div><br>

                <p class="h5">apa kata mereka sih?</p>
                @forelse(\App\BeritaKomentar::getDataKomentarId($detail->id) as $items)
                    <div class="alert alert-dark" role="alert">
                        <h5 class="alert-heading">{{\App\User::infoUser($items->users_id, "nama_lengkap")->nama_lengkap}}</h5>
                        {!! $items->teks !!}
                    </div>
                @empty
                    <div class="alert alert-dark" role="alert">
                        Opps sepertinya belum ada yang memulai pendapat
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#simpan").on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{url('berita/komentar/'.$detail->id)}}",
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
                                        document.location.href = "{{url('berita/detail/'.$detail->seo)}}"
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

        function respon(id, perasaan){
            $.ajax({
                url: "{{url('berita/respon')}}" + "/" + id + "/" + perasaan,
                type: "get",
                contentType: false,
                processData: false,
                beforeSend: function(){
                    swal({ title:"Mohon Tunggu", text:"Proses Sedang Berlangsung", showConfirmButton: false});
                },
                success: function (d) {
                    if(d.status == 200){
                        swal({ title:"Alhamdulillah", text:d.msg, type:"success"},
                            function(isConfirm){
                                if (isConfirm) {
                                    document.location.href = "{{url('berita/detail/'.$detail->seo)}}"
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
        }
    </script>
@endsection