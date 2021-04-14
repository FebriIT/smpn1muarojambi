<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administrasi Kantor Sekolah</title>
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
                <h2>Administrasi Kantor Sekolah</h2>
                <p style="text-align:justify;">Seperti sekolah lain, kegiatan belajar-mengajar yang berlangsung di SMP Negeri 1 
                  Yogyakarta tidak dapat dipisahkan dengan proses administrasi yang sebagian besar dilakukan di ruang kantor sekolah. 
                  Selain di ruang kantor, proses administrasi juga dilakukan oleh para guru di ruang guru. Sebagai bagian dari 
                  pelaksanaan kegiatan di sekolah, terdapat bagian Tata Usaha (TU) yang mengurus bagian administrasi sekolah.
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
