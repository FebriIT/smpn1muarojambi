<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LAB Komputer</title>
    @include('layouts.halamandepan._headcss')
    <style>
        .sharePopup {
            font-size: 11px;
        }

        .sharePopup a {
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
                    <h2>{{ $data->judul }}</h2>

                    {!! $data->deskripsi !!}


                </div>
                <div class="col-md-5">
                    <img src="{{ asset('storage/pengaturan/labkom/'.$data->gambar) }}" class="img-fluid" alt="#">
                </div>
            </div>
        </div>
    </section>
    <!--============================= FOOTER =============================-->
    @include('layouts.halamandepan._footer')
    <!--//END FOOTER -->
    @include('layouts.halamandepan._javascript')

    <script>
        $(document).ready(function () {
            $(".sharePopup").jsSocials({
                showCount: true,
                showLabel: true,
                shareIn: "popup",
                shares: [{
                        share: "twitter",
                        label: "Twitter"
                    },
                    {
                        share: "facebook",
                        label: "Facebook"
                    },
                    {
                        share: "googleplus",
                        label: "Google+"
                    },
                    {
                        share: "linkedin",
                        label: "Linked In"
                    },
                    {
                        share: "pinterest",
                        label: "Pinterest"
                    }
                ]
            });
        });
    </script>

</body>

</html>

