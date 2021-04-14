@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Guru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Guru</li>
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
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>Matapelajaran</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Hp</th>
                                        <th>Tanggal Lahir</th>
                                        <th style="width: 17%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $data as $key=>$datas )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$datas->nip_guru}}</td>
                                        <td>{{$datas->nama_guru}}</td>
                                        <td>{{$datas->mapel_nama}}</td>
                                        <td>{{$datas->jenis_kelamin}}</td>
                                        <td>{{$datas->no_hp}}</td>
                                        <td>{{$datas->tanggal_lahir->format('d/m/Y')}}</td>
                                        <td class="project-actions text-right">
                                            <div>

                                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal"
                                                    data-target="#editModal-{{$datas->id_guru}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="/{{auth()->user()->role}}/guru/{{$datas->id_guru}}/hapus"
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
                    <h4 class="modal-title">Tambah Guru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/{{auth()->user()->role}}/guru/tambah" method="POST" id="quickForm"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-group {{ $errors->has('nip')?' has-error':'' }}">
                                <label for="nip">NIP</label>
                                <input name="nip_guru" type="number" class="form-control" id="nip"
                                    aria-describedby="emailHelp" placeholder="Nomor Induk Pegawai"
                                    value="{{ old('nip_guru') }}" required>
                                @if ($errors->any('nip_guru'))
                                <span style="font-size:12px;color:red;">{{$errors->first('nip_guru')}}</span>
                                @endif

                            </div>

                            <div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
                                <label for="nama">Nama</label>
                                <input required name="nama_guru" type="text" class="form-control" id="nama"
                                    aria-describedby="emailHelp" placeholder="Nama" value="{{ old('nama_guru') }}">

                            </div>
                            <div class="form-group {{ $errors->has('mapel')?' has-error':'' }}">
                                <label for="mapel">Mapel</label>
                                <select name="mapel_id" class="form-control" id="mapel" required>
                                    <option value="">-pilih-</option>
                                    @foreach ($mapel as $mapel)
                                    <option
                                        value="{{ $mapel->mapel_id }} {{ (old('mapel_id')==$mapel->mapel_id)?' selected':'' }}">
                                        {{ $mapel->mapel_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('no_hp')?' has-error':'' }}">
                                <label for="nohp">Nomor HP</label>
                                <input name="no_hp" type="number" class="form-control" required id="nohp"
                                    aria-describedby="emailHelp" placeholder="Nomor HP" value="{{ old('no_hp') }}">

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
    <div class="modal fade" id="editModal-{{$feb->id_guru}}">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Guru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/{{auth()->user()->role}}/guru/{{$feb->id_guru}}/edit" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama_guru">Nama</label>
                            <input name="nama_guru" type="text" class="form-control" id="nama_guru"
                                aria-describedby="emailHelp" placeholder="Nama" value="{{ $feb->nama_guru }}" required>
                        </div>

                        <div class="form-group {{ $errors->has('mapel')?' has-error':'' }}">
                            <label for="mapel">Mapel</label>
                            <select name="mapel_id" class="form-control" id="mapel" required>
                                @foreach ($mapel1 as $row)
                                <option value="{{ $row->mapel_id }}"@if($row->mapel_id==$feb->mapel_id) selected @endif>{{ $row->mapel_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="jk" required>
                                <option value="Laki-Laki" @if($feb->jenis_kelamin=='Laki-Laki') selected
                                    @endif>Laki-Laki</option>
                                <option value="Perempuan" @if($feb->jenis_kelamin=='Perempuan') selected
                                    @endif>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nohp">No HP</label>
                            <input name="tempat_lahir" type="number" value="{{ $feb->no_hp }}" class="form-control"
                                id="nohp" aria-describedby="emailHelp" placeholder="Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="tgllhir">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" value="{{ $feb->tanggal_lahir->format('Y-m-d') }}"
                                class="form-control" id="tgllhir" aria-describedby="emailHelp">
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
