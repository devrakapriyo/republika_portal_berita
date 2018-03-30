<div class="card">
    <div class="card-header">MENU</div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item @yield('beranda')"><a href="{{url('admin')}}" class="@yield('beranda-color')">Beranda</a></li>
            <li class="list-group-item @yield('biodata')"><a href="{{url('admin/biodata')}}" class="@yield('biodata-color')">Biodata Anda</a></li>
            <li class="list-group-item @yield('berita')"><a href="{{url('admin/berita')}}" class="@yield('berita-color')">Buat Berita Baru?</a></li>
            <li class="list-group-item @yield('admin')"><a href="{{url('admin/admin')}}" class="@yield('admin-color')">Butuh Admin Baru?</a></li>
            <li class="list-group-item"><a href="{{url('admin/logout')}}">Logout</a></li>
        </ul>
    </div>
</div>