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
                        @if(auth()->user()->role=='admin')
                        <div class="card-header">

                            <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal"
                                data-target="#modaltambah"><i class="fas fa-plus"></i> Tambah Data</button>
                        </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="datapengumuman" class="table table-bordered table-striped"
                                style="font-size: 14px;width: 100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Kelas</th>
                                        <th style="width: 17%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $data as $key=>$datas )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$datas->nama_kelas}}</td>
                                        <td class="project-actions text-right">
                                            <div>

                                                <a class="btn btn-primary btn-sm"
                                                    href="/{{auth()->user()->role}}/kelas/open/{{$datas->id}}">

                                                    Open
                                                </a>
                                                @if(auth()->user()->role=='admin')
                                                <a class="btn btn-danger btn-sm"
                                                    href="/{{auth()->user()->role}}/kelas/{{$datas->id}}/hapus"
                                                    onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>
                                                @endif


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
{{-- ###################################################################################################### --}}


{{-- Modal Tambah Data --}}
<div class="modal fade" id="modaltambah">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/kelas/tambah" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="judul">Kelas</label>
                        <input type="text" name="nama_kelas" value="{{ old('nama_kelas')}}" class="form-control"
                            id="judul" placeholder="Nama Kelas" required>
                        @if ($errors->any('nama_kelas'))
                        <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('nama_kelas')}}</i></p>
                        @endif

                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end modal tambah data -->


{{-- ###################################################################################################### --}}


@stop
