@extends('layouts.coba')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-0 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Data Pegawai</div>
                <div class="panel-body">

                    {!! Form::model($pegawai,['method' => 'PATCH','route'=>['PEGAWAI.update',$pegawai->id], 'files' => true]) !!}
                
                        {{ csrf_field() }}

                        
                        <div class="form-group{{ $errors->has('Nip') ? ' has-error' : '' }}">
                            <label for="Nip" class="col-md-4 control-label">NIP</label>

                            <div class="col-md-6">
                                <input id="Nip" type="number" class="form-control" name="Nip" value="{{$pegawai->Nip}}" required autofocus>

                                @if ($errors->has('Nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('Nama_jabatan') ? ' has-error' : '' }}">
                            <label for="Nama_jabatan" class="col-md-4 control-label">Jabatan</label>

                            <div class="col-md-6">
                              
                               <select class="form-control" name="jabatan_id">
                                     @foreach($jabatan as $jab)
                                <option value="{{ $jab->id }}"> {{ $jab->Nama_jabatan }}</option>
                                            @endforeach
                                     </select>
                                @if ($errors->has('Nama_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Nama_jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('Nama_golongan') ? ' has-error' : '' }}">
                            <label for="Nama_golongan" class="col-md-4 control-label">Golongan</label>

                            <div class="col-md-6">
                              
                               <select class="form-control" name="golongan_id">
                                     @foreach($golongan as $gol)
                                <option value="{{ $gol->id }}"> {{ $gol->Nama_golongan }}</option>
                                            @endforeach
                                     </select>
                                @if ($errors->has('Nama_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Nama_golongan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Photo') ? ' has-error' : '' }}">
                            <label for="Photo" class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input id="Photo" type="file" class="form-control" name="Photo" nullable value="{{ old('Photo') }}">

                                @if ($errors->has('Photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br>
<br>
<br>
<br>
<br>
<br><br>
                        <div class="form-group">
                            <div class="col-md-0 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    update
                                </button>
                            </div>
                        </div>
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
