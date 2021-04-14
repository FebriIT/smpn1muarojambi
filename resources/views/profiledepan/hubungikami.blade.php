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
            <div class="col-md-12">
                <h2>Hubungi Kami</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1676.858561869109!2d103.5006283359923!3d-1.5992205892517448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2f62fc4fa463d1%3A0x5b4cb7c10f2222a0!2sSMP%20N%201%20MUARO%20JAMBI!5e0!3m2!1sid!2sid!4v1617636057367!5m2!1sid!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <p>

                    Simpang Sungai Duren, Kec. Jambi Luar Kota, Kabupaten Muaro Jambi, Jambi 36657. 
                </p>

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
