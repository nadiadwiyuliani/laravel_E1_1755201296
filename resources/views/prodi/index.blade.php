@extends('layouts.app')
@section('title','prodi page')
@section('bread1','program studi')
@section('bread2','data')
@section('content')

<h3>master data program studi</h3>
<table class="table table-striped" id="mhs-table">
	<thead>
		<th>No</th>
		<th>Kode Prodi</th>
		<th>Nama Prodi</th>
		<th>Kaprodi</th>
	</thead>
	<tbody>
		@foreach($list_prodi as $key => $item)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$item->kode_prodi}}</td>
			<td>{{$item->nama_prodi}}</td>
			<td>{{$item->kaprodi}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection
