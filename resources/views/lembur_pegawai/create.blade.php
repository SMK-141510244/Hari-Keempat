@extends('layouts.coba')
@section('content')

<div class="container">
	<h1> Tambah Data Lembur </h1>
	{!! Form::open(['url' => 'LEMBUR']) !!}
	<hr>

	<!-- <div class="form-group">
		{!! Form::label('Kode', 'Kode Lembur:') !!}
	<select class="form-control" name="Kode_lembur_id">
		@foreach($kategori as $kat)
			<option value="{{ $kat->id }}"> {{ $kat->Kode_lembur }}|| {{ $kat->Jabatan->Nama_jabatan }} || {{ $kat->Golongan->Nama_golongan }} </option>
		@endforeach
	</select> 
	</div> -->

	<div>
	{!! Form::label('Nama', 'Nama Pegawai:') !!}
	<select class="form-control" name="pegawai_id">
		@foreach($pegawai as $peg)
			<option value="{{ $peg->id }}"> {{ $peg->User->name }} || {{ $peg->Jabatan->Nama_jabatan }} || {{ $peg->Golongan->Nama_golongan }}</option>
		@endforeach
	</select>
	</div>
	<div class="form-group">
		{!! Form::label('Jumlah', 'Jumlah Jam:') !!}
		<input type="text" name="Jumlah_jam" class="form-control" required> 
	</div>
	<div class="form-group">
		{!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
	</div>
</div>
@stop


