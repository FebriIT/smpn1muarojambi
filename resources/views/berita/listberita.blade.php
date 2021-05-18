@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Berita</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">List Berita</li>
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

                            <a href="/{{auth()->user()->role}}/postberita" type="button"
                                class="btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Buat Berita</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="datapengumuman" class="table table-bordered table-striped"
                                style="font-size: 14px">
                                <thead>
                                    <tr>
                                        <th style="width: 90px">Gambar</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>Author</th>
                                        <th>Baca</th>
                                        <th>Kategori</th>
                                        <th style="width: 17%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $data as $datas )
                                    <tr>
                                        <td><img src="{{$datas->getGambar()}}" style="width:90px;"></td>
                                        <td>{{$datas->berita_judul}}</td>
                                        <td>{{$datas->berita_tanggal}}</td>
                                        <td>{{$datas->author}}</td>
                                        <td>{{$datas->berita_views}}</td>
                                        <td>{{$datas->kategori->kategori_nama}}</td>

                                        <td class="project-actions text-right">
                                            <div>
                                                <a class="btn btn-primary btn-sm" target="_blink"
                                                    href="{{route('site.single.post',$datas->berita_slug)}}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>
                                                <a class="btn btn-info btn-sm"
                                                    href="/{{auth()->user()->role}}/berita/edit/{{ $datas->id }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="/{{auth()->user()->role}}/berita/{{$datas->id}}/hapus"
                                                    onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
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
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>

@stop
