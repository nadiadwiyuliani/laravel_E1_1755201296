@extends('layouts.app')
@section('title','mahasiswa page')
@section('bread1','mahasiswa')
@section('bread2','data')
@section('content')

<h3>master data mahasiswa</h3>
<p><a href="/mhs/create" class="btn btn-success btn-sm">tambah</a></p>


@include('layouts.alert')
<table class="table table-striped" id="mhs-table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nim</th>
			<th>Nama lengkap</th>
			<th>Prodi</th>
			<th>Alamat</th>
			<th>pilihan</th>
		</tr>
	</thead>
</table>
<script>
	$(function(){
		$('#mhs-table').DataTable({
			processing:true,
			serverSide:true,
			ajax:"{{route('mhs.list')}}",
			columns: [
			{data: 'DT_RowIndex',name: 'DT_RowIndex'},
			{data: 'nim',name: 'nim'},
			{data: 'nama_lengkap',name: 'nama_lengkap'},
			{data: 'mprodi.nama_prodi',name: 'nama_prodi'},
			{data: 'alamat',name: 'alamat'},
			{data: 'action',name: 'action',orderable:false,searchable:false}
			
			
			]
		});
	});
</script>
@endsection
