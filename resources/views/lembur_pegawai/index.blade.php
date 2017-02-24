@extends('layouts.coba')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-0 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Data Lembur Pegawai </h1></div>
                <div class="panel-body">

	
	<a href="{{ url('/LEMBUR/create') }}" class="btn btn-success"> Tambah Data Lembur</a>
	<hr>

	<table class="table table-striped table-bordered table-hover">
		<thead>
		<tr class="bg-info">
			<th> No </th>
			<th> Kode Lembur </th>
			<th> Nama Pegawai </th>
			<th> Jabatan </th>
			<th> Golongan </th>
			<th> Jumlah jam </th>
			<th> Besaran Uang </th>
			
			
			<th colspan="2"><center> Action </center></th>
		</tr>
		</thead>
			
		<tbody>
			<?php
				$No = 1; 
			?>
			@foreach($lembur as $lem)
			<tr>
				<td><font color="black"> {{ $No++ }} </font></td>
				<td><font color="black"> {{ $lem->Kategori_lembur->Kode_lembur }} </font></td>
				<td><font color="black"> {{ $lem->Pegawai->User->name }} </font></td>
				<td><font color="black"> {{ $lem->Pegawai->Jabatan->Nama_jabatan}}</font></td>
				<td><font color="black"><font color="black"> {{ $lem->Pegawai->Golongan->Nama_golongan}}</font></td>
				<!-- <td> {{ $lem->Kategori_lembur->Besaran_uang }}</td> -->
				<td><font color="black"> {{ $lem->Jumlah_jam }}</font></td>
				<td><font color="black"> {{ $lem->Kategori_lembur->Besaran_uang * $lem->Jumlah_jam}}</font></td>
			
				 <a href="{{ url('LEMBUR', $lem->id) }}" ></a>
				<td> <a href="{{ route('LEMBUR.edit', $lem->id) }}" class="btn btn-warning">Ubah</a></td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'route' => ['LEMBUR.destroy', $lem->id]]) !!}
					{!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>

	</table>
</div>
</div>
</div>
</div>
</div>
</div>
@stop