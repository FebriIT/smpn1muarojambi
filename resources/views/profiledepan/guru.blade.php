<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Guru</title>
     @include('layouts.halamandepan._headcss')
    
</head>

<body>
    <!--============================= HEADER =============================-->
     @include('layouts.halamandepan._header')
    <!--//END HEADER -->

    <section class="our-teachers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-5">Guru Kami</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data as $row) : ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="admission_insruction">
                        <?php if(Storage::exists('public/guru/'.$row->user->email.'/' . $row->avatar)):?>
                        <img src="{{ asset('storage/guru/'.$row->user->email.'/'.$row->avatar) }}"  style="height: 250px;width:250px;object-fit:cover;" class="img-fluid" alt="#">
                        
                        <?php else:?>
                        <img src="{{ asset('images/default.png') }}" style="height: 250px;width:250px;object-fit:cover;" class="img-fluid" alt="#">
                        <?php endif;?>
                        <p class="text-center mt-3"><span>{{ $row->nama_guru }}</span>
                            <br>
                            {{ $row->mapel_nama }}</p>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <!-- End row -->
            
        </div>
    </section>

    <!--//End Style 2 -->
    <!--============================= FOOTER =============================-->
    @include('layouts.halamandepan._footer')
    <!--//END FOOTER -->
    @include('layouts.halamandepan._javascript')
</body>

</html>
