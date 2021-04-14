<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LAB Komputer</title>
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
                <h2>LAB Komputer</h2>
                <p style="text-align: justify;">
                    Laboratorium Komputer di SMP Negeri 1 Muaro Jambi setiap harinya digunakan untuk kegiatan belajar mengajar, baik mapel Informatika 
                    ataupun mapel lain yang membutuhkan komputer sebagai media belajarnya. Selain itu, Laboratorium Komputer juga 
                    digunakan untuk ujian berbasis komputer, misalnya Ulangan Harian, Tes pendalaman materi, dan ujian-ujian lainnya
                     yang menggunakan komputer. Oh iya, beberapa siswa juga menghabiskan waktu luangnya di Laboratorium Komputer untuk 
                     mengasah kemampuannya di bidang komputer, loh! Jadi, besok kalau situasi sudah normal lagi, ramaikan lagi yah
                      Laboratorium Komputer ini, kita belajar bersama, raih ilmu di bidang teknologi setinggi-tingginya, 
                      karena ada pepatah yang mengatakan “with technology, we can change the world”. Semangat belajar teknologi!
                </p>
               
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('images/bg6.jpeg') }}" class="img-fluid" alt="#">
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
