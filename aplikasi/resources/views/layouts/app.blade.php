<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Republika.co.id | @yield('title')</title>

    <!-- Styles -->
    <link rel="icon" href="{{url('republika-ico.png')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{url('js/jquery.min.js')}}"></script>
    <link href="{{ url('css/sweetalert.css') }}" type="text/css" rel="stylesheet" />
    <script src="{{ url('js/sweetalert.min.js') }}" type="text/javascript"></script>
    @yield('css')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Republika.co.id
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @foreach(\App\BeritaKategori::getMenuKategori() as $items)
                        <li><a class="nav-link @yield($items->id) text-info @yield("color-".$items->id)" href="{{url('berita/kategori/'.$items->id)}}">{{$items->kategori}}</a></li>
                    @endforeach
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cari-judul" aria-label="Text input with dropdown button">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cari Kategori</button>
                                <div class="dropdown-menu">
                                    @foreach(\App\BeritaKategori::getMenuKategori() as $items)
                                        <a class="dropdown-item" onclick="cari('{{$items->id}}')">{{$items->kategori}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Authentication Links -->
                    @if(Auth::check() == true)
                        <li><a class="nav-link">Hai, {{Auth::User()->nama_lengkap}}</a></li>
                        <li><a class="nav-link text-danger" href="{{url('logout')}}">Keluar?</a></li>
                    @else
                        <li><a class="nav-link" href="{{url('login')}}">Login</a></li>
                        <li><a class="nav-link" href="{{url('register')}}">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')
<script>
    function cari(kategori_id) {
        if($("#cari-judul").val() == ""){
            var judul = null
        }else{
            var judul = $("#cari-judul").val()
        }
        $.ajax({
            url: "{{url('berita/cari/')}}" + "/" + kategori_id + "/" + judul,
            type: "get",
            contentType: false,
            processData: false,
            beforeSend: function(){
                swal({ title:"Mohon Tunggu", text:"Proses Sedang Berlangsung", showConfirmButton: false});
            },
            success: function (d) {
                document.location.href = "{{url('berita/cari/')}}" + "/" + kategori_id + "/" + judul

            },
            error: function(d){
                swal("Mohon Maaf...", "Terjadi Kesalahan Pada Sistem!", "error");
            }
        });
    }
</script>
</body>
</html>
