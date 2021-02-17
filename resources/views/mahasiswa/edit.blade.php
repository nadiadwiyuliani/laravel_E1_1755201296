@extends('layouts.app')
@section('title','mahasiswa page')
@section('bread1','mahasiswa')
@section('bread2','data')
@section('content')

<h3>form mahasiswa</h3>

@include('layouts.alert')

<form action="{{route('mhs.update',$mhs->nim)}}" method="POST">
	@csrf
	@method('PUT')
	
	<div class="form-group row">
		<label for="nim" class="col-sm-12">Nim</label>
		<div class="col-sm-3">
			<input type="text" name="nim" class="form-control" id="nim" placeholder="nomor induk mahasiswa" value="{{$mhs->nim}}" readonly="">
			@error('nim')
			<small id="nim" class="form-text text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="nim" class="col-sm-12">Nama Lengkap</label>
		<div class="col-sm-3">
			<input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="masukan nama lengkap dengan benar" value="{{$mhs->nama_lengkap}}">
			@error('nama_lengkap')
			<small id="nama_lengkap" class="form-text text-danger">{{$message}}</small>
			@enderror

		</div>
	</div>
	<div class="form-group row">
		<label for="nim" class="col-sm-12">program studi</label>
		<div class="col-sm-3">
			<select name="prodi" id="prodi" class="form-control">
				@foreach($prodi as $item)
				<option value="{{$item->kode_prodi}}" {{ ($mhs->prodi==$item->kode_prodi)? 'selected':''}}>{{$item->nama_prodi}}</option>
				@endforeach
			</select>
			<small id="nama" class="form-text text-muted"></small>
		</div>
	</div>
	<div class="form-group row">
		<label for="nim" class="col-sm-12">alamat</label>
		<div class="col-sm-3">
			<textarea name="alamat" id="alamat" class="form-control">{{$mhs->alamat}}</textarea>
			<small id="nama" class="form-text text-muted"></small>
		</div>
	</div>
	<button class="btn btn-primary" type="submit">simpan</button>
	<a href="{{url()->previous()}}" class="btn btn-danger">batal</a>
</form>
@endsection