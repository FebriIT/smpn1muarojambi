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
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ $data->getAvatar() }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $data->nama_guru }}</h3>

                            <p class="text-muted text-center">{{ $data->mapel_nama }}</p>

                            

                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                fermentum enim neque.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                
                                {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
                                </li> --}}
                                <li class="nav-item"><a class="nav-link active" href="#settings"
                                        data-toggle="tab">Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                
                                <!-- /.tab-pane -->
                                {{-- <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                                10 Feb. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                                    email</h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a>
                                                    accepted your friend request
                                                </h3>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-comments bg-warning"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your
                                                    post</h3>

                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-success">
                                                3 Jan. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                                </h3>

                                                <div class="timeline-body">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- /.tab-pane -->

                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience"
                                                class="col-sm-2 col-form-label">Experience</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience"
                                                    placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills"
                                                    placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and
                                                            conditions</a>
                                                    </label>
                                                </div>
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


    {{-- ###################################################################################################### --}}


    {{-- Modal Tambah Data --}}
    {{-- <div class="modal fade" id="modaltambah">
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
            <input name="nisn" type="number" class="form-control" id="nisn" aria-describedby="emailHelp"
                placeholder="NISN Siswa" value="{{ old('nisn') }}" required>
            @if ($errors->any('nisn'))
            <span style="font-size:12px;color:red;">{{$errors->first('nisn')}}</span>
            @endif

        </div>

        <div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
            <label for="nama">Nama Siswa</label>
            <input required name="nama_siswa" type="text" class="form-control" id="nama" aria-describedby="emailHelp"
                placeholder="Nama" value="{{ old('nama_siswa') }}">

        </div>
        <div class="form-group {{ $errors->has('kelas')?' has-error':'' }}">
            <label for="kelas">Kelas</label>
            <select name="kelas_id" class="form-control" id="kelas" required>
                <option value="">-pilih-</option>
                @foreach ($kelas as $kelas)
                <option value="{{ $kelas->id_kelas }} {{ (old('id_kelas')==$kelas->id_kelas)?' selected':'' }}">
                    {{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group {{ $errors->has('agama')?' has-error':'' }}">
            <label for="agama">Agama</label>
            <input name="agama" type="text" class="form-control" required id="agama" aria-describedby="emailHelp"
                placeholder="Agama" value="{{ old('agama') }}">

        </div>
        <div class="form-group {{ $errors->has('email')?' has-error':'' }}">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" required id="email" aria-describedby="emailHelp"
                placeholder="Email" value="{{ old('email') }}">
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
</div> --}}
<!-- end modal tambah data -->


{{-- ###################################################################################################### --}}



{{-- Modal edit Data --}}
{{-- @foreach ($data as $feb)
<div class="modal fade" id="editModal-{{$feb->id_siswa}}">
<div class="modal-dialog ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Siswa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/{{auth()->user()->role}}/siswa/{{$feb->id_siswa}}/edit" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama_siswa">Nama</label>
                    <input name="nama_siswa" type="text" class="form-control" id="nama_siswa"
                        aria-describedby="emailHelp" placeholder="Nama" value="{{ $feb->nama_siswa }}" required>
                </div>

                <div class="form-group {{ $errors->has('kelas')?' has-error':'' }}">
                    <label for="kelas">Kelas</label>
                    <select name="kelas_id" class="form-control" id="kelas" required>
                        @foreach ($kelas1 as $row)
                        <option value="{{ $row->id_kelas }}">{{ $row->nama_kelas }}</option>
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
                    <input name="tanggal_lahir" type="date" value="{{ $feb->tanggal_lahir->format('Y-m-d') }}"
                        class="form-control" id="tgllhir" aria-describedby="emailHelp" required>
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
@endforeach --}}
<!-- end modal edit data -->
</div>

@stop