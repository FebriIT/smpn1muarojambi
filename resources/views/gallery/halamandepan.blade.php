<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gallery</title>
    @include('layouts.halamandepan._headcss')

    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('template/theme/css/magnific-popup.css') }}">
    <!-- Image Hover CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/theme/css/normalize.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/theme/css/set2.css') }} ">

    <!-- Masonry Gallery -->
    <link href="{{ asset('template/theme/css/animated-masonry-gallery.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <!--============================= HEADER =============================-->
    @include('layouts.halamandepan._header')
    <!--//END HEADER -->
    <div class="gallery-wrap">
        <div class="container">
            <!-- Style 2 -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="gallery-style">Gallery Photo</h3>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12">
                    <div id="gallery">
                        <div id="gallery-content">
                            <div id="gallery-content-center">
                                @foreach ($data as $row)
                                <a href="{{ asset('storage/gallery/'.$row->foto) }}" class="image-link2">
                                    <img src="{{ asset('storage/gallery/'.$row->foto) }}" style="height: 250px;width:250px;" class="all img-fluid" alt="#" />
                                </a>

                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--//End Style 2 -->

        </div>
    </div>

    <!--//End Style 2 -->
    <!--============================= FOOTER =============================-->
    @include('layouts.halamandepan._footer')
    <!--//END FOOTER -->
    @include('layouts.halamandepan._javascript')
    <!-- Plugins -->
    <script src="{{ asset('template/theme/js/slick.min.js') }}"></script>
    <script src="{{ asset('template/theme/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/theme/js/counterup.min.js') }}"></script>

    <!-- Subscribe -->
    <script src="{{ asset('template/theme/js/subscribe.js') }}"></script>

    <script src="{{ asset('template/theme/js/jquery-ui-1.10.4.min.js') }}"></script>
    <script src="{{ asset('template/theme/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('template/theme/js/animated-masonry-gallery.js') }}"></script>
    <!-- Magnific popup JS -->
    <script src="{{ asset('template/theme/js/jquery.magnific-popup.js') }}"></script>



</body>

</html>
