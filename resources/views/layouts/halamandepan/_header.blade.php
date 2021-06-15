<div class="header-topbar">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-8 col-md-9">
                <div class="header-top_address">

                    {{-- <div class="header-top_list">
                        <span class="icon-phone"></span>-
                    </div> --}}
                    <div class="header-top_list">
                        <span class="icon-envelope-open"></span>admin@smpn1muarojambi.sch.id
                    </div>
                    <div class="header-top_list">
                        <span class="fa fa-facebook"></span>Spensa Muaro Jambi
                    </div>

                </div>
                {{-- <div class="header-top_login2">
                    <a href="#">Hubungi Kami</a>
                </div> --}}
            </div>
            {{-- <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="header-top_login mr-sm-3">
                    <span class="icon-login" style="color:#FFB600;">      </span><a href="{{url('login')}}"> Login</a>
        </div>
    </div> --}}
</div>
</div>
</div>
{{-- <marquee bgcolor="FFF300">Maaf website sedang maintenance</marquee> --}}
<div data-toggle="affix">
    <div class="container nav-menu2">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded">
                    <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button"
                        data-toggle="collapse" data-target="#navbarNavDropdown">
                        <span class="icon-menu"></span>
                    </button>
                    <a href="{{url('/')}}" class="navbar-brand nav-brand2"><img class="img img-responsive"
                            width="300px;" src="{{asset('template/theme/images/logosmp1.PNG')}}"></a>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Profile</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ url('tentangkami') }}">Tentang Kami</a></li>
                                    <li><a class="dropdown-item" href="{{ url('visimisi') }}">Visi Dan Misi</a></li>
                                    <li><a class="dropdown-item" href="{{ url('sejarah') }}">Sejarah</a></li>
                                    <li><a class="dropdown-item" href="{{ url('hubungikami') }}">Hubungi Kami</a></li>
                                    <li><a class="dropdown-item" href="{{ url('sosialmedia') }}">Sosial Media</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Fasilitas</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item"
                                            href="{{ url('administrasikantorsekolah') }}">Administrasi Kantor
                                            Sekolah</a></li>
                                    <li><a class="dropdown-item" href="{{ url('perpustakaan') }}">Perpustakaan</a></li>
                                    <li><a class="dropdown-item" href="{{ url('labkomputer') }}">LAB Komputer</a></li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/guru') }}">Guru</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/artikel')}}">Kolom Guru</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/pengumuman')}}">Pengumuman</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/agenda')}}">Agenda</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/login')}}">Login</a>
                            </li>



                            {{-- <li class="nav-item">
                                <a class="nav-link" href="">Download</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Gallery</a>
                            </li> --}}

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
