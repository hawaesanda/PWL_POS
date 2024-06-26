{{-- @extends('m_user/template') --}}
@extends('layouts.app')

@section('subtitle', 'M_User')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'M_User')
@section('content')
    <div class="row mt-2 mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD user</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('m_user.create') }}">Input User</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">User id</th>
            <th width="150px" class="text-center">Level id</th>
            <th width="200px" class="text-center">username</th>
            <th width="200px" class="text-center">nama</th>
            <th width="150px" class="text-center">password</th>
        </tr>
        @foreach ($useri as $m_user)
        <tr>
            <td>{{ $m_user->user_id }}</td>
            <td>{{ $m_user->level_id }}</td>
            <td>{{ $m_user->username }}</td>
            <td>{{ $m_user->nama }}</td>
            <td>{{ $m_user->password }}</td>
            <td class="text-center">
                <form action="{{ route('m_user.destroy', $m_user->user_id) }}" method="POST">
                    <a class="btn btn-info btn-sm" href="{{ route('m_user.show', $m_user->user_id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('m_user.edit', $m_user->user_id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick='return confirm("Apakah Anda yakin ingin menghapus data ini?")'>Delete</button>
                </form>
            </td>
        </tr>            
        @endforeach
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection