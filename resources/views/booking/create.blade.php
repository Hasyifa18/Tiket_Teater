@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Pemesanan Tiket</h1>

    <div class="bg-white shadow-md rounded-lg p-4">
        <h2 class="text-lg font-semibold mb-2">Teater: {{ $teater->name }}</h2>
        
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="teater_id" value="{{ $teater->id }}">
            
            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah Tiket</label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('quantity')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pesan Tiket</button>
        </form>
    </div>
</div>
@endsection
