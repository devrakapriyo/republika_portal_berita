@extends('layouts.app-back')
@section('title')
    Data Admin
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
                        <a href="{{url('admin/admin')}}" class="btn btn-success">Butuh Admin Baru?</a>
                        <a class="btn btn-default">Lihat Data Admin?</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\User::getUserRole("admin", 10) as $no => $rows)
                                    <tr>
                                        <td>{{$no+1}}</td>
                                        <td>{{$rows->nama_lengkap}}</td>
                                        <td>{{$rows->email}}</td>
                                        <td>{{$rows->jk == "L" ? "Laki-laki" : "Perempuan"}}</td>
                                        <td>{{$rows->is_deleted == "Y" ? "Tidak Aktif" : "Aktif"}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            {!! \App\User::getUserRole("admin", 10)->render(); !!}
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
