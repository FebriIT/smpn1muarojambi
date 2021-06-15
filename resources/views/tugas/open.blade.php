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

                <div class="col-lg-4 col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Informasi</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama Paket</td>
                                        <td>:</td>
                                        <td>{{ $data->judul }}</td>
                                    </tr>
                                    <tr style="color:red;">
                                        <td>ID Paket</td>
                                        <td>:</td>
                                        <td>{{ $data->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mapel</td>
                                        <td>:</td>
                                        <td>{{ $data->mapel->mapel_nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Tugas</td>
                                        <td>:</td>
                                        <td>{{ $data->jenis_tugas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>:</td>
                                        <td>{{ $data->waktu }} Menit</td>
                                    </tr>
                                    <tr>
                                        <td>Penulis</td>
                                        <td>:</td>
                                        <td>{{ $data->guru->nama_guru }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Soal Pilihan Ganda</h3>
                            <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal"
                                data-target="#tambahpilgan"><i class="fas fa-plus"></i></button>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <table style="width: 100%;" class="table table-bordered" id="tablepilgan">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Soal</th>
                                        <th>Kunci</th>
                                        <th>Score</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($soalpilgan as $key=>$row)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $row->soal }}</td>
                                        <td>{{ $row->kunci }}</td>
                                        <td>{{ $row->score }}</td>
                                        <td>
                                            <a class="btn btn-danger btn-sm"
                                                href="/{{auth()->user()->role}}/tugas/{{$row->id}}/hapus-soal-pilgan"
                                                data-toggle="tooltip" data-placement="top" title="hapus"
                                                onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->


                    </div>
                </div>
                <div class="col-lg-4">

                </div>
                 <div class="col-lg-8 col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Soal Essay</h3>
                            <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal"
                                data-target="#tambahessay"><i class="fas fa-plus"></i></button>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <table style="width: 100%" class="table table-bordered" id="tableessay">
                                <thead >
                                    <tr>
                                        <th>No</th>
                                        <th>Soal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($soalessay as $key=>$row1)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $row1->soal }}</td>
                                        <td>
                                            <a class="btn btn-danger btn-sm"
                                                href="/{{auth()->user()->role}}/tugas/{{$row1->id}}/hapus-soal-essay"
                                                data-toggle="tooltip" data-placement="top" title="hapus"
                                                onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                                <i class="fas fa-trash">
                                                </i>

                                            </a>
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

<div class="modal fade" id="tambahpilgan">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Soal Pilihan Ganda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/tugas/{{ $id }}/tambahpilgan" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <textarea class="form-control" rows="3" name="soal" placeholder="Enter ..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pilA">Pilihan A</label>
                        <input type="text" name="pilA" value="{{ old('pilA')}}" class="form-control" id="pilA" required>
                    </div>
                    <div class="form-group">
                        <label for="pilB">Pilihan B</label>
                        <input type="text" name="pilB" value="{{ old('pilB')}}" class="form-control" id="pilB" required>
                    </div>
                    <div class="form-group">
                        <label for="pilC">Pilihan C</label>
                        <input type="text" name="pilC" value="{{ old('pilC')}}" class="form-control" id="pilC" required>
                    </div>
                    <div class="form-group">
                        <label for="pilD">Pilihan D</label>
                        <input type="text" name="pilD" value="{{ old('pilD')}}" class="form-control" id="pilD" required>
                    </div>
                    <div class="form-group">
                        <label>Kunci Jawaban</label>
                        <select class="form-control" name="kunci" required>
                            <option value="">-Pilih-</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="score">Score</label>
                        <input type="number" name="score" value="{{ old('score')}}" class="form-control" id="score" required>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" value="{{ old('gambar')}}" class="form-control"
                            id="gambar">
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

<div class="modal fade" id="tambahessay">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Soal Essay</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/tugas/{{ $id }}/tambahessay" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <textarea class="form-control" rows="3" name="soal" placeholder="Enter ..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" value="{{ old('gambar')}}" class="form-control"
                            id="gambar">
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


@stop

@section('footer')
<script>

</script>
@endsection
