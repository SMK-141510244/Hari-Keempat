@extends('layouts.coba')
@section('content')

<div class="container">
	<h1> Tambah Data Tujangan </h1>
	{!! Form::open(['url' => 'TUNJANGAN']) !!}
	<hr>

	<div class="form-group">
		{!! Form::label('Kode', 'Kode Tunjangan:') !!}
		<input type="text" name="Kode_tunjangan" class="form-control" required> 
	</div>

	{!! Form::label('Jabatan', 'Jabatan:') !!}
	<select class="form-control" name="jabatan_id">
		@foreach($jabatan as $jab)
			<option value="{{ $jab->id }}"> {{ $jab->Nama_jabatan }}</option>
		@endforeach
	</select>
	{!! Form::label('Golongan', 'Golongan:') !!}
	<select class="form-control" name="golongan_id">
		@foreach($golongan as $gol)
			<option value="{{ $gol->id }}"> {{ $gol->Nama_golongan }}</option>
		@endforeach
	</select>
	<label for="Status" class="col-md-0 control-label">Status Pernikahan</label>
                                <select class="form-control" name="Status">
                                    <option>Sudah</option>
                                    <option>Belum</option>

                                </select>

                                @if ($errors->has('Status_pengambilan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Status_pengambilan') }}</strong>
                                    </span>
                                @endif
                           <br>
   
	<div class="form-group">
		{!! Form::label('Jumlah', ' Jumlah Anak:') !!}
		<input type="text" name="Jumlah_anak" class="form-control"> 

	<div class="form-group">
		{!! Form::label('Besaran', 'Besaran Uang:') !!}
		<input type="text" name="Besaran_uang" class="form-control" > 
	</div>
	<br>
	<div class="form-group">
		{!! Form::submit('Simpan', ['class' => 'btn btn-danger']) !!}
	</div>
</div>

@stop