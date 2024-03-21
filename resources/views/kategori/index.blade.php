@extends('layouts.app')

{{-- Customize layout section --}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')
    
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Kategori</div>
        </div>           
            <div class="card-body">
                {{ $dataTable->table() }}
                {{-- Tambahkan button Add di halam manage kategori, yang mengarah ke create kategori baru --}}
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ url('/kategori/create') }}" class="btn btn-primary">Add</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush

