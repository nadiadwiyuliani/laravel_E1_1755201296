@extends('layouts.app')
@section('title','matakuliah page')
@section('bread1','matakuliah')
@section('bread2','Data')
@section('content')

<h3>Form Matakuliah</h3><hr>
@include('layouts.alert')

<form action="/matakuliah/store" method="POST">
	@csrf

	<div class="form-group row">
		<label for="kode_mk" class="col-sm-12">Kode Matakuliah</label>
		<div class="col-sm-3">
			<input type="text" name="kode_mk" class="form-control" id="kode_mk" placeholder="kode matakuliah">
			@error('kode_mk')
				<small id="kode_mk" class="form-text text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>

	<div class="form-group row">
		<label for="kode_mk" class="col-sm-12">Matakuliah</label>
		<div class="col-sm-3">
			<input type="text" name="nama_mk" class="form-control" id="nama_mk" placeholder="masukan matakuliah">
			@error('nama_mk')
				<small id="nama_mk" class="form-text text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>

	<div class="form-group row">
		<label for="kode_mk" class="col-sm-12">Sks</label>
		<div class="col-sm-3">
			<input type="text" name="sks" class="form-control" id="sks" placeholder="masukan sks matakuliah">
		</div>
	</div>

	<div class="form-group row">
		<label for="kode_mk" class="col-sm-12">semester</label>
		<div class="col-sm-3">
			<input type="text" name="semester" class="form-control" id="semester" placeholder="masukan semester matakuliah">
		</div>
	</div>

	<button class="btn btn-primary" type="submit">simpan</button>
	<a href="{{url()->previous()}}" class="btn btn-danger">batal</a>
</form>
@endsection

