<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        function limit_words($string, $word_limit){
            $words = explode(" ",$string);
            return implode(" ",array_splice($words,0,$word_limit));
        }
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Artikel</title>
    @include('layouts.halamandepan._headcss')
    <style>
    	.sharePopup{
    		font-size: 11px;
    	}
      .sharePopup a{
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

              <?php foreach ($data as $row) : ?>
                <div class="blog-single-item">
                    <div class="blog-img_block">

                        <img src="{{ asset('storage/berita/'.$row->kategori->kategori_nama.'/'.$row->berita_gambar) }}" class="img-fluid" alt="blog-img">
                        <div class="blog-date">
                            <span><?php

                            $date = new DateTime($row->berita_tanggal);
                            echo $date->format('d M Y');
                            ?></span>

                        </div>
                    </div>
                    <div class="blog-tiltle_block">
                        <h4><a href="{{route('site.single.post',$row->berita_slug)}}"><?php echo $row->berita_judul;?></a></h4>
                        <h6> <a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>{{$row->author}}</span> </a> | <a href="#"><i class="fa fa-tags" aria-hidden="true"></i><span>{{$row->kategori->kategori_nama}}</span> </a> | <a href="#"><i class="fa fa-eye" aria-hidden="true"></i><span>{{$row->berita_views}}</span></a></h6>
                        {!! Str::words(strip_tags($row->berita_isi),25, '...') !!}
                        <div class="blog-icons">
                            <div class="blog-share_block">
                                <a href="/artikel/{{$row->berita_slug}}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
              <?php endforeach;?>
                <nav>
                    <?php error_reporting(0); echo $page;?>
                </nav>
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

    </body>

    </html>
