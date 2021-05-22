<div class="col-md-4">

    <div class="blog-category_block">
        <h3>Kategori</h3>
        <ul>
            @foreach ($kategori as $row )
            <li><a href="/artikel/kategori/{{$row->kategori_nama}}">{{$row->kategori_nama}}<i class="fa fa-caret-right"
                        aria-hidden="true"></i></a></li>
            @endforeach

        </ul>
    </div>
    <div class="blog-featured_post">
        <h3>Populer</h3>
        <?php foreach ($populer as $row) :?>
        <div class="blog-featured-img_block">
            <img width="35%" src="{{asset('storage/berita/'.$row->kategori->kategori_nama.'/'.$row->berita_gambar)}}" class="img-fluid"
                alt="blog-featured-img">
            <h5><a href="{{route('site.single.post',$row->berita_slug)}}">{{ Str::words($row->berita_judul, 5, '...') }}</a></h5>

            {!! Str::words(strip_tags($row->berita_isi),15, '...') !!}
            <hr>
        </div>

        <?php endforeach;?>
    </div>

</div>
