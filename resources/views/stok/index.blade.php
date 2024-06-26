@extends('layouts.template')

{{-- Customize layout sections --}}

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('/stok/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_stok">
                <thead>
                    <tr>
                        <th>Stok ID</th>
                        <th>Nama Barang</th>
                        <th>Nama User</th>
                        <th>Tanggal Stok</th>
                        <th>Jumlah Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


@endsection

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function () {
            var dataStok = $('#table_stok').DataTable({
                serverSide: true,   // serverSide: true, jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('stok/list') }}",
                    "dataType": "json",
                    "type": "POST"
                },
                columns: [
                    {
                        data: "DT_RowIndex",    // nomor urut dari laravel datatable addIndexColumn()
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },{
                        data: "barang.barang_nama",
                        className: "",
                        orderable: true,    // orderable: true, jika ingin kolom ini bisa diurutkan
                        searchable: true    // searchable: true, jika ingin kolom ini bisa dicari
                    },{
                        data: "user.nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },{
                        data: "stok_tanggal",
                        className: "",
                        orderable: false,   // orderable: false, jika ingin kolom ini tidak bisa diurutkan
                        searchable: false, // searchable: false, jika ingin kolom ini tidak bisa dicari
                    },{
                        data: "stok_jumlah",
                        className: "",
                        orderable: false,
                        searchable: false
                    },{
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush