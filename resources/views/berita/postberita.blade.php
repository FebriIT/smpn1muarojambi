@extends('layouts.masteradmin')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Berita</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Post Berita</li>
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
            <form action="{{ route('berita.tambah') }}" method="POST" enctype="multipart/form-data" id="formberita">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Post Berita
                                </h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input type="text" name="berita_judul" required
                                                class="form-control rounded-0" id="exampleInputRounded0"
                                                placeholder="Judul Berita atau Artikel">
                                            @if ($errors->any('berita_judul'))
                                            <p style="color: #dc3545; font-size:13px">
                                                <i>*{{$errors->first('berita_judul')}}</i></p>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn-sm btn-primary float-right"><i
                                                    class="fas fa-plus"></i> Publish</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Berita
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <textarea id="summernote" rows="3" name="berita_isi" required>
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Pengaturan Lainnya
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori_id" class="form-control select2" style="width: 100%;"
                                        required>
                                        <option value="">-pilih-</option>
                                        @foreach ($kategori as $item)
                                        <option value="{{$item->id}}">{{$item->kategori_nama}}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->any('kategori_id'))
                                    <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('kategori_id')}}</i>
                                    </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="avatar"
                                            name="berita_gambar" required>
                                        <label class="custom-file-label" for="avatar">Choose file</label>
                                        <span id="exampleInputEmail1-error" class="error invalid-feedback" style=""></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@stop
