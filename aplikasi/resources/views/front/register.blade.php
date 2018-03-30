@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <form id="register">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label text-md-right">Nama Lengkap</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama_lengkap" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jk" class="col-sm-4 col-form-label text-md-right">Jenis Kelamin</label>
                                <div class="col-md-6">
                                    <select id="jk" class="form-control" name="jk" required>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
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
        $('#register').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{url('register-action')}}",
                type: "post",
                data: $('#register').serialize(),
                beforeSend: function () {
                    swal({title: "Mohon Tunggu", text: "Proses Berlangsung", showConfirmButton: false});
                },
                success: function (d) {
                    if(d.status == 400){
                        swal({ title:"Astagfirullah", text:d.msg, type:"success"},
                            function(isConfirm){
                                if (isConfirm) {
                                    document.location.href = d.response
                                }
                            });
                    }else if(d.status == 200){
                        swal({ title:"Alhamdulillah", text:d.msg, type:"success"},
                            function(isConfirm){
                                if (isConfirm) {
                                    document.location.href = d.response
                                }
                            });
                    }
                },
                error: (function (xhr, thrownError, err) {
                    if (err != 'Internal Server Error') {
                        swal("Mohon Maaf...", err, "error");
                    } else {
                        swal('Astagafirullah', 'Terjadi Kesalahan pada sistem', "error");
                    }
                })
            });

        });

    </script>
@endsection