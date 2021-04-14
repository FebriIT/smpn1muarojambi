<div class="col-md-4">
    {{-- <form action="#" method="get">
        <input type="text" name="keyword" placeholder="Search" class="blog-search" required>
        <button type="submit" class="btn btn-warning btn-blogsearch">SEARCH</button>
    </form> --}}
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
            <img style="width: 120px;height:110px;object-fit: cover;" src="{{asset('images/berita/'.$row->berita_gambar)}}" class="img-fluid"
                alt="blog-featured-img">
            <h5><a href="{{route('site.single.post',$row->berita_slug)}}">{!!
                    \Illuminate\Support\Str::words($row->berita_judul, 3,'....') !!}</a></h5>

            <p>{!! \Illuminate\Support\Str::words($row->berita_isi, 7,'....') !!}</p>
        </div>
        <hr>
        <?php endforeach;?>
    </div>

</div>
