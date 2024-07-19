@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="max-w-md mx-auto my-10 bg-white p-5 rounded shadow-md">
        <h2 class="text-xl font-semibold mb-5">Theater Details</h2>
        <div class="mb-4">
            <p class="text-sm font-medium text-gray-700">Title:</p>
            <p class="text-lg font-semibold">{{ $teater->title }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm font-medium text-gray-700">Description:</p>
            <p>{{ $teater->description }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm font-medium text-gray-700">Show Date:</p>
            <p>{{ $teater->show_date }}</p>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('teater.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection

