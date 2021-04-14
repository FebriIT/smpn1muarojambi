<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Visi Dan Misi</title>
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
                <h2>Visi Dan Misi</h2>
               
                <p> 
                    <b><u>Visi</u></b><br>
                    Visi pada SMP Negeri 1 Muaro Jambi adalah sebagai berikut :
                    <ul>
                        <li>Bertaqwa</li>
                        <li>Berprestasi</li>
                        <li>Kreatif</li>
                        <li>Mandiri</li>
                    </ul>
                </p>
                <p>
                    <b><u>Misi</u></b><br>
                    Dalam upaya mewujudkan visi tersebut, Misi SMP Negeri 1 Muaro Jambi adalah sebagai berikut :
                    <ol type="a">
                        <li>Menumbuh kembangkan penghayatan terhadap ajaran agama yang dianut dan budaya bangsa
                            sehingga terbangun siswa yang kompeten dan berakhlak mulia
                        </li>
                        <li>
                            Mewujudkan pembelajaran Aktif, Kreatif, Efektif dan Menyenangkan
                        </li>
                        <li>
                            Mengembangkan keterampilan melalui kegiatan pembelajaran dan pelatihan berbasis IPTEK
                        </li>
                        <li>
                            Menciptakan lingkungan pembelajaran yang kondusif dalam upaya meningkatkan mata pembelajaran
                        </li>
                        <li>
                            Mewujudkan disiplin dalam proses belajar mengajar
                        </li>
                        <li>
                            Menciptakan hubungan yang baik antara warga sekolah dan masyarakat untuk menciptakan mutu pendidikan
                        </li>
                    </ol>
                </p>
                
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('images/bg5.jpeg') }}" class="img-fluid" alt="#">
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
