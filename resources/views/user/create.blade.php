@extends('layouts.app') 

@section('subtitle', 'Kategori')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Tambah')

{{-- @section('content_header') 
    <h1>Form Tambah User</h1> 
@stop  --}}

@section('content') 
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form Tambah User</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="../user">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
        </div>
        </div>
        <div class="form-group">
          <label for="level_id">Level ID</label>
          <input type="Number" class="form-control" id="level_id" name="level_id" placeholder="Masukkan Level ID">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection