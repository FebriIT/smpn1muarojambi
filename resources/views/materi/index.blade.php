@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Materi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Materi</li>
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

                            <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal"
                                data-target="#modaltambah"><i class="fas fa-plus"></i> Tambah Data</button>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="datapengumuman" class="table table-bordered table-striped"
                                style="font-size: 14px">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Matapelajaran</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Link</th>
                                        <th>Kelas</th>
                                        <th>File Materi</th>
                                        <th style="width: 17%">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $data as $key=>$datas )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$datas->materi}}</td>
                                        <td>{{$datas->mapel->mapel_nama}}</td>
                                        <td>{{$datas->link_materi}}</td>
                                        <td>{{$datas->kelas->nama_kelas}}</td>
                                        <td>{{$datas->file_materi}}</td>

                                        <td class="project-actions text-right">
                                            <div>


                                                <a class="btn btn-danger btn-sm"
                                                    href="/{{auth()->user()->role}}/materi/{{$datas->id}}/hapus"
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

    {{-- ###################################################################################################### --}}


    {{-- Modal Tambah Data --}}
    <div class="modal fade" id="modaltambah">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Materi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/{{auth()->user()->role}}/materi/tambah" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="materi">Nama Materi</label>
                            <input type="text" name="materi" value="{{ old('materi')}}" class="form-control" id="materi"
                                placeholder="Nama Materi" required>
                        </div>
                        <div class="form-group {{ $errors->has('mapel')?' has-error':'' }}">
                            <label for="mapel">Mapel</label>
                            <select name="mapel_id" class="form-control" id="mapel" required>
                                <option value="">-pilih-</option>
                                @foreach ($mapel as $row)
                                <option value="{{ $row->id }}">{{ $row->mapel_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" value="{{ old('deskripsi')}}" class="form-control"
                                id="deskripsi" placeholder="Deskripsi" required>
                        </div>
                        <div class="form-group {{ $errors->has('kelas')?' has-error':'' }}">
                            <label for="kelas">Kelas</label>
                            <select name="kelas_id" class="form-control" id="kelas" required>
                                <option value="">-pilih-</option>
                                @foreach ($kelas as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file_materi">File Materi</label>
                            <input type="file" name="file_materi" value="{{ old('file_materi')}}" class="form-control"
                                id="file_materi">
                        </div>
                        <div class="form-group">
                            <label for="link_materi">Link Materi</label>
                            <input type="text" name="link_materi" value="{{ old('link_materi')}}" class="form-control"
                                id="link_materi" placeholder="Link Materi">
                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- end modal tambah data -->


{{-- ###################################################################################################### --}}



{

<!-- end modal edit data -->
@stop
