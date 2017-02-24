@extends('layouts.coba')
@section('content')

<div class="container">
	<h1> Update Data Jabatan </h1>
	{!! Form::model($jabatan, ['method' => 'PATCH', 'route' => ['JABATAN.update', $jabatan->id]]) !!}
	<input type="hidden" class="form-control" value="{{ $jabatan->id }}">
	<hr>

	<div class="form-group">
		{!! Form::label('Kode', 'Kode Jabatan') !!}
		<input type="text" name="Kode_jabatan" class="form-control" value="{{ $jabatan->Kode_jabatan }}" required>
	</div>
	<div class="form-group">
		{!! Form::label('Nama', 'Nama Jabatan') !!}
		<input type="text" name="Nama_jabatan" class="form-control" value="{{ $jabatan->Nama_jabatan }}" required>
	</div>
	<div class="form-group">
		{!! Form::label('besaran uang', 'Besaran Uang') !!}
		<input type="text" name="Besaran_uang" class="form-control" value="{{ $jabatan->Besaran_uang }}" required>
	</div>
	<div class="form-group">
		{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
	</div>
	{!! Form::close() !!}
</div>

@stop