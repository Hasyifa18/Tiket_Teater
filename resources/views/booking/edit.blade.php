@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulir Edit Booking</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="theater_id">Pilih Teater</label>
                                <select class="form-control" id="teater_id" name="teater_id">
                                    @foreach ($teaters as $teater)
                                        <option value="{{ $teater->id }}" {{ $booking->teater_id == $teater->id ? 'selected' : '' }}>{{ $teater->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Jumlah Tiket</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $booking->quantity }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
