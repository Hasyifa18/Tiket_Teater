<!-- resources/views/booking/list.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Booking') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Teater Title</th>
                                <th>Quantity</th>
                                <th>Payment Method</th>
                                <th>Show Date</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->teater->title }}</td>
                                    <td>{{ $booking->quantity }}</td>
                                    <td>{{ ucfirst($booking->payment) }}</td>
                                    <td>{{ $booking->show_date }}</td>
                                    <td>{{ $booking->user->name }}</td>
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
