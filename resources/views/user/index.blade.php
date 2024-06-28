@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Data User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif  

    <div class="card-body">
        <table class="table">
            <tr>
                <a class="btn btn-primary font-bold py-2 px-4 rounded" href="{{ route('user.create') }}">Buat User</a> 
            </tr>
            <thead>
                <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary font-bold py-2 px-4 rounded" href="{{ route('user.edit', $user->id) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
    
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection