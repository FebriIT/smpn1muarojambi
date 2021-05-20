@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Kelas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <!-- /.content-header -->

    {{-- ###################################################################################################### --}}


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- @if(auth()->user()->role=='guru')
                            Kelas {{$data->nama_kelas}}
                            @elseif (auth()->user()->role=='siswa')
                            Kelas {{ $datasiswa->nama_kelas }}
                            @endif --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datapengumuman" class="table table-bordered table-striped"
                                style="font-size: 14px">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Nama</th>
                                        <th>NISN</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        {{-- <th style="width: 17%">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $datasiswa as $key=>$datas )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$datas->nama_siswa}}</td>
                                        <td>{{$datas->nisn}}</td>
                                        <td>{{$datas->jenis_kelamin}}</td>
                                        <td>{{$datas->tanggal_lahir->format('d/m/Y')}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>


                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">

                            Materi
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datamateri" class="table table-bordered table-striped"
                                style="font-size: 14px">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Nama Materi</th>
                                        <th>File Materi</th>
                                        <th>Link Materi</th>
                                        <th style="width: 17%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $materi as $key=>$materi)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$materi->materi}}</td>
                                        <td>{{$materi->file_materi}}</td>
                                        <td>{{$materi->link_materi}}</td>
                                        <td class="project-actions text-right">
                                            <div>

                                                <a class="btn btn-primary btn-sm" href="{{ url('siswa/materi/download/'.$materi->file_materi) }}">

                                                    download
                                                </a>



                                            </div>
                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>


                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                {{-- <div class="col-5">
                        <div class="card">
                            <div class="card-header">

                                Kelas {{$data->nama_kelas}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="datapengumuman" class="table table-bordered table-striped" style="font-size: 14px">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th style="width: 17%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>


            </div>
            <!-- /.card-body -->
        </div>
</div> --}}
<!-- ./col -->
</div>
</div><!-- /.container-fluid -->
</section>
</div>

@stop
