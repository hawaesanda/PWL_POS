@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit')

{{-- Content body: main page content --}}
@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kategori</h3>
        </div>

        <form action="{{ route('/kategori/simpan', $data->kategori_id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="kategori_kode">Kode Kategori</label>
                    <input type="text" name="kategori_kode" class="form-control" id="kategori_kode"
                        placeholder="Masukkan Kode" value="{{ $data->kategori_kode }}">
                </div>
                <div class="form-group">
                    <label for="kategori_nama">Nama Kategori</label>
                    <input type="text" class="form-control" name="kategori_nama" id="kategori_nama"
                        placeholder="Masukkan Nama" value="{{ $data->kategori_nama }}">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-check me-2"></i>Simpan</button>
                <a href="{{ route('/kategori') }}" class="btn btn-danger"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection