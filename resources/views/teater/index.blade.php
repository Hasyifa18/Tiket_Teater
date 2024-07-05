@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>List of Theaters</h2>
            <a class="btn btn-success" href="{{ route('teater.create') }}">Create New Theater</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered mt-2">
        <tr align="center">
            <th>No</th>
            <th width="280px">Title</th>
            <th width="350px">Description</th>
            <th>Show Date</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
        @foreach ($teaters as $teater)
        <tr>
            <td>{{ $loop->iteration }}</td> {{-- Gunakan $loop->iteration untuk nomor iterasi --}}
            <td>{{ $teater->title }}</td>
            <td>{{ $teater->description }}</td>
            <td>{{ $teater->show_date }}</td>
            <td>{{ $teater->created_at }}</td>
            <td>{{ $teater->updated_at }}</td>
            <td>
                <form action="{{ route('teater.destroy', $teater->id) }}" method="POST">
                    <a class="btn btn-primary font-bold py-2 px-2 rounded" href="{{ route('teater.edit', $teater->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection