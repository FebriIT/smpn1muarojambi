@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            {{-- <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Tugas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Tugas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row --> --}}
        </div><!-- /.container-fluid -->
    </div>


    <!-- /.content-header -->

    {{-- ###################################################################################################### --}}


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">

                    <div class="panel-body">
                        <h3>Selamat Mengerjakan!!!</h3>
                        {{-- <div style="border-style:dashed; border-width:3px; border-color:blue;margin:5px;">
                            <div style="margin: 15px;">
                                <h4 style="font-weight: bold;color:rgb(0, 150, 45);">~ Detail Soal </h4>
                            <table class="table table-striped">
                                <tbody style="color: black;">
                                    <tr>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td>{{ $tugas->judul }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Soal Pilihan Ganda</td>
                                        <td>:</td>
                                        <td>{{ $tugas->soalpilihanganda->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Soal Essay</td>
                                        <td>:</td>
                                        <td>{{ $tugas->soalessay->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>:</td>
                                        <td>{{ $tugas->waktu }} menit</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="/siswa/tugas/{{ $tugas->id }}/soal" class="btn btn-primary btn-sm btn-block"><h4> Mulai Mengerjakan Soal </h4></a>
                            </div>
                        </div> --}}


                        <br>

                    </div>

                </div>

            </div>
        </div>
    </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>



@stop

@section('footer')
<script>

</script>
@endsection
