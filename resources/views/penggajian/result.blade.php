@extends('layouts.app')

@section('penggajian')
   active
@endsection
@section('content')

<div class="col-md-8 col-md-offset-2">
           <div class="panel panel-primary">
               <div class="panel-heading">Pencarian Gaji Menurut Karyawan</div>
               <div class="panel-body">
                   <form class="form-horizontal" role="form" action="{{ url('query') }}" method="GET"">
                       {{ csrf_field() }}

                       

                       <div class="form-group{{ $errors->has('q') ? ' has-error' : '' }}">
                           <label for="q" class="col-md-4 control-label">Pegawai</label>

                           <div class="col-md-6">
                               <select name="q" class="form-control">
                                   <option value="">pilih</option>
                                   @foreach($pegawaii as $data)
                                   <option value="{{$data->id}}">{{$data->nip}}{{$data->user->name}}</option>
                                   @endforeach
                               </select>

                               @if ($errors->has('q'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('q') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                      
                       

                       <div class="form-group">
                           <div class="col-md-6 col-md-offset-4">
                               <button type="submit" class="btn btn-primary form-control">
                                   Cari
                               </button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
<div class="section">
<div class="card-panel green white-text">Hasil pencarian : <b>{{$query}}</b></div>
   @foreach($penggajian as $data)
   <div class="row">
<div class="col s12">


           
</div>
</div>
@endforeach

</div>







@endsection
@section('content1')
<div class="col-md-15 col-md-offset-0">
                   <div class="panel panel-primary">
                       <div class="panel-body">
       <div class="col-md-15 col-md-offset-0">
           <div class="panel panel-primary">
   <div class="panel-heading">Data Penggajian</div>
               <div class="panel-body">
       
       <table border="2" class="table table-success table-border table-hover">
<thead >
<tr>
<th>No</th>
<th>Pegawai</th>
<th>Jumlah Uang Tunjangan</th>
<th>Jumlah Jam Lembur</th>
<th>Jumlah Uang Lembur</th>
<th>gaji Pokok</th>
<th>Total Gaji</th>
<th>Tanggal Pengambilan</th>
<th>Status Pengambilan</th>
<th>Petugas Penerimaan</th>
</tr>
</thead>
@php $no=1;   @endphp
<tbody>
@foreach($pegawai as $data)
<tr>
<td>{{$no++}}</td>
<td>{{$data->user->name}}</td>
@foreach($tunjangan as $data1)
@if($data1->pegawai_id == $data->id)
<td>{{$data1->tunjangan->besar_uang}}</td>