@extends('layouts.coba')
@section('content')

<div class="container">
	<h1> Tambah Data Golongan </h1>
	{!! Form::open(['url' => 'GOLONGAN']) !!}
	<hr>

	<div class="form-group">
		{!! Form::label('Kode', 'Kode Golongan:') !!}
		<input type="text" name="Kode_golongan" class="form-control" required> 
	</div>
	<div class="form-group">
		{!! Form::label('Nama', 'Nama Golongan:') !!}
		<input type="text" name="Nama_golongan" class="form-control" required> 
	</div>
	<div class="form-group">
		{!! Form::label('Besar uang', 'Besaran Uang:') !!}
		<input type="text" name="Besaran_uang" class="form-control" required> 
	</div>
	<div class="form-group">
		{!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
	</div>
</div>

@stop