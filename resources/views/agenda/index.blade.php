@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Agenda</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
            <li class="breadcrumb-item {{Request::is('admin/agenda')?'active':''}}">Agenda</li>
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
            
              <table id="dataagenda" class="table table-bordered table-striped" style="font-size: 14px">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Agenda</th>
                  <th>Tanggal</th>
                  <th>Tempat</th>
                  <th>Waktu</th>
                  <th>Author</th>
                  <th style="width: 17%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                 
                  @foreach ( $data as $key=>$datas )
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$datas->agenda_nama}}</td>
                    <td>{{$datas->agenda_mulai}} s/d {{$datas->agenda_selesai}}</td>
                    <td>{{$datas->agenda_tempat}}</td>
                    <td>{{$datas->agenda_waktu}}</td>
                    <td>{{$datas->agenda_author}}</td>
                    <td class="project-actions text-right">
                      <div>
                        <a class="btn btn-primary btn-sm" target="_blank" href="{{url('agenda')}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                        </a>
                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#editModal-{{$datas->agenda_id}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="/{{auth()->user()->role}}/agenda/{{$datas->agenda_id}}/hapus" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                        </a>
                        
                      </div>
                    </td>
                    {{-- <td>
                      <div  >
                        <a href="#"><i class="fas fa-edit edit" data-toggle="modal" data-target="#editModal-{{$datas->agenda_id}}"></i></a> <br>
                        <a href="/{{auth()->user()->role}}/agenda/{{$datas->agenda_id}}/hapus" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')"><i class="fas fa-trash-alt"></i></a>
                      </div>
                      
                    </td> --}}
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
        <h4 class="modal-title">Tambah Agenda</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form action="/{{auth()->user()->role}}/agenda/tambah" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="namaagenda">Nama Agenda</label>
                    <input type="text" name="nama_agenda" value="{{ old('nama_agenda')}}" class="form-control" id="namaagenda" placeholder="Nama Agenda" required>
                    @if ($errors->any('nama_agenda'))
                    <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('nama_agenda')}}</i></p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control @if($errors->any('deskripsi_agenda')) is-invalid @endif" id="deskripsi" name="deskripsi_agenda" rows="3" placeholder="Deskripsi ..." required></textarea>
                    @if ($errors->any('deskripsi_agenda'))
                    <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('deskripsi_agenda')}}</i></p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Mulai</label>
                    <div class="input-group date" id="mulai" data-target-input="nearest">
                        <input name="mulai_agenda" type="text" class="form-control datetimepicker-input" data-target="#mulai" required>
                        <div class="input-group-append" data-target="#mulai" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Selesai</label>
                    <div class="input-group date" id="selesai" data-target-input="nearest">
                        <input name="selesai_agenda" type="text" class="form-control datetimepicker-input" data-target="#selesai" required>
                        <div class="input-group-append" data-target="#selesai" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tempat">Tempat</label>
                    <input type="text" name="tempat_agenda" value="{{ old('tempat_agenda')}}" class="form-control" id="tempat" placeholder="Tempat" required>
                    @if ($errors->any('tempat_agenda'))
                    <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('tempat_agenda')}}</i></p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="text" name="waktu_agenda" value="{{ old('waktu_agenda')}}" class="form-control" id="waktu" placeholder="Contoh: 10.30-12.00 WIB" required>
                    @if ($errors->any('waktu_agenda'))
                    <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('waktu_agenda')}}</i></p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control @if($errors->any('keterangan')) is-invalid @endif" id="keterangan" name="keterangan" rows="2" placeholder="Keterangan ..." required></textarea>
                    @if ($errors->any('keterangan'))
                    <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('keterangan')}}</i></p>
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
<div class="modal fade" id="editModal-{{$feb->agenda_id}}">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Agenda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/agenda/{{$feb->agenda_id}}/edit" method="POST"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                

                    <div class="form-group">
                        <label for="namaagenda">Nama Agenda</label>
                        <input type="text" name="nama_agenda" value="{{ $feb->agenda_nama}}" class="form-control" id="namaagenda" placeholder="Nama Agenda" required>
                        @if ($errors->any('nama_agenda'))
                        <p style="color: #dc3545; font-size:13px"><i>*{{$errors->first('nama_agenda')}}</i></p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control @if($errors->any('deskripsi_agenda')) is-invalid @endif" id="deskripsi" name="deskripsi_agenda" rows="3" placeholder="Deskripsi ..." required>{{$feb->agenda_deskripsi}}</textarea>
                        
                    </div>
                    <div class="form-group">
                        <label>Mulai</label>
                        <div class="input-group date" id="mulai" data-target-input="nearest">
                            <input name="mulai_agenda" value="{{$feb->agenda_mulai}}" type="text" class="form-control datetimepicker-input" data-target="#mulai" required>
                            <div class="input-group-append" data-target="#mulai" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Selesai</label>
                        <div class="input-group date" id="selesai" data-target-input="nearest">
                            <input name="selesai_agenda" value="{{$feb->agenda_selesai}}" type="text" class="form-control datetimepicker-input" data-target="#selesai" required>
                            <div class="input-group-append" data-target="#selesai" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" name="tempat_agenda" value="{{$feb->agenda_tempat}}" class="form-control" id="tempat" placeholder="Tempat" required>
                        
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="text" name="waktu_agenda" value="{{$feb->agenda_waktu}}" class="form-control" id="waktu" placeholder="Contoh: 10.30-12.00 WIB" required>
                        
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="2" placeholder="Keterangan ..." required>{{$feb->agenda_keterangan}}</textarea>
                     
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


</div>







@stop