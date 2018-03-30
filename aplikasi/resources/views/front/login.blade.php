@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form id="login">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required>
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
                                        Login
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#login').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{url('login-action')}}",
                type: "post",
                data: $('#login').serialize(),
                beforeSend: function () {
                    swal({title: "Mohon Tunggu", text: "Proses Login berlangsung", showConfirmButton: false});
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