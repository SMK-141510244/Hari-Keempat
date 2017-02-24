@extends('layouts.coba')
@section('content')

<div class="container">
	<h1> Update Data Golongan </h1>
	{!! Form::model($golongan, ['method' => 'PATCH', 'route' => ['GOLONGAN.update', $golongan->id]]) !!}
	<input type="hidden" class="form-control" value="{{ $golongan->id }}">
	<hr>

	<div class="form-group">
		{!! Form::label('Kode', 'Kode Golongan') !!}
		<input type="text" name="Kode_golongan" class="form-control" value="{{ $golongan->Kode_golongan }}" required>
	</div>
	<div class="form-group">
		{!! Form::label('Nama', 'Nama Golongan') !!}
		<input type="text" name="Nama_golongan" class="form-control" value="{{ $golongan->Nama_golongan }}" required>
	</div>
	<div class="form-group">
		{!! Form::label('besaran uang', 'Besaran Uang') !!}
		<input type="text" name="Besaran_uang" class="form-control" value="{{ $golongan->Besaran_uang }}" required>
	</div>
	<div class="form-group">
		{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
	</div>
	{!! Form::close() !!}
</div>

@stop