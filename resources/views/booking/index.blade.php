@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Booking List') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <tr>
                            <a class="btn btn-success font-bold py-2 px-4 mb-4 rounded" href="{{ route('booking.create') }}">Create New Booking</a> 
                        </tr>
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Theater Title</th>
                                <th scope="col">Seat</th>
                                <th scope="col">Seat Price</th>
                                <th scope="col">Number of Tickets</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $booking->customer_name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->phone }}</td>
                                    <td>{{ $booking->teater->title }}</td>
                                    <td>{{ $booking->seat->name }}</td>
                                    <td>Rp. {{ number_format($booking->seat->price, 0, ',', '.') }}</td>
                                    <td>{{ $booking->number_ticket }}</td>
                                    <td>{{ $booking->payment_method }}</td>
                                    <td>
                                        <a href="{{ route('booking.show', $booking->id) }}" class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('booking.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
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
@endsection
