@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Booking</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('booking.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name', $booking->customer_name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $booking->email) }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $booking->phone) }}" required>
        </div>
        <div class="form-group">
            <label for="number_ticket">Number of Tickets</label>
            <input type="number" class="form-control" id="number_ticket" name="number_ticket" value="{{ old('number_ticket', $booking->number_ticket) }}" required>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <input type="text" class="form-control" id="payment_method" name="payment_method" value="{{ old('payment_method', $booking->payment_method) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

