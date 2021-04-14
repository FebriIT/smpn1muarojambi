<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tentang Kami</title>
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
            <div class="col-md-7">
                <h2>Tentang Kami</h2>
                <p>SMP Negeri 1 Muaro Jambi resmi dibuka pada pada tahun 1981, terletak di Jl. Jambi – Muaro Bulian KM. 17 desa 
                  Sungai Duren Rt.02  Kec. Jambi Luar Kota Kab. Muaro Jambi Prov, Jambi. Memiliki bidang tanah seluas 4.743 M2 
                  Dengan Luas Bangunan 1.556 M2.
                </p>
                <p>
                  <b><u>Informasi Sekolah Tahun Ajaran 2020/2021</u></b><br>
                  Jumlah Tenaga Kependidikan (PTK) : 48 Orang <br>
                  Jumlah Siswa : 461 Siswa 
                </p>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('images/bg4.jpeg') }}" class="img-fluid" alt="#">
                </div>  
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
