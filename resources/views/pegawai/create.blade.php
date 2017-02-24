@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-0 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Data & Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data"  role="form" method="POST" action="{{ url('/PEGAWAI')}}" file=true>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                            <label for="permission" class="col-md-4 control-label">Permission</label>

                            <div class="col-md-6">
                              
                                <select class="form-control" name="permission">
                                    <option>Admin</option>
                                    <option>Pegawai</option>
                                    <option>HRD</option>
                                    <option>Keuangan</option>
                                </select>

                                @if ($errors->has('permission'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('permission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<hr>
                        <div class="form-group{{ $errors->has('Nip') ? ' has-error' : '' }}">
                            <label for="Nip" class="col-md-4 control-label">NIP</label>

                            <div class="col-md-6">
                                <input id="Nip" type="number" class="form-control" name="Nip" value="{{ old('Nip') }}" required autofocus>

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
                                <input id="Photo" type="file" class="form-control" name="Photo" value="{{ old('Photo') }}" required autofocus>

                                @if ($errors->has('Photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-0 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
