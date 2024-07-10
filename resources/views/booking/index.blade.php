@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">BOOKING LIST</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">TOTAL TICKETS</th>
                                    <th scope="col">CREATED AT</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <th scope="row">{{ $booking->id }}</th>
                                        <td>{{ $booking->teater->title }}</td>
                                        <td>{{ $booking->quantity }}</td>
                                        <td>{{ $booking->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td>
                                            <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus booking ini?')">Hapus</button>
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
