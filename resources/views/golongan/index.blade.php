@extends('layouts.coba')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-0 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h1> Data Golongan </h1></div>
                <div class="panel-body">
	
	<a href="{{ url('/GOLONGAN/create') }}" class="btn btn-success"> Tambah Data Golongan  </a>
	<hr>

	<table class="table table-striped table-bordered table-hover">
		<thead>
		<tr class="bg-info">
			<th> No </th>
			<th> Kode Golongan </th>
			<th> Nama Golongan </th>
			<th> Besaran Uang </th>
			<th colspan="2"><center> Action </center></th>
		</tr>
		</thead>
			
		<tbody>
			<?php
				$No = 1; 
			?>
			@foreach($golongan as $gol)
			<tr>
				<td><font color="black"> {{ $No++ }} </font></td>
				<td><font color="black"> {{ $gol->Kode_golongan }} </font></td>
				<td><font color="black"> {{ $gol->Nama_golongan }}</font> </td>
				<td><font color="black"> {{ $gol->Besaran_uang }} </font></td>
				 <a href="{{ url('GOLONGAN', $gol->id) }}" ></a>
				<td> <a href="{{ route('GOLONGAN.edit', $gol->id) }}" class="btn btn-warning">Ubah</a></td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'route' => ['GOLONGAN.destroy', $gol->id]]) !!}
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