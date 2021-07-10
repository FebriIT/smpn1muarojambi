@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gallery</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
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
                                style="font-size: 14px;width: 100%">
                                <thead>
                                    <tr>
                                        <th>Image</th>

                                        <th>Author</th>
                                        <th>File Name</th>
                                        <th>Create</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $data as $key=>$row )
                                    <tr>
                                        <td><img src="{{ asset('storage/gallery/'.$row->foto) }}" style="width:90px;"></td>
                                        <td>{{$row->author}}</td>
                                        <td>{{$row->foto}}</td>
                                        <td>{{$row->created_at->format('d/m/Y')}}</td>
                                        <td class="project-actions text-right">
                                            <div>


                                                <a class="btn btn-danger btn-sm"
                                                    href="/{{auth()->user()->role}}/gallery/{{$row->id}}/hapus"
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


</div>



{{-- ###################################################################################################### --}}


{{-- Modal Tambah Data --}}
<div class="modal fade" id="modaltambah">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Gallery</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/gallery/tambah" id="formgallery" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="idgallery">
                            <label class="custom-file-label"
                                for="idgallery">Choose file</label>
                            <span id="error" class="error invalid-feedback" style=""></span>
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
<!-- end modal tambah data -->
@stop

@section('footer')
<script>
    $(function () {
    $('#formgallery').validate({
        rules: {
            foto: {
                extension: "jpg,jpeg,png",
                // required: false,
            },
        },
        messages: {
            foto: {
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
var gallery = document.getElementById("idgallery");
gallery.onchange = function () {
    if (this.files[0].size > 300000) {
        alert("File Maximal 300 kb");
        this.value = "";
    };
};
</script>
@endsection
