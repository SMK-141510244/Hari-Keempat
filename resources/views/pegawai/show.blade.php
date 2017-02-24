@extends('layouts.coba')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-0 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h1> Data Pegawai </h1></div>
                <div class="panel-body">

    <form class="form-horizontal">
        <div class="form-group">
            <label for="Nip" class="col-sm-2 control-label">Nip</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Nip" placeholder="{{$pegawai->Nip}}" readonly>
            </div>
        </div>

 <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="name" placeholder="{{$pegawai->User->name}}" readonly>
            </div>
</div>
        <div class="form-group">
            <label for="Nama_jabatan" class="col-sm-2 control-label">Jabatan</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Nama_jabatan" placeholder="{{$pegawai->Jabatan->Nama_jabatan}}" readonly>
            </div>
        </div>
        
         <div class="form-group">
            <label for="Nama_golongan" class="col-sm-2 control-label">Golongan</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Nama_golongan" placeholder="{{$pegawai->Golongan->Nama_golongan}}" readonly>
            </div>
        </div>
       <div class="form-group">
            <label for="Photo" class="col-sm-2 control-label">Foto</label>
            <div class="col-sm-8">
                <input type="image" class="form" id="Photo" img src="{{asset('/image/'.$pegawai->Photo)}}" height="100px" width="100px" readonly>
            </div>
        </div>
      </form>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <a href="{{ url('PEGAWAI')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
     </div>
     </div>
     </div>
     </div>
     </div>   

    @stop