@extends('layouts.app')
@section('title','dosen page')
@section('bread1','dosen')
@section('bread2','data')
@section('content')

<h3>form dosen</h3>

@include('layouts.alert')

<form action="{{route('dsn.update',$dsn->nid)}}" method="POST">
	@csrf
	@method('PUT')
	
	<div class="form-group row">
		<label for="nid" class="col-sm-12">Nid</label>
		<div class="col-sm-3">
			<input type="text" name="nid" class="form-control" id="nid" placeholder="nomor induk dosen" value="{{$dsn->nid}}" readonly="">
			@error('nid')
			<small id="nid" class="form-text text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="nid" class="col-sm-12">Nama Lengkap</label>
		<div class="col-sm-3">
			<input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="masukan nama lengkap dengan benar" value="{{$dsn->nama_lengkap}}">
			@error('nama_lengkap')
			<small id="nama_lengkap" class="form-text text-danger">{{$message}}</small>
			@enderror

		</div>
	</div>
	<div class="form-group row">
		<label for="nid" class="col-sm-12">Mata Kuliah</label>
		<div class="col-sm-3">
			<select name="mata_kuliah" id="mata_kuliah" class="form-control">
				@foreach($mk as $item)
				<option value="{{$item->kode_mk}}" {{ ($dsn->mk==$item->kode_mk)? 'selected':''}}>{{$item->nama_mk}}</option>
				@endforeach
			</select>
			<small id="nama" class="form-text text-muted"></small>
		</div>
	</div>
	<div class="form-group row">
		<label for="nid" class="col-sm-12">alamat</label>
		<div class="col-sm-3">
			<textarea name="alamat" id="alamat" class="form-control">{{$dsn->alamat}}</textarea>
			<small id="nama" class="form-text text-muted"></small>
		</div>
	</div>
	<button class="btn btn-primary" type="submit">simpan</button>
	<a href="{{url()->previous()}}" class="btn btn-danger">batal</a>
</form>
@endsection