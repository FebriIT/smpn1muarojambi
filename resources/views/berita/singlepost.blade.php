<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $post->berita_judul }}</title>
    @include('layouts.halamandepan._headcss')
    <style>
        .sharePopup {
            font-size: 11px;
        }

        .sharePopup a {
            font-size: 11px;
            color: #fff;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <!--============================= HEADER =============================-->
    @include('layouts.halamandepan._header')
    <!--//END HEADER -->
    <!--============================= BLOG =============================-->
    <section class="blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-img_block">
                        <img src="{{asset('storage/berita/'.$kategorinama.'/'.$post->berita_gambar)}}" class="img-fluid" alt="blog-img">
                        <div class="blog-date">
                            <span>{{$post->berita_tanggal->format('d M Y')}}</span>
                        </div>
                    </div>
                    <div class="blog-tiltle_block">
                        <h4><a href="#">{{$post->berita_judul}}</a></h4>
                        <h6> <a href="#"><i class="fa fa-user"
                                    aria-hidden="true"></i><span>{{$post->author}}</span> </a> | <a href="#"><i
                                    class="fa fa-tags"
                                    aria-hidden="true"></i><span>{{$post->kategori->kategori_nama}}</span> </a> | <a
                                href="#"><i class="fa fa-eye"
                                    aria-hidden="true"></i><span>{{$post->berita_views}}</span></a></h6>
                        {!!$post->berita_isi!!}
                    </div>

                    <div class="blog-tiltle_block">

                        <div class="blog-icons">
                            <div class="blog-share_block">
                                <div class="pull-left">
                                    <h5>Bagikan Ke:</h5>
                                </div>
                                <div class="sharePopup"></div>
                            </div>
                        </div>
                        <!-- Nav tabs -->

                    </div>
                </div>
                @include('layouts.halamandepan._kategoripopuler')
            </div>
        </div>
    </section>
    <!--//END BLOG -->
    <!--============================= FOOTER =============================-->
    {{-- @include('layouts.halamandepan._footer') --}}
    <!--//END FOOTER -->
    @include('layouts.halamandepan._javascript')

    <script>
        $(document).ready(function () {
            $(".sharePopup").jsSocials({
                showCount: true,
                showLabel: true,
                shareIn: "popup",
                shares: [{
                        share: "twitter",
                        label: "Twitter"
                    },
                    {
                        share: "facebook",
                        label: "Facebook"
                    },
                    {
                        share: "googleplus",
                        label: "Google+"
                    },
                    {
                        share: "linkedin",
                        label: "Linked In"
                    },
                    {
                        share: "pinterest",
                        label: "Pinterest"
                    }
                ]
            });
        });
    </script>

</body>

</html>
