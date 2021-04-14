<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pengumuman</title>
    @include('layouts.halamandepan._headcss')
</head>

<body>
    <!--============================= HEADER =============================-->
    @include('layouts.halamandepan._header')
    <!--//END HEADER -->
    <!--============================= EVENTS =============================-->
    <section class="events">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="event-title">Pengumuman</h2>
                </div>
                <div class="col-md-8">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item nav-tab1">
                            <a class="nav-link tab-list active" data-toggle="tab" href="#upcoming-events"
                                role="tab">Pengumuman Terbaru </a>
                        </li>

                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="upcoming-events" role="tabpanel">

                        <?php foreach($data as $row):?>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="event-date">
                                        <h4>{{ $row->pengumuman_tanggal->format('d') }}</h4>
                                        <span>{{ $row->pengumuman_tanggal->format('M Y') }}</span>
                                    </div>
                                    <span
                                        class="event-time"><?php echo date("H:i", strtotime($row->pengumuman_tanggal)).' WIB';?></span>
                                </div>
                                <div class="col-md-10">
                                    <div class="event-heading">
                                        <h3><?php echo $row->pengumuman_judul;?></h3>
                                        <p><?php echo $row->pengumuman_deskripsi;?></p>
                                    </div>
                                </div>
                            </div>
                            <hr class="event-underline">
                        </div>
                        <?php endforeach;?>


                    </div>

                </div>
            </div>
            {{$data->links()}}
        </div>
    </section>
    <!--//END EVENTS -->
    <!--============================= FOOTER =============================-->
    @include('layouts.halamandepan._footer')
    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    @include('layouts.halamandepan._javascript')
</body>

</html>
