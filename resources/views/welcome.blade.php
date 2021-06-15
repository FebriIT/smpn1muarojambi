<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="maximum-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMP N 1 MUARO JAMBI</title>
    <link rel="shorcut icon" href="{{asset('template/theme/images/LOGO SMPN 1 OK.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('template/theme/css/bootstrap.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template/theme/css/font-awesome.min.css')}}">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="{{asset('template/theme/css/simple-line-icons.css')}}">
    <!-- Slider / Carousel -->
    <link rel="stylesheet" href="{{asset('template/theme/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('template/theme/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('template/theme/css/owl.carousel.min.css')}}">
    <!-- Main CSS -->
    <link href="{{asset('template/theme/css/style.css')}}" rel="stylesheet">


    <?php
        function limit_words($string, $word_limit){
            $words = explode(" ",$string);
            return implode(" ",array_splice($words,0,$word_limit));
        }
    ?>
</head>

<body>
    <!--============================= HEADER =============================-->
    @include('layouts.halamandepan._header')


    <section>
        <div class="slider_img layout_two">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://www.upload.ee/image/13076932/bg1.jpg" alt="First slide">
                        <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                                <h1>Berpikir Kreatif &amp; Inovatif</h1>
                                <br>
                                <h4>Bagi kami kreativitas merupakan gerbang masa depan.<br> kreativitas akan mendorong
                                    inovasi. <br> Itulah yang kami lakukan.</h4>
                                {{-- <div class="slider-btn">
                                    <a href="#" class="btn btn-default">Learn more</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://www.upload.ee/image/13076936/bg2.jpg" alt="Second slide">
                        <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                                <h1>Guru Berkualitas Tinggi</h1>
                                <br>
                                <h4>Guru merupakan faktor penting dalam proses belajar-mengajar.<br> Itulah kenapa kami
                                    mendatangkan guru-guru <br>terbaik dari berbagai penjuru.</h4>
                                {{-- <div class="slider-btn">
                                    <a href="#" class="btn btn-default">Learn more</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://www.upload.ee/image/13076938/bg3.jpg" alt="Third slide">
                        <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                                <h1>Proses Belajar Interaktif</h1>
                                <br>
                                <h4>Kami membuat proses belajar mengajar menjadi lebih interaktif.<br> dengan demikian
                                    siswa lebih menyukai <br>proses belajar.</h4>
                                {{-- <div class="slider-btn">
                                    <a href="#" class="btn btn-default">Learn more</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <i class="icon-arrow-left fa-slider" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel"  role="button" data-slide="next">
                    <i class="icon-arrow-right fa-slider" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!--//END HEADER -->
    <!--============================= ABOUT =============================-->
    <section class="clearfix about about-style2">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <br>
                    <h2>Selamat Datang di SMP Negeri 1 Muaro Jambi</h2>
                    <p>Kami Menyambut baik pengunjung yang datang di website resmi kami , dengan harapan website ini
                        dapat memberikan informasi yang akurat dan meningkatkan layanan pendidikan kepada siswa,
                        orangtua, dan masyarakat pada umumnya semakin meningkat. </p>

                </div>
                <div class="col-md-3">
                    <img src="{{asset('images/kepalasekolah.png')}}" class="img-fluid about-img" alt="#">
                    <p>
                        <center><b><u>Kepala Sekolah</u></b></center>
                        <center><b>ERMA DEWITA, S.Pd</b></center>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--//END ABOUT -->
    <!--============================= OUR COURSES =============================-->
    <section class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Artikel Terbaru</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($berita as $row )
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="courses_box mb-4">
                        <div class="course-img-wrap">
                            <img src="{{ asset('storage/berita/'.$row->kategori->kategori_nama.'/'.$row->berita_gambar) }}" style="height: 250px;width:100%;object-fit:cover;" class="img-fluid" alt="courses-img">
                        </div>
                        <!-- // end .course-img-wrap -->
                        <a href="{{ url('artikel/'.$row->berita_slug) }}" class="course-box-content">
                            <h3 style="text-align:center;">{{ Str::words($row->berita_judul, 6, '...') }}</h3>
                        </a>
                    </div>
                </div>
                @endforeach

            </div> <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="{{ url('artikel') }}" class="btn btn-default btn-courses">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!--//END OUR COURSES -->



    <!--============================= Pengumuman =============================-->
    <section class="event">
        <div class="container">
            <div class="row">
                {{-- pengumuman --}}
                <div class="col-lg-6">
                    <div class="event-img2">
                        @foreach ($pengumuman as $row)
                        <div class="row">
                            <div class="col-sm-3"> <img src="{{asset('template/theme/images/announcement-icon.png')}}"
                                    class="img-fluid" alt="event-img"></div><!-- // end .col-sm-3 -->
                            <div class="col-sm-9">
                                <h3><a href="{{url('/pengumuman')}}"><?php echo $row->pengumuman_judul;?></a></h3>
                                <span>{{$row->created_at->format('d/m/Y')}}</span>
                                <p><?php echo limit_words($row->pengumuman_deskripsi,10).'...';?></p>

                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                {{-- agenda --}}
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($agenda as $row)
                            <div class="event_date">
                                <div class="event-date-wrap">
                                    <p><?php echo date("d", strtotime($row->agenda_tanggal));?></p>
                                    <span><?php echo date("M. y", strtotime($row->agenda_tanggal));?></span>
                                </div>
                            </div>
                            <div class="date-description">
                                <h3><a href="{{url('/agenda')}}"><?php echo $row->agenda_nama;?></a></h3>
                                <p><?php echo limit_words($row->agenda_deskripsi,10).'...';?></p>
                                <hr class="event_line">
                            </div>
                            @endforeach


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--//END Pengumuman -->


    <!--============================= DETAILED CHART =============================-->
    <div class="detailed_chart">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom">
                    <div class="chart-img">
                        <img src="{{asset('template/theme/images/chart-icon_1.png')}}" class="img-fluid"
                            alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">{{ $countguru }}</span> Guru
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom chart_top">
                    <div class="chart-img">
                        <img src="{{asset('template/theme/images/chart-icon_2.png')}}" class="img-fluid"
                            alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">{{ $countsiswa }}</span> Siswa
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_top">
                    <div class="chart-img">
                        <img src="{{asset('template/theme/images/chart-icon_3.png')}}" class="img-fluid"
                            alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">{{ $countpengumuman }}</span> Pengumuman
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="chart-img">
                        <img src="{{asset('template/theme/images/chart-icon_4.png')}}" class="img-fluid"
                            alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">{{ $countagenda }}</span></span> Agenda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//END DETAILED CHART -->
    <!--============================= FOOTER =============================-->
    @include('layouts.halamandepan._footer')
    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <script src="{{asset('template/theme/js/jquery.min.js')}}"></script>
    <script src="{{asset('template/theme/js/tether.min.js')}}"></script>
    <script src="{{asset('template/theme/js/bootstrap.min.js')}}"></script>
    <!-- Plugins -->
    <script src="{{asset('template/theme/js/slick.min.js')}}"></script>
    <script src="{{asset('template/theme/js/waypoints.min.js')}}"></script>
    <script src="{{asset('template/theme/js/counterup.min.js')}}"></script>
    <script src="{{asset('template/theme/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template/theme/js/validate.js')}}"></script>
    <script src="{{asset('template/theme/js/tweetie.min.js')}}"></script>
    <!-- Subscribe -->
    <script src="{{asset('template/theme/js/subscribe.js')}}"></script>
    <!-- Script JS -->
    <script src="{{asset('template/theme/js/script.js')}}"></script>


</body>
{{-- <iframe id="google_esf" name="google_esf" src="https://googleads.g.doubleclick.net/pagead/html/r20210420/r20190131/zrt_lookup.html#" data-ad-client="ca-pub-3786943708043906" style="display: none;"></iframe> --}}
</html>
