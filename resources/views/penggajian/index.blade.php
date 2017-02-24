@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-0 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Data Penggajian </h1></div>
                <div class="panel-body">

	
	<a href="{{ url('/PENGGAJIAN/create') }}" class="btn btn-success"> Tambah Data Penggajian</a>
	<hr>

	<table class="table table-striped table-bordered table-hover">
		<thead>
		<tr class="bg-info">
			<th> No </th>
			<th> Nama Pegawai </th>
			<th> Jumlah Jam Lembur </th>
			<th> Jumlah Uang Lembur </th>
			<th> Gaji Pokok </th>
			<th> Total Gaji</th>
			<th> Tanggal Pengambilan</th>
			<th> Status Pengambilan </th>
			<th> Petugas Penggambilan</th>
			<th> Tunjangan </th>
			<th colspan="2"><center> Action </center></th>
		</tr>
		</thead>
		
		<tbody>
			<?php
				$No = 1; 
			?>
			@foreach($gajian as $gaji)
			
				<tr>
				  <td>{{$no++}}</td>
				  <td>{{$gaji->Tunjangan_pegawai->Pegawai->User->name}}</td>
                  <td>{{$gaji->Jumlah_jam_lembur}} </td>
                  <td>{{$gaji->Jumlah_uang_lembur}} </td>
                  <td>{{$gaji->Gaji_pokok}} </td>
                  <td>{{$gaji->Total_gaji}} </td>
                  <td>{{$gaji->updated_at}} </td>
                                   
                @if($gaji->Status_pengambilan == 0)
                                   
                   <td>Belum Diambil </td>
                                   
                 @endif

                 @if($gaji->Status_pengambilan == 1)
                                   
                    <td>Sudah Diambil</td>
                                   
                 @endif

                    <td>{{$gaji->Petugas_penerima}} </td>
 

				 <a href="{{ url('PENGGAJIAN', $gajian->id) }}" ></a>
				<td> <a href="{{ route('PENGGAJIAN.edit', $gajian->id) }}" class="btn btn-warning">Ubah</a></td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'route' => ['PENGGAJIAN.destroy', $gajian->id]]) !!}
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