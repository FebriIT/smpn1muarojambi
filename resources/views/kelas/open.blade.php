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

                            Kelas {{$data->nama_kelas}}
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

                {{-- <div class="row">
                    <div class="col-7">
                        <div class="card">
                            <div class="card-header">

                                Kelas {{$data->nama_kelas}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="datapengumuman" class="table table-bordered table-striped table1"
                                    style="font-size: 14px">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th>Nama Mapel</th>
                                            <th>Pembuat</th>
                                            <th>Mapel</th>
                                            <th>Waktu</th>
                                            <th>Jenis Ujian</th>
                                            <th style="width: 17%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>

                                </table>


                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">

                                Kelas {{$data->nama_kelas}}
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
                                            <th style="width: 17%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>

                                </table>


                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div> --}}
        </div><!-- /.container-fluid -->
    </section>
</div>

<style>
	.table1 {
		display: block;
		overflow-x: auto;
		white-space: nowrap;
	}
</style>
@stop