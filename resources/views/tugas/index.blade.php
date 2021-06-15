@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Tugas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Tugas</li>
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
                            <h3 class="card-title"></h3>
                            <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal"
                                data-target="#modaltambah"><i class="fas fa-plus"></i> Tambah Data</button>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="datapengumuman" class="table table-bordered table-striped text-center"
                                style="font-size: 14px;width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Dibuat Oleh</th>
                                        <th style="font-weight: bold">Mapel</th>
                                        <th style="font-weight: bold">Kelas</th>
                                        <th>Jenis Tugas</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$tugas)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$tugas->judul}}</td>
                                        <td>{{ $tugas->guru->nama_guru }}</td>
                                        <td style="font-weight: bold"><i>{{ $tugas->mapel->mapel_nama }}</i></td>
                                        <td>
                                            @foreach ($tugas->kelas as $kls)
                                            <div class="badge">{{ $kls->nama_kelas }}</div>
                                            @endforeach
                                        </td>

                                        <td>
                                            @if ($tugas->jenis_tugas=='Ujian')
                                            <span class="right badge badge-danger">{{ $tugas->jenis_tugas }}</span>
                                            @else
                                            <span class="right badge badge-info">{{ $tugas->jenis_tugas }}</span>
                                            @endif
                                        </td>

                                        <td>{{ $tugas->waktu }} Menit</td>
                                        @if(auth()->user()->role=='admin')
                                        <td>

                                            <a href="/admin/tugas/{{ $tugas->id }}"
                                                class="btn btn-primary btn-sm">Open</a>
                                            <a href="/admin/tugas/{{ $tugas->id }}/hapus" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                                <i class="fa fa-trash-o"></i> Hapus</a>
                                        </td>
                                        @elseif(auth()->user()->role=='guru')
                                        <td>
                                            <a href="/guru/tugas/{{ $tugas->id }}"
                                                class="btn btn-primary btn-sm">Open</a>
                                            <a href="/guru/tugas/{{ $tugas->id }}/hasil"
                                                class="btn btn-primary btn-sm">Hasil</a>
                                            <a href="/guru/tugas/{{ $tugas->id }}/hapus" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                                <i class="fa fa-trash-o"></i> Hapus</a>
                                        </td>
                                        @elseif(auth()->user()->role=='siswa')
                                        <td><a href="/admin/tugas/{{ $tugas->id }}/take-soal"
                                                class="btn btn-primary btn-sm">Take {{ $tugas->jenis_tugas }}</a></td>
                                        @endif
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
                <h4 class="modal-title">Tambah Tugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/tugas/tambah" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama">Nama Paket</label>
                        <input type="text" name="judul" value="{{ old('judul')}}" class="form-control" id="judul"
                            placeholder="Input Nama Paket" required>
                        @if ($errors->any('judul'))
                        <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('judul')}}</i></p>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1 {{ $errors->has('mapel_id')?' has-error':'' }}">Mapel</label>
                        <select value="{{ old('mapel_id') }}" name="mapel_id" class="form-control"
                            id="exampleFormControlSelect1">
                            <option value="">-pilih-</option>
                            @foreach ($mapel as $mapel)
                            <option value="{{ $mapel->id }}">{{ $mapel->mapel_nama }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="card card-default"  style="width: 100%">
                            <div class="card-header">
                                <div class="">
                                    <input
                                        class="custom-control-input custom-control-input-danger custom-control-input-outline checkitem"
                                        type="checkbox" style="position: relative;" id="checkall">
                                    <label for="checkall" class="custom-control-label">Checkall</label>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="form-group">

                                    @foreach ($kelas as $row )

                                    {{-- {{ $row->nama_kelas }} --}}
                                    <div class="text-sm custom-checkbox custom-control-inline">
                                        <input
                                            class="custom-control-input custom-control-input-danger custom-control-input-outline checkitem"
                                            style="position: relative;" name="kelas[]" value="{{ $row->id }}"
                                            type="checkbox" id="pilih-{{ $row->id }}">
                                        <label for="pilih-{{ $row->id }}"
                                            class="custom-control-label">{{ $row->nama_kelas }}</label>
                                    </div>
                                    @endforeach
                                   {{-- @foreach ($kelas as $kelas)

								<th class="text-center" >
									<label class="fancy-checkbox">
										<input type="checkbox" name="kelas[]" value="{{ $kelas->id }}">
										<span>{{ $kelas->nama }}</span>
									</label>
								</th>
								@endforeach --}}

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group {{ $errors->has('jenis_tugas')?' has-error':'' }}">
                        <label for="jenistugas">Jenis Tugas</label>
                        <select name="jenis_tugas" class="form-control" id="jenistugas">
                            <option value="Latihan" {{ (old('jenis_tugas')=='Latihan')?' selected':'' }}>Latihan
                            </option>
                            <option value="Ujian" {{ (old('jenis_tugas')=='Ujian')?' selected':'' }}>Ujian</option>
                        </select>
                    </div>
                    <div class="form-group {{ $errors->has('waktu')?' has-error':'' }}">
                        <label for="waktu">Waktu</label>
                        <input value="{{ old('waktu') }}" name="waktu" type="number" class="form-control"
                            id="waktu" aria-describedby="emailHelp" placeholder="waktu">
                        @if ($errors->any('waktu'))
                        <span>{{$errors->first('waktu')}}</span>
                        @endif
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
<!-- end modal tambah data -->


{{-- ###################################################################################################### --}}


@stop
