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
                                        <a class="nav-link" id="admsklh" data-toggle="pill"
                                            href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                            aria-selected="false">Administrasi Kantor Sekolah</a>
                                        <a class="nav-link" id="perpustakaan" data-toggle="pill"
                                            href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                            aria-selected="false">Perpustakaan</a>
                                        <a class="nav-link" id="labkom" data-toggle="pill"
                                            href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                            aria-selected="false">LAB Komputer</a>
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
                                            Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris.
                                            Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa
                                            eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer
                                            vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                                            condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis
                                            velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum
                                            odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla
                                            lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum
                                            metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac
                                            ornare magna.
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel"
                                            aria-labelledby="sosialmedia">
                                            Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna,
                                            iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor.
                                            Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique.
                                            Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat
                                            urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at
                                            consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse
                                            platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
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
