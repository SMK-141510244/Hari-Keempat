@extends('layouts.coba')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-0 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h1> Data Pegawai </h1></div>
                <div class="panel-body">

	
	<a href="{{ url('/PEGAWAI/create') }}" class="btn btn-success"> Tambah Data Pegawai</a>
	<hr>

	<table class="table table-striped table-bordered table-hover">
		<thead>
		<tr class="bg-info">
			<th> No </th>
			<th> NIP </th>
			<th> User </th>
			<th> Jabatan</th>
			<th> Golongan </th>
			<th> Photo </th>
			<th colspan="3"><center> Action </center></th>
		</tr>
		</thead>
		
		<tbody>
			<?php
				$No = 1; 
			?>
			@foreach($pegawai as $peg)
			<tr>
				<td><font color="black"> {{ $No++ }} </font></td>
				<td><font color="black"> {{ $peg->Nip }} </font></td>
				<td><font color="black"> {{ $peg->User->name}}</font>.</td>
				<td><font color="black"> {{ $peg->Jabatan->Nama_jabatan }} </font></td>
				<td><font color="black"> {{ $peg->Golongan->Nama_golongan }} </font></td>
				<td> <img src="{{asset('/image/'.$peg->Photo)}}" height="100px" width="100px"> </td>
				
				 <td><a href="{{ url('PEGAWAI', $peg->id) }}" class="btn btn-primary" >Lihat</a></td>
				<td> <a href="{{ route('PEGAWAI.edit', $peg->id) }}" class="btn btn-warning">Ubah</a></td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'route' => ['PEGAWAI.destroy', $peg->id]]) !!}
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