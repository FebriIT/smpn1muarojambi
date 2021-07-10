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
                            Siswa
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datapengumuman" class="table table-bordered table-striped"
                                style="font-size: 14px;width: 100%">
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
                <div class="col-lg-7 col-sm-12">
                    <div class="card">
                        <div class="card-header">

                            Materi
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datamateri" class="table table-bordered table-striped"
                                style="font-size: 14px;width: 100%">
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
                                        <td>
                                            @if ($materi->link_materi==!null)
                                            <span class="right badge badge-success">Active</span>
                                            @else
                                            <span class="right badge badge-danger">Not Active</span>
                                            @endif
                                        </td>
                                        <td class="project-actions text-right">
                                            <div>

                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ url('siswa/materi/download/'.$materi->file_materi) }}">

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
                <div class="col-lg-5 col-sm-12">
                    <div class="card">
                        <div class="card-header">

                            Tugas
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datamateri" class="table table-bordered table-striped"
                                style="font-size: 14px;width: 100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mapel</th>
                                        <th>Penulis</th>
                                        <th>Mapel</th>
                                        <th>Waktu</th>
                                        <th>Jenis Ujian</th>
                                        @if(auth()->user()->role=='siswa')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($datatugas as $tugas)
                                    <tr>
                                        <td>{{ $tugas->judul }}</td>
                                        <td>{{ $tugas->guru->nama_guru }}</td>
                                        <td>{{ $tugas->mapel->mapel_nama }}</td>
                                        <td>{{ $tugas->waktu }}</td>

                                        <td>

                                            @if ($tugas->jenis_tugas=='Ujian')
                                            <span class="right badge badge-danger">{{ $tugas->jenis_tugas }}</span>
                                            @else
                                            <span class="right badge badge-info">{{ $tugas->jenis_tugas }}</span>
                                            @endif
                                        </td>

                                        @if(auth()->user()->role=='siswa')
                                        <td>
                                            @php
                                            $sudah = \App\TugasSiswa::where('tugas_id', $tugas->id)->where('siswa_id',
                                            auth()->user()->siswa->id)->first();
                                            @endphp
                                            @if($sudah)
                                            <a href="#" class="btn btn-danger btn-sm">selesai</a>
                                            @else
                                            <a href="/siswa/tugas/{{ $tugas->id }}/takesoal"
                                                class="btn btn-primary btn-sm">Kerjakan</a>
                                            @endif

                                        </td>
                                        @endif

                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>


                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

@stop
