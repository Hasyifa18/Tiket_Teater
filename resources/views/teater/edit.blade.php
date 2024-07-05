@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="max-w-md mx-auto my-10 bg-white p-5 rounded shadow-md">
        <h2 class="text-xl font-semibold mb-5">Edit Theater</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('teater.update', $teater->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $teater->title }}" class="form-input mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="form-textarea mt-1 block w-full">{{ $teater->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="show_date" class="block text-sm font-medium text-gray-700">Show Date</label>
                <input type="date" name="show_date" id="show_date" value="{{ $teater->show_date }}" class="form-input mt-1 block w-full">
            </div>
            <div class="flex justify-end">
                <a href="{{ route('teater.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Theater</button>
            </div>
        </form>
    </div>
</div>
@endsection
