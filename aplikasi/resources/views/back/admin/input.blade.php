@extends('layouts.app-back')
@section('title')
    Buat Admin
@endsection
@section('admin')
    active
@endsection
@section('admin-color')
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
                        <a class="btn btn-default">Butuh Admin Baru?</a>
                        <a href="{{url('admin/admin/data')}}" class="btn btn-success">Lihat Data Admin?</a>
                    </div>
                    <div class="card-body">
                        <form id="simpan">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jk" required>
                                    <option value="">PILIH JENIS KELAMIN</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-primary">Simpan Admin Baru</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                    url: "{{url('admin/admin/simpan')}}",
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
                                        document.location.href = "{{url('admin/admin/data')}}"
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
