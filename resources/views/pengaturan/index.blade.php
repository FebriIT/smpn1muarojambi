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
                            <h4>Profile</h4>
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
                                                        enctype="multipart/form-data">
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
                                                                <label>Foto</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        id="customFile">
                                                                    <label class="custom-file-label"
                                                                        for="customFile">Choose file</label>
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
                                                        enctype="multipart/form-data">
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
                                                                <label>Foto</label>
                                                                <div class="custom-file">
                                                                    <input type="file" name="gambar" class="custom-file-input"
                                                                        id="customFile">
                                                                    <label class="custom-file-label"
                                                                        for="customFile">Choose file</label>
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
                            <h4 class="mt-4">Right Sided <small>(nav-tabs-right)</small></h4>
                            <div class="row">
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-right-tabContent">
                                        <div class="tab-pane fade show active" id="vert-tabs-right-home" role="tabpanel"
                                            aria-labelledby="vert-tabs-right-home-tab">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada
                                            lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam
                                            ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor
                                            felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi,
                                            vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique
                                            senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu
                                            lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim
                                            sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin
                                            porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus
                                            pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum
                                            at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-right-profile" role="tabpanel"
                                            aria-labelledby="vert-tabs-right-profile-tab">
                                            Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris
                                            pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum
                                            dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in
                                            faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas
                                            sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere
                                            purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at,
                                            posuere nec nunc. Nunc euismod pellentesque diam.
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-right-messages" role="tabpanel"
                                            aria-labelledby="vert-tabs-right-messages-tab">
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
                                        <div class="tab-pane fade" id="vert-tabs-right-settings" role="tabpanel"
                                            aria-labelledby="vert-tabs-right-settings-tab">
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
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="vert-tabs-right-tab"
                                        role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="vert-tabs-right-home-tab" data-toggle="pill"
                                            href="#vert-tabs-right-home" role="tab" aria-controls="vert-tabs-right-home"
                                            aria-selected="true">Home</a>
                                        <a class="nav-link" id="vert-tabs-right-profile-tab" data-toggle="pill"
                                            href="#vert-tabs-right-profile" role="tab"
                                            aria-controls="vert-tabs-right-profile" aria-selected="false">Profile</a>
                                        <a class="nav-link" id="vert-tabs-right-messages-tab" data-toggle="pill"
                                            href="#vert-tabs-right-messages" role="tab"
                                            aria-controls="vert-tabs-right-messages" aria-selected="false">Messages</a>
                                        <a class="nav-link" id="vert-tabs-right-settings-tab" data-toggle="pill"
                                            href="#vert-tabs-right-settings" role="tab"
                                            aria-controls="vert-tabs-right-settings" aria-selected="false">Settings</a>
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
