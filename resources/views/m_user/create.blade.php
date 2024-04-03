{{-- @extends('m_user/template') --}}
@extends('layouts.app')
@section('content')
    <div class="row mt-2 mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Membuat Daftar User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('m_user.index') }}">Kembali</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops</strong> Input gagal <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('m_user.store') }}" method="POST">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username"></input>
            </div>
        </div>

        <div class="col-xl-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama"></input>
            </div>
        </div>

        <div class="col-xl-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password"></input>
            </div>
        </div>

        <div class="col-xl-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>  
    </div> 
</div>     
    </form> --}}
    <div class="container-fluid">
        <div class="card card-primary mt-5">
            <div class="card-header">
                <h3 class="card-title">Buat User Baru</h3>
            </div>

            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <form action="{{ route('m_user.store') }}" method="POST" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <strong>Level id:</strong>
                            <input type="text" name="level_id" class="form-control @error('level_id') is-invalid @enderror" placeholder="Masukkan level id"></input>
                        </div>

                        @error('level_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <strong>Username:</strong>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username"></input>
                        </div>

                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <strong>Nama:</strong>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama"></input>
                        </div>

                        @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password"></input>
                        </div>

                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="far fa-fw fa-save mr-2"></i>Submit</button>
                    <a class="btn btn-secondary" href="{{ route('m_user.index') }}"><i class="fa fa-arrow-left mr-2"></i>Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection