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
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ $data->getAvatar() }}"
                                    style="width:200px;height: 200px;" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $data->nama_guru }}</h3>

                            <p class="text-muted text-center">{{ $data->mapel_nama }}</p>




                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">


                                <li class="nav-item"><a class="nav-link active" href="#settings"
                                        data-toggle="tab">Settings</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#changepw" data-toggle="tab">Change
                                        Password</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="changepw">
                                    <!-- The timeline -->
                                     <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="nip" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="nip"
                                                    value="{{ auth()->user()->email }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="password"
                                                   placeholder="Input Password">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal" action="/guru/profile/{{ auth()->user()->guru->id_guru }}/update"  method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="nip_guru" class="form-control" id="nip"
                                                    value="{{ $data->nip_guru }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_guru" id="inputName2"
                                                    value="{{ $data->nama_guru }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgllahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggal_lahir" id="tgllahir"
                                                    value="{{ $data->tanggal_lahir->format('Y-m-d') }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nohp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="no_hp" id="nohp"
                                                    value="{{ $data->no_hp }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="avatar" class="form-control" id="avatar">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



</div>

@stop
