@extends('layouts.coba')
@section('content')

<div class="container">
	<h1> Tambah Data Tunjangan Pegawai </h1>
	{!! Form::open(['url' => 'TUNJANGANPEG']) !!}
	<hr>

	<div class="form-group">
		{!! Form::label('Kode', 'Kode Tunjangan:') !!}
	<select class="form-control" name="Kode_tunjangan_id">
		@foreach($tunjangan as $tunjang)
			<option value="{{ $tunjang->id }}"> {{ $tunjang->Kode_tunjangan }} || {{ $tunjang->Jabatan->Nama_jabatan }} || {{ $tunjang->Golongan->Nama_golongan }} || {{ $tunjang->Status }} || {{ $tunjang->Jumlah_anak }} anak</option>
		@endforeach
	</select> 
	</div>

	<div>
	{!! Form::label('Nama', 'Nama Pegawai:') !!}
	<select class="form-control" name="pegawai_id">
		@foreach($pegawai as $peg)
			<option value="{{ $peg->id }}"> {{ $peg->User->name }} || {{ $peg->Jabatan->Nama_jabatan }} || {{ $peg->Golongan->Nama_golongan }}</option>
		@endforeach
	</select>
	</div>

	<!-- <label for="Status" class="col-md-0 control-label">Status Pernikahan</label>
                                <select class="form-control" name="Status">
                                    <option>Sudah</option>
                                    <option>Belum</option>

                                </select>
 -->
	<div class="form-group">
		{!! Form::submit('Simpan', ['class' => 'btn btn-danger']) !!}
	</div>
</div>
@stop


