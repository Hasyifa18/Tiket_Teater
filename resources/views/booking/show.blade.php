@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booking Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $booking->customer_name }}</h5>
            <p class="card-text">Email: {{ $booking->email }}</p>
            <p class="card-text">Phone: {{ $booking->phone }}</p>
            <p class="card-text">Number of Tickets: {{ $booking->number_ticket }}</p>
            <p class="card-text">Payment Method: {{ $booking->payment_method }}</p>
            <a href="{{ route('booking.index') }}" class="btn btn-primary">Back to list</a>
        </div>
    </div>
</div>
@endsection
