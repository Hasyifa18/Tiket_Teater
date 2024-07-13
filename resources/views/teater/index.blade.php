@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Data Theater') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <h2 align="center">LIST OF THEATER</h2>
                {{-- @include('partials.teater-list') --}}

                @if ($message = Session::get('success'))
                    <div class="alert alert-success mt-2 text-center">
                        <p>{{ $message }}</p>
                    </div>
                @endif  

    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <a class="btn btn-success font-bold py-2 px-4 mb-4 rounded" href="{{ route('teater.create') }}">Create New Theater</a> 
            </tr>
            <thead>
                <tr align="center">
                <th>NO</th>
                <th>Title</th>
                <th>Description</th>
               <th>Show Date</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teaters as $teater)
                <tr>
                    <td>{{ $loop->iteration }}</td> {{-- untuk nomor iterasi (pengulangan)  --}}
                    <td>{{ $teater->title }}</td>
                    <td>{{ $teater->description }}</td>
                    <td>{{ $teater->show_date }}</td>
                    <td>{{ $teater->created_at }}</td>
                    <td>{{ $teater->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('teater.edit', $teater->id) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('teater.destroy', $teater->id) }}" method="POST" style="display: inline">
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
