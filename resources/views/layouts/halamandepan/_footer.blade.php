<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="foot-logo">
                    <a href="#">
                        <img src="{{asset('template/theme/images/logosmp1.png')}}" class="img-fluid" alt="footer_logo">
                    </a>
                    <p><?php echo date('Y');?> © copyright by <a href="#" target="_blank">Febri</a>. <br>All rights
                        reserved.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sitemap">
                    <h3>Menu Utama</h3>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('artikel') }}">Blog </a></li>
                        <li><a href="{{ url('tentangkami') }}">Tentang Kami</a></li>
                        <li><a href="{{ url('hubungikami') }}">Hubungi Kami</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sitemap">
                    <h3>Akademik</h3>
                    <ul>
                        <li><a href="#">Guru</a></li>
                        <li><a href="{{ url('pengumuman') }}">Pengumuman</a></li>
                        <li><a href="{{ url('agenda') }}">Agenda</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="address">
                    <h3>Hubungi Kami</h3>
                    <p><span>Alamat: </span> Jl. Jambi – Muaro Bulian KM. 17 desa Sungai Duren Rt.02 Kec.Jambi Luar Kota
                        Kab. Muaro Jambi Prov, Jambi
                    </p>
                    <p>Email : spensamj01@gmail.com
                        <br> Phone : -
                    </p>
                    <ul class="footer-social-icons">
                        <li><a href="https://web.facebook.com/smpnsatmajambi.smpnsatmajambi" target="_blink"><i
                                    class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram fa-in" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope fa-tw" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
