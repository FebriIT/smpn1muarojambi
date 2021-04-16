@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Siswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Siswa</li>
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
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th style="width: 17%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $data as $key=>$datas )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$datas->nisn}}</td>
                                        <td>{{$datas->nama_siswa}}</td>
                                        <td>{{$datas->kelas->nama_kelas}}</td>
                                        <td>{{$datas->jenis_kelamin}}</td>
                                        <td>{{$datas->tanggal_lahir->format('d/m/Y')}}</td>
                                        <td class="project-actions text-right">
                                            <div>

                                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal"
                                                    data-target="#editModal-{{$datas->id}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="/{{auth()->user()->role}}/siswa/{{$datas->id}}/hapus"
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


    {{-- ###################################################################################################### --}}


    {{-- Modal Tambah Data --}}
    <div class="modal fade" id="modaltambah">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/{{auth()->user()->role}}/siswa/tambah" method="POST" id="quickForm"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-group {{ $errors->has('nisn')?' has-error':'' }}">
                                <label for="nisn">NISN</label>
                                <input name="nisn" type="number" class="form-control" id="nisn"
                                    aria-describedby="emailHelp" placeholder="NISN Siswa"
                                    value="{{ old('nisn') }}" required>
                                @if ($errors->any('nisn'))
                                <span style="font-size:12px;color:red;">{{$errors->first('nisn')}}</span>
                                @endif

                            </div>

                            <div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
                                <label for="nama">Nama Siswa</label>
                                <input required name="nama_siswa" type="text" class="form-control" id="nama"
                                    aria-describedby="emailHelp" placeholder="Nama" value="{{ old('nama_siswa') }}">

                            </div>
                            <div class="form-group {{ $errors->has('kelas')?' has-error':'' }}">
                                <label for="kelas">Kelas</label>
                                <select name="kelas_id" class="form-control" id="kelas" required>
                                    <option value="">-pilih-</option>
                                    @foreach ($kelas as $kelas)
                                    <option
                                        value="{{ $kelas->id }} {{ (old('kelas_id')==$kelas->id)?' selected':'' }}">
                                        {{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('agama')?' has-error':'' }}">
                                <label for="agama">Agama</label>
                                <select name="agama" class="form-control" id="agama" required>
                                    <option value="">-pilih-</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>

                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('email')?' has-error':'' }}">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" required id="email"
                                    aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}">
                                @if ($errors->any('email'))
                                <span style="font-size:12px;color:red;">{{$errors->first('email')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jk" required>
                                    <option value="">-pilih-</option>
                                    <option value="Laki-Laki" {{ (old('jenis_kelamin')=='Laki-Laki')?' selected':'' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan" {{ (old('jenis_kelamin')=='Perempuan')?' selected':'' }}>
                                        Perempuan</option>

                                </select>
                            </div>

                            <div class="form-group {{ $errors->has('tanggal_lahir')?' has-error':'' }}">
                                <label for="tgllhir">Tanggal Lahir</label>
                                <input name="tanggal_lahir" type="date" class="form-control" required id="tgllhir"
                                    aria-describedby="emailHelp" value="{{ old('tanggal_lahir') }}">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback" style=""></span>
                                </div>
                            </div>

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



{{-- Modal edit Data --}}
@foreach ($data as $feb)
<div class="modal fade" id="editModal-{{$feb->id}}">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/siswa/{{$feb->id}}/edit" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama_siswa">Nama</label>
                        <input name="nama_siswa" type="text" class="form-control" id="nama_siswa"
                            aria-describedby="emailHelp" placeholder="Nama" value="{{ $feb->nama_siswa }}" required>
                    </div>

                    <div class="form-group {{ $errors->has('kelas')?' has-error':'' }}">
                        <label for="kelas">Kelas</label>
                        <select name="kelas_id_kelas" class="form-control" id="kelas" required>
                            @foreach ($kelas1 as $row)
                            <option value="{{ $row->id_kelas }}"@if($feb->kelas_id_kelas==$row->id_kelas) selected @endif>{{ $row->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="jk" required>
                            <option value="Laki-Laki" @if($feb->jenis_kelamin=='Laki-Laki') selected @endif>Laki-Laki
                            </option>
                            <option value="Perempuan" @if($feb->jenis_kelamin=='Perempuan') selected @endif>Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input name="agama" type="text" value="{{ $feb->agama }}" class="form-control" id="agama"
                            aria-describedby="emailHelp" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tgllhir">Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="date" value="{{ $feb->tanggal_lahir->format('Y-m-d') }}" class="form-control"
                            id="tgllhir" aria-describedby="emailHelp" required>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endforeach
<!-- end modal edit data -->
</div>

@stop
