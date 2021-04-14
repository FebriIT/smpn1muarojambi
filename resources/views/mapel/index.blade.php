@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mapel</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Mapel</li>
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
                  <th  style="width: 5%">No</th>
                  <th>Matapelajaran</th>
                  <th style="width: 17%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                 
                  @foreach ( $data as $key=>$datas )
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$datas->mapel_nama}}</td>
                    <td class="project-actions text-right">
                      <div>
                        
                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#editModal-{{$datas->mapel_id}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="/{{auth()->user()->role}}/mapel/{{$datas->mapel_id}}/hapus" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
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
        <h4 class="modal-title">Tambah Mapel</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/{{auth()->user()->role}}/mapel/tambah" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="mapel">Nama Mapel</label>
            <input type="text" name="mapel_nama" value="{{ old('mapel_nama')}}" class="form-control" id="mapel" placeholder="Kategori" required>
            {{-- @if ($errors->any('kategori_nama'))
            <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('kategori_nama')}}</i></p>
            @endif --}}
            
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
<div class="modal fade" id="editModal-{{$feb->mapel_id}}">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Mapel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/mapel/{{$feb->mapel_id}}/edit" method="POST"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                    

                        <div class="form-group">
                            <label for="mapel">Nama Mapel</label>
                            <input type="text" value="{{$feb->mapel_nama}}" name="mapel_nama" id="mapel" class="form-control">
                        
                        </div>
                        
                        
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endforeach
<!-- end modal edit data -->
@stop