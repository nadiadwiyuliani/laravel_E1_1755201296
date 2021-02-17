@extends('layouts.app')
@section('title', 'dosen page')
@section('bread1', 'dosen')
@section('bread2', 'data')
@section('content')

<h3>master data dosen</h3>

<p><a href="/dsn/create" class="btn btn-success btn-sm">Tambah</a></p>

@include('layouts.alert')

<table class="table table-striped" id="dsn-table">
	<thead>
		<tr>
			<th>No</th>
			<th>NID</th>
			<th>Nama Lengkap</th>
			<th>Mata Kuliah</th>
			<th>Alamat</th>
			<th>pilihan</th>
			
		</tr>
		
	</thead>
</table>
<script>
	$(function(){
		$('#dsn-table').DataTable({
			processing:true,
			serverSide:true,
			ajax: "{{route('dsn.list')}}",
			columns:[
				{data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'nid', name: 'nid'},
				{data: 'nama_lengkap', name: 'nama_lengkap'},
				{data: 'mmatak.nama_mk',name: 'nama_mk'},
				{data: 'alamat', name: 'alamat'},
				{data: 'action', name: 'action',orderable:false, searchable:false}
					
			]
		});
	});
</script>
@endsection