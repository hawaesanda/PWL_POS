{{-- @extends('m_user/template') --}}
@extends('layouts.app')
@section('content')
    {{-- <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('m_user.index') }}">Kembali</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Error <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('m_user.update', $useri->user_id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User_id:</strong>
                <input type="text" name="userid" value="{{ $useri->user_id }}" class="form-control" placeholder="Masukkan user id">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Level_id:</strong>
                <input type="text" name="levelid" value="{{ $useri->level_id }}" class="form-control" placeholder="Masukkan level">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" name="username" value="{{ $useri->username }}" class="form-control" placeholder="Masukkan username">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" value="{{ $useri->nama }}" class="form-control" placeholder="Masukkan nama">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" value="{{ $useri->password }}" class="form-control" placeholder="Masukkan password">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form> --}}
    <div class="container-fluid">
        <div class="card card-primary mt-5">
            <div class="card-header">
                <h3 class="card-title">Edit User</h3>
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

            <form action="{{ route('m_user.update', $useri->user_id)}}" method="post" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <strong>Username:</strong>
                            <input type="text" name="username" value="{{$useri->username}}" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username"></input>
                        </div>

                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <strong>Nama:</strong>
                            <input type="text" name="nama" value="{{$useri->nama}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama"></input>
                        </div>

                        @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="text" name="password" value="{{$useri->password}}" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password"></input>
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