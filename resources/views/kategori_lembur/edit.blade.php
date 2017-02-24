@extends('layouts.coba')
@section('content')

<div class="container">
	<h1> Update Data Kategori Lembur </h1>
	{!! Form::model($kategori, ['method' => 'PATCH', 'route' => ['KATEGORI.update', $kategori->id]]) !!}
	<input type="hidden" class="form-control" value="{{ $kategori->id }}">
	<hr>

	<div class="form-group">
		{!! Form::label('Kode', 'Kode Lembur') !!}
		<input type="text" name="Kode_lembur" class="form-control" value="{{ $kategori->Kode_lembur }}" required>
	</div>

	<div class="form-group">
		{!! Form::label('Nama', 'Nama Jabatan') !!}
		<select class="form-control" name="jabatan_id">
		@foreach($jabatan as $jab)
			<option value="{{ $jab->id }}"> {{ $jab->Nama_jabatan }}</option>
		@endforeach
	</select>
	</div>
	<div>
	{!! Form::label('Golongan', 'Golongan:') !!}
	<select class="form-control" name="golongan_id">
		@foreach($golongan as $gol)
			<option value="{{ $gol->id }}"> {{ $gol->Nama_golongan }}</option>
		@endforeach
	</select>
	</div>
	<div class="form-group">
		{!! Form::label('Besaran', 'besaran Uang') !!}
		<input type="text" name="Besaran_uang" class="form-control" value="{{ $kategori->Besaran_uang }}" required>
	</div>

	<div class="form-group">
		{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
	</div>
	{!! Form::close() !!}
</div>

@stop