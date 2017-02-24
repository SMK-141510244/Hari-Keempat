@extends('layouts.coba')
@section('content')

<div class="container">
	<h1> Update Data Lembur Pegawai</h1>
	{!! Form::model($lembur, ['method' => 'PATCH', 'route' => ['LEMBUR.update', $lembur->id]]) !!}
	<input type="hidden" class="form-control" value="{{ $lembur->id }}">
	<hr>
<!-- 
	<div class="form-group">
		{!! Form::label('Kode', 'Kode Lembur') !!}
		<select class="form-control" name="Kode_lembur_id">
		@foreach($kategori as $kat)
			<option value="{{ $kat->id }}"> {{ $kat->Kode_lembur }}</option>
		@endforeach
	</select>
	</div> -->
	<div>
	{!! Form::label('Nama', 'Nama Pegawai:') !!}
	<select class="form-control" name="pegawai_id">
		@foreach($pegawai as $peg)
			<option value="{{ $peg->id }}"> {{ $peg->User->name }}</option>
		@endforeach
	</select>
	</div>
	<div class="form-group">
		{!! Form::label('Jumlah', 'Jumlah jam') !!}
		<input type="text" name="Jumlah_jam" class="form-control" value="{{ $lembur->Jumlah_jam }}" required>
	</div>

	<div class="form-group">
		{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
	</div>
	{!! Form::close() !!}
</div>

@stop