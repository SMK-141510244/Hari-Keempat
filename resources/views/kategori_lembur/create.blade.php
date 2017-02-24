@extends('layouts.coba')
@section('content')

<div class="container">
	<h1> Tambah Data Kategori Lembur </h1>
	{!! Form::open(['url' => 'KATEGORI']) !!}
	<hr>

	<div class="form-group">
		{!! Form::label('Kode', 'Kode Lembur:') !!}
		<input type="text" name="Kode_lembur" class="form-control" required> 
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

	<div class="form-group">
		{!! Form::label('Besaran', 'Besaran Uang:') !!}
		<input type="text" name="Besaran_uang" class="form-control" required> 
	</div>
	<div class="form-group">
		{!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
	</div>
</div>

@stop