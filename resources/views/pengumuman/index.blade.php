@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengumuman</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
            <li class="breadcrumb-item {{Request::is('admin/pengumuman')?'active':''}}">Pengumuman</li>
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
            
            <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal" data-target="#modaltambah"><i class="fas fa-plus"></i> Tambah Data</button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
              <table id="datapengumuman" class="table table-bordered table-striped" style="font-size: 14px">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th >Deskripsi</th>
                  <th>Tanggal Post</th>
                  <th>Author</th>
                  <th style="width: 17%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                 
                  @foreach ( $data as $key=>$datas )
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$datas->pengumuman_judul}}</td>
                    <td>{{$datas->pengumuman_deskripsi}}</td>
                    <td>{{$datas->created_at->format('d/m/Y')}}</td>
                    <td>{{$datas->pengumuman_author}}</td>
                    <td class="project-actions text-right">
                      <div>
                        <a class="btn btn-primary btn-sm" target="_blank" href="{{url('pengumuman')}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                        </a>
                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#editModal-{{$datas->pengumuman_id}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="/{{auth()->user()->role}}/pengumuman/{{$datas->pengumuman_id}}/hapus" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
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
        <h4 class="modal-title">Tambah Pengumuman</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/{{auth()->user()->role}}/pengumuman/tambah" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul_pengumuman" value="{{ old('judul_pengumuman')}}" class="form-control" id="judul" placeholder="Judul" required>
            @if ($errors->any('judul_pengumuman'))
            <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('judul_pengumuman')}}</i></p>
            @endif
            
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control @if($errors->any('deskripsi_pengumuman')) is-invalid @endif" id="deskripsi" name="deskripsi_pengumuman" rows="3" placeholder="Buat Pengumuman" required></textarea>
            @if ($errors->any('deskripsi_pengumuman'))
              <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('deskripsi_pengumuman')}}</i></p>
            @endif
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit"  class="btn btn-primary">Simpan</button>
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
<div class="modal fade" id="editModal-{{$feb->pengumuman_id}}">
<div class="modal-dialog ">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit Pengumuman</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="/{{auth()->user()->role}}/pengumuman/{{$feb->pengumuman_id}}/edit" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
       

        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" value="{{$feb->pengumuman_judul}}" name="pengumuman_judul" id="judul" class="form-control" placeholder="Judul">
         
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea class="form-control" name="pengumuman_deskripsi" id="deskripsi" rows="3" placeholder="Buat Pengumuman">{{$feb->pengumuman_deskripsi}}</textarea>
        </div>
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Update Data</button>
      </div>
    </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
@endforeach
<!-- end modal edit data -->


</div>







@stop