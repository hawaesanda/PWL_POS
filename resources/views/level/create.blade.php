@extends('layouts.app') 

@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Tambah')

{{-- @section('content_header') 
    <h1>Form Tambah User</h1> 
@stop  --}}

@section('content') 
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form Tambah Level</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="../level">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="level_kode">Level Kode</label>
          <input type="text" class="form-control" id="level_kode" name="level_kode" placeholder="Masukkan Level Kode">
        </div>
        <div class="form-group">
          <label for="level_nama">Level Nama</label>
          <input type="text" class="form-control" id="level_nama" name="level_nama" placeholder="Masukkan Nama Level">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection