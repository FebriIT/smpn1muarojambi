<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perpustakaan</title>
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
<section class="welcome_about">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>Perpustakaan</h2>
                <p style="text-align: justify;">
                    Ruang perpustakaan terletak di sisi sebelah kanan lapangan upacara dengan luasan sekitar 99 m2. 
                    Lokasi yang berada di tengah sekolah memudahkan seluruh siswa untuk menggunakan fasilitas yang ada 
                    di perpustakaan sekolah. Koleksi buku yang ada sebagian besar adalah buku-buku penunjang kegiatan belajar-mengajar.  Selain itu ada juga koleksi buku fiksi dan majalah penunjang belajar siswa.
                </p>
               
                </div>
                {{-- <div class="col-md-5">
                    <img src="{{ asset('images/bg4.jpeg') }}" class="img-fluid" alt="#">
                </div>   --}}
            </div>
        </div>
</section>
<!--============================= FOOTER =============================-->
@include('layouts.halamandepan._footer')
        <!--//END FOOTER -->
        @include('layouts.halamandepan._javascript')

        <script>
            $(document).ready(function(){
              $(".sharePopup").jsSocials({
                    showCount: true,
                          showLabel: true,
                          shareIn: "popup",
                          shares: [
                          { share: "twitter", label: "Twitter" },
                          { share: "facebook", label: "Facebook" },
                          { share: "googleplus", label: "Google+" },
                          { share: "linkedin", label: "Linked In" },
                    { share: "pinterest", label: "Pinterest" }
                          ]
                  });
            });
          </script>
        
    </body>

</html>
