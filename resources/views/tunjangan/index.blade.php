@extends('layouts.coba')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-0 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Data Tunjangan </h1></div>
                <div class="panel-body">

	
	<a href="{{ url('/TUNJANGAN/create') }}" class="btn btn-success"> Tambah Data Tunjangan</a>
	<hr>

	<table class="table table-striped table-bordered table-hover">
		<thead>
		<tr class="bg-info">
			<th> No </th>
			<th> Kode Tunjangan </th>
			<th> Jabatan </th>
			<th> Golongan </th>
			<th> Status Perkawinan </th>
			<th> Jumlah Anak</th>
			<th> Besaran Uang </th>
			<th colspan="2"><center> Action </center></th>
		</tr>
		</thead>
			
		<tbody>
			<?php
				$No = 1; 
			?>
			@foreach($tunjangan as $tunjang)
			<tr>
				<td><font color="black"> {{ $No++ }} </font></td>
				<td><font color="black"> {{ $tunjang->Kode_tunjangan }} </font></td>
				<td><font color="black"> {{ $tunjang->Jabatan->Nama_jabatan }} </font></td>
				<td><font color="black"> {{ $tunjang->Golongan->Nama_golongan }} </font></td>
				<td><font color="black"> {{ $tunjang->Status }} </font></td>
				<td><font color="black"> {{ $tunjang->Jumlah_anak }} </font></td>
				<td><font color="black"> {{ $tunjang->Besaran_uang }} </font></td>
				
				 <a href="{{ url('TUNJANGAN', $tunjang->id) }}" ></a>
				<td> <a href="{{ route('TUNJANGAN.edit', $tunjang->id) }}" class="btn btn-warning">Ubah</a></td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'route' => ['TUNJANGAN.destroy', $tunjang->id]]) !!}
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