@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengaturan Halaman Depan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Pengaturan</li>
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
                    <div class="card card-primary card-outline">
                        {{-- <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                Vertical Tabs Examples
                            </h3>
                        </div> --}}
                        <div class="card-body">
                            <h4>Ubah Halaman Depan</h4>
                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link active" id="tentangkami" data-toggle="pill"
                                            href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home"
                                            aria-selected="true">Tentang Kami</a>
                                        <a class="nav-link" id="visimisi" data-toggle="pill" href="#vert-tabs-profile"
                                            role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Visi &
                                            Misi</a>
                                        <a class="nav-link" id="sejarah" data-toggle="pill" href="#vert-tabs-messages"
                                            role="tab" aria-controls="vert-tabs-messages"
                                            aria-selected="false">Sejarah</a>
                                        <a class="nav-link" id="sosialmedia" data-toggle="pill"
                                            href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                            aria-selected="false">Sosial Media</a>
                                        <a class="nav-link" id="admsklh" data-toggle="pill" href="#vert-tabs-admsklh"
                                            role="tab" aria-controls="vert-tabs-admsklh"
                                            aria-selected="false">Administrasi Kantor Sekolah</a>
                                        <a class="nav-link" id="perpustakaan" data-toggle="pill"
                                            href="#vert-tabs-perpustakaan" role="tab"
                                            aria-controls="vert-tabs-perpustakaan"
                                            aria-selected="false">Perpustakaan</a>
                                        <a class="nav-link" id="labkom" data-toggle="pill" href="#vert-tabs-labkom"
                                            role="tab" aria-controls="vert-tabs-labkom" aria-selected="false">LAB
                                            Komputer</a>
                                            <a class="nav-link" id="struktur" data-toggle="pill" href="#vert-tabs-struktur"
                                            role="tab" aria-controls="vert-tabs-struktur" aria-selected="false">Struktur Organisasi</a>

                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade active show" id="vert-tabs-home"
                                            role="tabpanel" aria-labelledby="tentangkami">

                                            <div class="card card-warning">
                                                <div class="card-header">
                                                    <h3 class="card-title">Tentang Kami</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <form action="/admin/pengaturan/tentangkami" method="POST"
                                                        id="formtentangkami" enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Judul</label>
                                                                    <input type="text" name="judul" class="form-control"
                                                                        placeholder="Enter ..."
                                                                        value="{{ $tentangkami->judul }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <div class="card-body">
                                                                        <textarea id="summernote" rows="3"
                                                                            name="deskripsi" required>{!! $tentangkami->deskripsi !!}
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Foto</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" name="gambar"
                                                                            class="custom-file-input"
                                                                            id="idtentangkami">
                                                                        <label class="custom-file-label"
                                                                            for="idtentangkami">@if($tentangkami->gambar){{ $tentangkami->gambar }}@else
                                                                            Choose file @endif</label>
                                                                        <span id="error" class="error invalid-feedback"
                                                                            style=""></span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>



                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                            aria-labelledby="visimisi">
                                            <div class="card card-warning">
                                                <div class="card-header">
                                                    <h3 class="card-title">Visi & Misi</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <form action="/admin/pengaturan/visimisi" method="POST"
                                                        id="formvisimisi" enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Judul</label>
                                                                    <input type="text" name="judul" class="form-control"
                                                                        placeholder="Enter ..."
                                                                        value="{{ $visimisi->judul }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <div class="card-body">
                                                                        <textarea id="summernote1" rows="3"
                                                                            name="deskripsi" required>{!! $visimisi->deskripsi !!}
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Foto</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" name="gambar"
                                                                            class="custom-file-input" id="idvisimisi">
                                                                        <label class="custom-file-label"
                                                                            for="idvisimisi">@if($visimisi->gambar){{ $visimisi->gambar }}@else
                                                                            Choose file @endif</label>
                                                                        <span id="error" class="error invalid-feedback"
                                                                            style=""></span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
                                            aria-labelledby="sejarah">
                                            <div class="card card-warning">
                                                <div class="card-header">
                                                    <h3 class="card-title">Sejarah</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <form action="/admin/pengaturan/sejarah" method="POST" id="sejarah"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Judul</label>
                                                                    <input type="text" name="judul" class="form-control"
                                                                        placeholder="Enter ..."
                                                                        value="{{ $sejarah->judul }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <div class="card-body">
                                                                        <textarea id="summernote2" rows="3"
                                                                            name="deskripsi" required>{!! $sejarah->deskripsi !!}
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel"
                                            aria-labelledby="sosialmedia">
                                            <div class="card card-warning">
                                                <div class="card-header">
                                                    <h3 class="card-title">Sosial Media</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <form action="/admin/pengaturan/sosialmedia" method="POST"
                                                        id="sosialmedia" enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Judul</label>
                                                                    <input type="text" name="judul" class="form-control"
                                                                        placeholder="Enter ..."
                                                                        value="{{ $sosialmedia->judul }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <div class="card-body">
                                                                        <textarea id="summernote3" rows="3"
                                                                            name="deskripsi" required>{!! $sosialmedia->deskripsi !!}
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-admsklh" role="tabpanel"
                                            aria-labelledby="admsklh">
                                            <div class="card card-warning">
                                                <div class="card-header">
                                                    <h3 class="card-title">Administrasi Kantor Sekolah</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <form action="/admin/pengaturan/admsklh" method="POST" id="admsklh"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Judul</label>
                                                                    <input type="text" name="judul" class="form-control"
                                                                        placeholder="Enter ..."
                                                                        value="{{ $admsklh->judul }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <div class="card-body">
                                                                        <textarea id="summernote4" rows="3"
                                                                            name="deskripsi" required>{!! $admsklh->deskripsi !!}
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-perpustakaan" role="tabpanel"
                                            aria-labelledby="perpustakaan">
                                            <div class="card card-warning">
                                                <div class="card-header">
                                                    <h3 class="card-title">Perpustakaan</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <form action="/admin/pengaturan/perpustakaan" method="POST"
                                                        id="formperpustakaan" enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Judul</label>
                                                                    <input type="text" name="judul" class="form-control"
                                                                        placeholder="Enter ..."
                                                                        value="{{ $perpustakaan->judul }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <div class="card-body">
                                                                        <textarea id="summernote5" rows="3"
                                                                            name="deskripsi" required>{!! $perpustakaan->deskripsi !!}
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Foto</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" name="gambar"
                                                                            class="custom-file-input" id="idperpustakaan">
                                                                        <label class="custom-file-label"
                                                                            for="idperpustakaan">@if($perpustakaan->gambar){{ $perpustakaan->gambar }}@else
                                                                            Choose file @endif</label>
                                                                        <span id="error" class="error invalid-feedback"
                                                                            style=""></span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-labkom" role="tabpanel"
                                            aria-labelledby="labkom">
                                            <div class="card card-warning">
                                                <div class="card-header">
                                                    <h3 class="card-title">LAB Komputer</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <form action="/admin/pengaturan/labkom" method="POST" id="formlabkom"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Judul</label>
                                                                    <input type="text" name="judul" class="form-control"
                                                                        placeholder="Enter ..."
                                                                        value="{{ $labkom->judul }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <div class="card-body">
                                                                        <textarea id="summernote6" rows="3"
                                                                            name="deskripsi" required>{!! $labkom->deskripsi !!}
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Foto</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" name="gambar"
                                                                            class="custom-file-input" id="idlabkom">
                                                                        <label class="custom-file-label"
                                                                            for="idlabkom">@if($labkom->gambar){{ $labkom->gambar }}@else
                                                                            Choose file @endif</label>
                                                                        <span id="error" class="error invalid-feedback"
                                                                            style=""></span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-struktur" role="tabpanel"
                                            aria-labelledby="struktur">
                                            <div class="card card-warning">
                                                <div class="card-header">
                                                    <h3 class="card-title">Struktur Organisasi</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <form action="/admin/pengaturan/strukturorganisasi" method="POST" id="formstruktur"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Judul</label>
                                                                    <input type="text" name="judul" class="form-control"
                                                                        placeholder="Enter ..."
                                                                        value="{{ $struktur->judul }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <div class="card-body">
                                                                        <textarea id="summernote7" rows="3"
                                                                            name="deskripsi" required>{!! $struktur->deskripsi !!}
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Foto</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" name="gambar"
                                                                            class="custom-file-input" id="idstruktur">
                                                                        <label class="custom-file-label"
                                                                            for="idstruktur">@if($struktur->gambar){{ $struktur->gambar }}@else
                                                                            Choose file @endif</label>
                                                                        <span id="error" class="error invalid-feedback"
                                                                            style=""></span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->
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

@section('footer')
<script>
$(function () {
    $('#formperpustakaan').validate({
        rules: {
            gambar: {
                extension: "jpg,jpeg,png",
                // required: false,
            },
        },
        messages: {
            gambar: {
                extension: "format file harus jpg,jpeg,png",
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

});
var perpustakaan = document.getElementById("idperpustakaan");
perpustakaan.onchange = function () {
    if (this.files[0].size > 400000) {
        alert("File Maximal 400 kb");
        this.value = "";
    };
};

$(function () {
    $('#formlabkom').validate({
        rules: {
            gambar: {
                extension: "jpg,jpeg,png",
                // required: false,
            },
        },
        messages: {
            gambar: {
                extension: "format file harus jpg,jpeg,png",
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

});
var labkom = document.getElementById("idlabkom");
labkom.onchange = function () {
    if (this.files[0].size > 400000) {
        alert("File Maximal 400 kb");
        this.value = "";
    };
};
$(function () {
    $('#formstruktur').validate({
        rules: {
            gambar: {
                extension: "jpg,jpeg,png",
                // required: false,
            },
        },
        messages: {
            gambar: {
                extension: "format file harus jpg,jpeg,png",
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

});
var struktur = document.getElementById("idstruktur");
struktur.onchange = function () {
    if (this.files[0].size > 400000) {
        alert("File Maximal 400 kb");
        this.value = "";
    };
};
</script>
@endsection
